<?php

use App\Http\Controllers\productosController;
use App\Http\Controllers\ventaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('productos')->group(function () {
    Route::get('/all',[productosController::class,'getProductos']);
    Route::get('/{id}',[productosController::class,'getProducto']);
    Route::get('/producto/{nombre}',[productosController::class,'getProductosNombre']);
    Route::get('/departamento/{departamento}',[productosController::class,'getProductosDepartamento']);
    Route::get('cantidadProducto/{id}',[productosController::class,'getCantidadProducto']);
    Route::post('/create',[productosController::class,'createProducto']);
    Route::put('/update/{id}',[productosController::class,'updateProducto']);
    Route::delete('/delete/{id}',[productosController::class,'deleteProducto']);
});

Route::prefix('venta')->group(function () {
    Route::get('/all', [ventaController::class, 'getVentas']);
    Route::get('/{id}', [VentaController::class, 'getVenta']);
    Route::post('/create', [VentaController::class, 'createVenta']);
    Route::put('/update/{id}', [VentaController::class, 'updateVenta']);
    Route::delete('/delete/{id}', [VentaController::class, 'deleteVenta']);
});
