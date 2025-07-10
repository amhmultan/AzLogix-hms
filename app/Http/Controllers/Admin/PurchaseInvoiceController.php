<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\PurchaseInvoice;
use App\Models\PurchaseInvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseInvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Purchase access|Purchase create|Purchase edit|Purchase delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:Purchase create', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:Purchase edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:Purchase delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $invoices = PurchaseInvoice::with('supplier')->latest()->get();
        return view('purchase.index', compact('invoices'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('purchase.new', compact('suppliers', 'products'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'invoice_number' => 'required|unique:purchase_invoices',
            'supplier_id' => 'required',
            'purchase_date' => 'required|date',
            'discount' => 'nullable|numeric|min:0',
            'tax_percent' => 'nullable|numeric|min:0',
            'items.*.product_id' => 'required',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $gross = 0;
            foreach ($request->items as $item) {
                $gross += $item['quantity'] * $item['unit_price'];
            }

            $discount = floatval($request->discount ?? 0);
            $taxPercentage = floatval($request->tax_percentage ?? 0);

            $afterDiscount = $gross - $discount;
            $taxAmount = $afterDiscount * ($taxPercentage / 100);
            $netAmount = $afterDiscount + $taxAmount;

            $invoice = PurchaseInvoice::create([
                'invoice_number'   => $request->invoice_number,
                'supplier_id'      => $request->supplier_id,
                'purchase_date'    => $request->purchase_date,
                'discount'         => $discount,
                'tax_percent'   => $taxPercentage,
                'tax_amount'       => $taxAmount,
                'total_amount'     => $gross,
                'net_amount'       => $netAmount,
                'notes'            => $request->notes,
            ]);

            foreach ($request->items as $item) {
                PurchaseInvoiceItem::create([
                    'purchase_invoice_id' => $invoice->id,
                    'product_id'          => $item['product_id'],
                    'quantity'            => $item['quantity'],
                    'unit_price'          => $item['unit_price'],
                    'total_price'         => $item['quantity'] * $item['unit_price'],
                    'batch_no'            => $item['batch_no'] ?? null,
                    'expiry_date'         => $item['expiry_date'] ?? null,
                ]);
            }

            DB::commit();
            return redirect()->route('admin.purchases.index')->with('success', 'Invoice created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors('Error occurred: ' . $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {
        $purchase_invoice = PurchaseInvoice::with(['supplier', 'items.product'])->findOrFail($id);
        return view('purchase.show', compact('purchase_invoice'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, PurchaseInvoice $purchase_invoice)
{
    //
}


    public function destroy($id)
    {
        $purchase_invoice = PurchaseInvoice::findOrFail($id);
        $purchase_invoice->delete();
        return redirect()->route('admin.purchases.index')->with('success', 'Invoice deleted successfully!');
    }
}
