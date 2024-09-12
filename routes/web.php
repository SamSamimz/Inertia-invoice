<?php

use App\Models\Invoice;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

Route::inertia('/','Index')->name('home');
Route::inertia('/invoices','InvoiceView',[
    'invoices' => Invoice::with('customer')->paginate(5)
])->name('invoice.index');
Route::inertia('/invoice/new','NewInvoice',[
    'customers' => Customer::pluck('name','id')->toArray(),
    'products' => Product::all()
])->name('invoice.new');