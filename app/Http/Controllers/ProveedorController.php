<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProveedorController extends Controller
{
    


    // GET
    public function allProvider() {
        $dataProvider = Proveedor::latest()->get();
        return view('admin.provider.provider_all',compact('dataProvider'));

    }

    public function addProvider(){
        return view('admin.provider.provider_add');
    }


    // POST
    public function storeProvider(Request $request){
        //dd($request);
        /*$request->validate(
            ['ruc_proveedor' => 'required',],
            ['ruc_proveedor.required'   => 'El nombre es requerido!',]
        
        );*/

        Proveedor::insert([
            'ruc_prov' => $request->ruc_proveedor,
            'nom_prov' => $request->proveedor,
            'dir_prov' => $request->direccion_proveedor,
            'nom_cont' => $request->nombre_contacto,
            'tel_cont' => $request->telefono_contacto,
            'email_cont' => $request->email_contacto,
            'estado' => $request->category,
            'created_at' => Carbon::now(),


        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El proveedor ha sido insertado correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.provider')->with($notifications);
    }
}
