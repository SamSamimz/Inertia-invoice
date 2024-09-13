<?php
use Inertia\Inertia;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Invoice\InvoiceController;

Route::inertia('/','Index')->name('home');
Route::inertia('/invoices','InvoiceView',[
    'invoices' => Invoice::with('customer')->paginate(3)
])->name('invoice.index');
Route::inertia('/invoice/new','NewInvoice',[
    'customers' => Customer::pluck('name','id')->toArray(),
    'products' => Product::all()
])->name('invoice.new');

Route::post('/invoice/new',[InvoiceController::class,'store']);
Route::get('/invoices/print/{id}', [InvoiceController::class, 'print'])->name('invoice.print');
Route::delete('/invoice/delete/{id}', [InvoiceController::class, 'destroy'])->name('invoice.delete');
Route::post('/invoice/send/{id}', [InvoiceController::class, 'send'])->name('invoice.send');


Route::inertia('/test', 'Test')->name('test');
Route::post('/test',function(Request $request){
    $request->validate([
        'name' => 'required',
    ]);

    return response()->json('success');
    // return to_route('home');

});