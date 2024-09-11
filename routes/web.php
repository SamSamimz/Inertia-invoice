<?php

use App\Models\Invoice;
use Illuminate\Support\Facades\Route;

Route::inertia('/','Index')->name('home');
Route::inertia('/invoices','InvoiceView',[
    'invoices' => Invoice::with('customer')->paginate(5)
])->name('invoice.index');