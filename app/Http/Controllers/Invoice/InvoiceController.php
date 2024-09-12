<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $validated =  $request->validate([
            'customer_id'           => 'required|exists:customers,id',
            'title'                 => 'required|string',
            'sku'                   => 'required',
            'description'           => 'nullable|string',
            'date'                  => 'nullable|date',
            'due_date'              => 'nullable|date',
            'total'                 => 'required|numeric',
            'items'                 => 'required|array',
            'items.*.product_id'    => 'required|exists:products,id',
            'items.*.description'   => 'nullable|string',
            'items.*.quantity'      => 'required|numeric',
            'items.*.unit_price'    => 'required|numeric',
        ]);

        dd($validated);

        $invoiceData = [
            'customer_id' => $validated['customer_id'],
            'title'       => $validated['title'],
            'code'        => $validated['sku'],
            'description' => $validated['description'],
            'date'        => $validated['date'],
            'due_date'    => $validated['due_date'],
            'total'       => $validated['total'],
        ];

        $invoice = Invoice::create($invoiceData);

        $invoice->items()->createMany($validated['items']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}