<?php

namespace App\Http\Controllers;

use App\Models\productos;
use App\Models\venta;
use Illuminate\Http\Request;

class ventaController extends Controller
{
    public function getVentas()
    {
        $ventas = venta::with('producto')->get();
        return response()->json($ventas);
    }

    public function getVenta($id)
    {
        $venta = venta::with('producto')->find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }
        return response()->json($venta);
    }

    public function createVenta(Request $request)
    {
        $producto = productos::find($request->producto_id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $total = $producto->precioVenta * $request->cantidad;
        $venta = venta::create([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'total' => $total,
        ]);

        return response()->json($venta);
    }

    public function updateVenta(Request $request, $id)
    {
        $venta = venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $producto = productos::find($request->producto_id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $total = $producto->precioVenta * $request->cantidad;
        $venta->update([
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'total' => $total,
        ]);

        return response()->json($venta);
    }

    public function deleteVenta($id)
    {
        $venta = venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $venta->delete();
        return response()->json(['message' => 'Venta eliminada']);
    }
}
