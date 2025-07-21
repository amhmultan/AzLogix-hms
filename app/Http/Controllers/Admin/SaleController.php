<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SaleInvoice;
use App\Models\SaleInvoiceItem;
use App\Models\Product;
use App\Models\Patient;
use App\Models\Pharmacy;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Sale access|Sale add|Sale edit|Sale delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Sale add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Sale edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Sale delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $sales = SaleInvoice::with('patient')->latest()->paginate(10);
        return view('sale.index', compact('sales'));
    }

    public function create(Request $request)
    {
        $search = $request->input('search', '');

        $patients = Patient::when($search, function ($query, $search) {
            $query->where('id', 'like', "%$search%");
        })->get();

        $products = Product::all();

        return view('sale.create', compact('patients', 'products', 'search'));
    }


    public function store(Request $request)
    {
            $request->validate([
            'fk_patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.fk_product_id' => 'required|exists:products,id',
            'items.*.batch_no' => 'nullable|string|max:100',
            'items.*.expiry_date' => 'required|date',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'tax_percentage' => 'nullable|numeric|min:0',
            'gross_amount' => 'required|numeric|min:0',
            'net_amount' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            // Create main invoice
            $invoice = SaleInvoice::create([
                'fk_patient_id' => $request->fk_patient_id,
                'date' => $request->date,
                'gross_amount' => $request->gross_amount,
                'discount' => $request->discount ?? 0,
                'tax' => $request->tax_percentage ?? 0,
                'net_amount' => $request->net_amount,
            ]);

            // Create invoice items
            foreach ($request->items as $item) {
                $subtotal = $item['quantity'] * $item['unit_price'];

                SaleInvoiceItem::create([
                    'fk_sale_invoice_id' => $invoice->id,
                    'fk_product_id' => $item['fk_product_id'],
                    'batch_no' => $item['batch_no'] ?? null,
                    'expiry_date' => $item['expiry_date'] ?? null,
                    'quantity' => $item['quantity'],
                    'price' => $item['unit_price'],
                    'subtotal' => $subtotal,
                ]);
            }

            DB::commit();

            return redirect()->route('admin.sales.index')->with('success', 'Sale Invoice created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to create invoice. ' . $e->getMessage()])->withInput();
        }
    }



    public function show($id)
    {
        $sale = SaleInvoice::with(['patient', 'items.product'])->findOrFail($id);

        return view('sale.show', compact('sale'));
    }

    public function edit($id)
    {
        $sale = SaleInvoice::with('items')->findOrFail($id);
        $products = Product::all();
        return view('admin.sale.edit', compact('sale', 'products'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fk_patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'gross_amount' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'tax' => 'nullable|numeric',
            'net_amount' => 'required|numeric',
        ]);

        DB::beginTransaction();
        try {
            $sale = SaleInvoice::findOrFail($id);
            $sale->update($request->only([
                'fk_patient_id', 'date', 'gross_amount', 'discount', 'tax', 'net_amount'
            ]));

            // Remove old items
            SaleInvoiceItem::where('fk_sale_invoice_id', $id)->delete();

            // Insert new items
            foreach ($request->items as $item) {
                SaleInvoiceItem::create([
                    'fk_sale_invoice_id' => $sale->id,
                    'fk_product_id' => $item['fk_product_id'],
                    'batch_no' => $item['batch_no'] ?? null,
                    'expiry_date' => $item['expiry_date'] ?? null,
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'subtotal' => $item['subtotal'],
                ]);
            }

            DB::commit();
            return redirect()->route('admin.sales.index')->with('success', 'Sale Invoice updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Something went wrong!']);
        }
    }

    public function print($id)
    {
        $sale = SaleInvoice::with(['patient', 'items.product'])->findOrFail($id);
        if (!$sale) {
            return redirect()->back()->withErrors(['error' => 'Sale Invoice not found.']);
        }
        
        $pharmacy = Pharmacy::first();
        
        if (!$pharmacy) {
            return redirect()->back()->withErrors('Pharmacy information not found.');
        }
        // Ensure the pharmacy has a logo
        if (!$pharmacy->pic) {
            return redirect()->back()->withErrors('Pharmacy logo not found.');
        }
        return view('sale.print', compact('sale', 'pharmacy'));
    }

    public function destroy($id)
    {
        $sale = SaleInvoice::findOrFail($id);
        $sale->delete();
        return redirect()->route('admin.sales.index')->with('success', 'Sale Invoice deleted successfully.');
    }
}
