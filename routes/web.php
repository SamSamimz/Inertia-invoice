<?php

use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

Route::inertia('/','Index')->name('home');
Route::inertia('/invoices','InvoiceView',[
    'invoices' => Invoice::with('customer')->paginate(5)
])->name('invoice.index');
Route::inertia('/invoice/new','NewInvoice')->name('invoice.new');