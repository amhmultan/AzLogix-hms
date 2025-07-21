<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Pharmacy;

class StockReportController extends Controller
{
    public function index()
    {
        $stockData = Product::select('products.id', 'products.name')
            ->with([
                'purchase_invoice_items' => function ($q) {
                    $q->select('product_id', DB::raw('SUM(quantity) as total_purchased'), DB::raw('MAX(created_at) as last_purchase'))
                      ->groupBy('product_id');
                },
                'sale_invoice_items' => function ($q) {
                    $q->select('fk_product_id', DB::raw('SUM(quantity) as total_sold'), DB::raw('MAX(created_at) as last_sale'))
                      ->groupBy('fk_product_id');
                },
            ])
            ->get()
            ->map(function ($product) {
                $purchase = optional($product->purchase_invoice_items->first());
                $sale = optional($product->sale_invoice_items->first());

                $total_purchased = $purchase->total_purchased ?? 0;
                $total_sold = $sale->total_sold ?? 0;
                $last_purchase = $purchase->last_purchase ?? null;
                $last_sale = $sale->last_sale ?? null;

                return [
                    'name' => $product->name,
                    'total_purchased' => $total_purchased,
                    'total_sold' => $total_sold,
                    'stock_in_hand' => $total_purchased - $total_sold,
                    'last_purchase' => $last_purchase,
                    'last_sale' => $last_sale,
                ];
            });
        
        return view('reports.index', compact('stockData'));
    }

    public function print()
    {
        $stockData = Product::select('products.id', 'products.name')
            ->with([
                'purchase_invoice_items' => function ($q) {
                    $q->select('product_id', DB::raw('SUM(quantity) as total_purchased'), DB::raw('MAX(created_at) as last_purchase'))
                    ->groupBy('product_id');
                },
                'sale_invoice_items' => function ($q) {
                    $q->select('fk_product_id', DB::raw('SUM(quantity) as total_sold'), DB::raw('MAX(created_at) as last_sale'))
                    ->groupBy('fk_product_id');
                },
            ])
            ->get()
            ->map(function ($product) {
                $purchase = optional($product->purchase_invoice_items->first());
                $sale = optional($product->sale_invoice_items->first());

                return [
                    'name' => $product->name,
                    'total_purchased' => $purchase->total_purchased ?? 0,
                    'total_sold' => $sale->total_sold ?? 0,
                    'stock_in_hand' => ($purchase->total_purchased ?? 0) - ($sale->total_sold ?? 0),
                    'last_purchase' => $purchase->last_purchase ?? null,
                    'last_sale' => $sale->last_sale ?? null,
                ];
            });

        return view('reports.print', compact('stockData'));
    }



}
