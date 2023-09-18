<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderHistoryController;
use App\Http\Livewire\AnalyticsDashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/admin/inventory', [InventoryController::class, 'index'])->name('admin.inventory.index');
    Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('admin.inventory.edit');
    Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('admin.inventory.update');

    Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::resource('admin/orders', OrderController::class)->except(['create', 'store']);


    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

    Route::post('user/register', [UserController::class, 'register']);

    Route::get('admin/AppUsers', [UserController::class, 'getRegisteredUsers']);

    Route::delete('/admin/customers/{id}', [UserController::class, 'destroy'])->name('admin.customers.destroy');

    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

// Products

    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');

    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');

    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');

    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');

    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');

    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');


    Route::get('/admin/order-history/{customerId}', [OrderHistoryController::class, 'show'])->name('admin.order-history.show');

    Route::get('/admin/analytics', AnalyticsDashboard::class)->name('admin.analytics.index');




});






