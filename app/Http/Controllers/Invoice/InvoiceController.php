<?php

namespace App\Http\Controllers\Invoice;

use Inertia\Inertia;
use App\Mail\InvMail;
use App\Models\Invoice;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

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
        $validated = $request->validate([
            'customer_id'           => 'required|exists:customers,id',
            'title'                 => 'required|string',
            'description'           => 'nullable|string',
            'date'                  => 'required|date',
            'due_date'              => 'nullable|date',
            'sub_total'             => 'nullable|numeric',
            'total'                 => 'required|numeric',
            'paid'                  => 'nullable|boolean',
            'items'                 => 'required|array|min:1',
            'items.*.product_id'    => 'required|exists:products,id',
            'items.*.quantity'      => 'required|numeric|min:1|max:10',
            'items.*.unit_price'    => 'required|numeric',
        ]);

        $invoiceData = [
            'customer_id' => $validated['customer_id'],
            'title'       => $validated['title'],
            'code' => 'INV-' . substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6),
            'description' => $validated['description'],
            'date'        => $validated['date'],
            'due_date'    => $validated['due_date'],
            'total'       => $validated['total'],
            'paid'        => $validated['paid'],
        ];

        $invoice = Invoice::create($invoiceData);

        $invoice->items()->createMany($validated['items']);
        return to_route('invoice.index');
    }


    /**
     * Print the Invoice
     */
    public function print($code)
    {
        $invoice = Invoice::with(['customer','items.product'])->where('code', $code)->first();

        return Inertia::render('PrintPage', [
            'invoice' => $invoice
        ]);

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
    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();
    }

    /**
     * Send the specified resource from storage.
     */
    public function send($id)
    {
        $invoice = Invoice::with(['customer','items.product'])->findOrFail($id);
        Mail::to($invoice->customer->email)->send(new InvMail($invoice));
    }

}