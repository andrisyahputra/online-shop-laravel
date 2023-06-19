<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KerajangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [indexController::class,'index'])->name('home');
Route::get('detail-produk/{produk}', [ProdukController::class, 'show'])->name('product-details');

Route::group(['middleware' => ['auth']], function(){
    Route::resources([
        'kerajang'=> KerajangController::class
    ]);
    Route::get('checkout-kerajang', [KerajangController::class, 'checkout'])->name('kerajang.checkout');
});



Route::get('/dashboard', function () {
    // return dd(implode('|',auth()->user()->getRoleNames()->toArray()));
    if(auth()->user()->hasRole('Admin')){
        return redirect()->route('admin.dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['prefix'=>'admin','middleware'=>['auth', 'verified','role:Admin']],function(){
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resources([
        'kategori'=> KategoriController::class,
        'produk'=> ProdukController::class,
        'pesanan'=> PesananController::class
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
