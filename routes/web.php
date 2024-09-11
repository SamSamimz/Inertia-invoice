<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/','Index')->name('home');
Route::inertia('/invoices','InvoiceView')->name('invoice.index');