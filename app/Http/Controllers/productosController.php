<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function getProductos(){
        $productos=productos::all();
        return response()->json($productos);
    }
    public function getProducto($id){
        $producto=productos::find($id);
        if(!$producto){
            return response()->json(['message'=>'Producto no encontrado'],404);
        }
        return response()->json($producto);
    }
    public function getProductosDepartamento($departamento){
        $productos=productos::where('departamento',$departamento)->get();
        if($productos->isEmpty()){
            return response()->json(['message'=>'No hay productos en este departamento'],404);
        }
        return response()->json($productos);
    }
    public function getCantidadProducto($id){
        $producto=productos::find($id);
        if(!$producto){
            return response()->json(['message'=>'Producto no encontrado'],404);
        }
        return response()->json(['cantidad'=>$producto->cantidad]);
    }
    public function getProductosNombre($nombre){
        $productos=productos::where('nombre',$nombre)->get();
        if($productos->isEmpty()){
            return response()->json(['message'=>'No hay productos con este nombre'],404);
        }
        return response()->json($productos);
    }
    public function createProducto(Request $request){
        $producto=productos::create($request->all());
        return response()->json($producto);
    }
    public function deleteProducto($id){
        $producto=productos::find($id);
        if(!$producto){
            return response()->json(['message'=>'Producto no encontrado'],404);
        }
        $producto->delete();
        return response()->json(['message'=>'Producto eliminado']);
    }
    public function updateProducto(Request $request,$id){
        $producto=productos::find($id);
        if(!$producto){
            return response()->json(['message'=>'Producto no encontrado'],404);
        }
        $producto->update($request->all());
        return response()->json($producto);
    }
}
