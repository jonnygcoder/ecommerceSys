<?php

namespace App\Http\Controllers;

use App\Models\OrdenCompra;
use App\Models\OrdenCompraDetalle;
use App\Models\Producto;
use App\Controller\MessengerController;
use App\Http\Controllers\MessengerController as ControllersMessengerController;
use Illuminate\Http\Request;

class OrdenCompraController extends Controller
{
    // GET
    public function allOrderBuyPen() {
        $dataOrderBuy = OrdenCompra::where('estado',0)->get();
        //$data = ControllersMessengerController::sendMessageWsp2();
        //dd($data);

        return view('admin.orderBuy.order_buy_all',compact('dataOrderBuy'));
    }

    public function allOrderBuyApro() {
        $dataOrderBuy = OrdenCompra::where('estado',1)->get();
        return view('admin.orderBuy.order_buy_all',compact('dataOrderBuy'));
    }

    public function allOrderBuyCan() {
        $dataOrderBuy = OrdenCompra::where('estado',2)->get();
        return view('admin.orderBuy.order_buy_all',compact('dataOrderBuy'));
    }


    public function updateOrderBuyPen(Request $request){

        $idOrder = $request->id;


        // Buscar los productos del detalle de la orden aprobada y actualiza stock de cada producto
        $dataDetailOrder = OrdenCompraDetalle::where('id_orden',$idOrder)->get();       
        
        foreach ($dataDetailOrder as $key => $item) {

            // Busca el producto para obtener el stock actual
            $dataProduct = Producto::findOrFail($item->id_producto);
            $newStock = $dataProduct->stock_act - $item->cant_producto;

            // Actualiza stock de producto
            Producto::findOrFail($item->id_producto)->update([
                'stock_act' => $newStock,
            ]);
            
        }

        //dd($dataDetailOrder);

        // Aprueba orden de compra (1 = aprobado)
        OrdenCompra::findOrFail($idOrder)->update([
            'estado' => 1
        ]);


        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'La órden de compra ha sido aprobada correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.orderBuyPen')->with($notifications);
    }

    public function cancelOrderBuyPen(Request $request){

        $idOrder = $request->id;

        // Actualiza orden de compra (2 = cancelado)
        OrdenCompra::findOrFail($idOrder)->update([
            'estado' => 2
        ]);


        // Traer el detalle de la órden y recorrer para actualizar el stock de todos los productos
        //$product = Producto::findOrFail($id);
        //Producto::findOrFail($idProduct)->update([
        //    'stock_act'     => $request->stock_act,
        //]);


        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'La órden de compra ha sido cancelada',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.orderBuyPen')->with($notifications);
    }


}
