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
    Route::put('/updateporNombre/{nombre}',[productosController::class,'updateProductoNombre']);
    Route::delete('/delete/{id}',[productosController::class,'deleteProducto']);
    Route::delete('/deleteporNombre/{nombre}',[productosController::class,'deleteProductoNombre']);
});

Route::prefix('venta')->group(function () {
    Route::get('/all', [ventaController::class, 'getVentas']);
    Route::get('/{id}', [VentaController::class, 'getVenta']);
    Route::get('/fecha/{fecha}', [VentaController::class, 'getVentasFecha']);
    Route::post('/create', [VentaController::class, 'createVenta']);
    Route::put('/update/{id}', [VentaController::class, 'updateVenta']);
    Route::delete('/delete/{id}', [VentaController::class, 'deleteVenta']);
});
