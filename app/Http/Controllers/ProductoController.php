<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;


class ProductoController extends Controller
{
    
    // GET
    public function allProduct() {
        $dataProduct = Producto::all();
        return view('admin.product.product_all',compact('dataProduct'));
    }

    public function addProduct(){

        $dataCategories = Categoria::orderBy('id','ASC')->get();
        $dataProvider = Proveedor::orderBy('id','ASC')->get();
        return view('admin.product.product_add',compact('dataCategories','dataProvider'));
    }


    public function storeProduct(Request $request){


        $request->validate(
            [
                'producto'    => 'required',
                'precio_uni'  => 'required'
            ],
            $message = [
                'producto'    => 'El nombre del producto es requerido!',
                'precio_uni'  => 'El precio del producto es requerido!',
            ]
        );

        $img = $request->file('image');
        $imgName = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        $imgUrl = 'upload/product/'.$imgName;

        Image::make($img)->resize(430,327)->save($imgUrl);
        
        Producto::insert([
            'nombre'        => $request->producto,
            'descripcion'   => $request->descripcion,
            'precio_uni'    => $request->precio_uni,
            'stock_ini'     => $request->stock_ini,
            'stock_act'     => $request->stock_act,
            'unidad_med'    => $request->unidad_med,
            'id_categoria'  => $request->categoria,
            'id_proveedor'  => $request->proveedor,
            'imagen'        => $imgUrl,
            'created_at'    => Carbon::now(),
        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El producto ha sido insertado correctamente',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.product')->with($notifications);

    }


    public function editProduct($id){

        $product = Producto::findOrFail($id);
        $dataCategories = Categoria::orderBy('id','ASC')->get();
        $dataProvider = Proveedor::orderBy('id','ASC')->get();
        return view('admin.product.product_edit',compact('product','dataCategories','dataProvider'));
    }


    public function updateProduct(Request $request){

        $request->validate(
            [
                'producto'    => 'required',
                'precio_uni'  => 'required'
            ],
            $message = [
                'producto'    => 'El nombre del producto es requerido!',
                'precio_uni'  => 'El precio del producto es requerido!',
            ]
        );

        $idProduct = $request->id;
        
        if($request->file('image')){

            $imgProduct = $request->file('image');
            $imgName = hexdec(uniqid()).'.'.$imgProduct->getClientOriginalExtension();
            $imgUrl = 'upload/product/'.$imgName;

            Image::make($imgProduct)->resize(430,327)->save($imgUrl);
            
            Producto::findOrFail($idProduct)->update([
                'nombre'        => $request->producto,
                'descripcion'   => $request->descripcion,
                'precio_uni'    => $request->precio_uni,
                'stock_ini'     => $request->stock_ini,
                'stock_act'     => $request->stock_act,
                'unidad_med'    => $request->unidad_med,
                'id_categoria'  => $request->categoria,
                'id_proveedor'  => $request->proveedor,
                'imagen'        => $imgUrl,
            ]);

        }else{

            Producto::findOrFail($idProduct)->update([
                'nombre'        => $request->producto,
                'descripcion'   => $request->descripcion,
                'precio_uni'    => $request->precio_uni,
                'stock_ini'     => $request->stock_ini,
                'stock_act'     => $request->stock_act,
                'unidad_med'    => $request->unidad_med,
                'id_categoria'  => $request->categoria,
                'id_proveedor'  => $request->proveedor
            ]);
        }

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El producto ha sido actualizado correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.product')->with($notifications);
    }


    public function deleteProduct($id){

        Producto::findOrFail($id)->delete();

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El producto ha sido eliminado correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notifications);

    }



}
