<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ProveedorController extends Controller
{
    
    // GET
    public function allProvider() {
        $dataProvider = Proveedor::all();
        return view('admin.provider.provider_all',compact('dataProvider'));

    }

    public function addProvider(){
        return view('admin.provider.provider_add');
    }


    // POST
    public function storeProvider(Request $request){
        
        $request->validate(
            [
                'ruc_proveedor'         => 'required|max:11',
                'proveedor'             => 'required', 
                'direccion_proveedor'   => 'required',
                'telefono_contacto'     => 'required|max:9',
            ],
            $message = [
                'ruc_proveedor'         => 'El RUC es requerido o es demasiado largo!',
                'proveedor'             => 'El Nombre es requerido!',
                'direccion_proveedor'   => 'La Dirección es requerido!',
                'telefono_contacto'     => 'El teléfono es requerido o es demasiado largo!'
            ]
        );

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

    // GET
    public function editProvider($id){

        $provider = Proveedor::findOrFail($id);
        return view('admin.provider.provider_edit',compact('provider'));

    }

    // POST
    public function updateProvider (Request $request,$id){
    
        $request->validate(
            [
                'ruc_proveedor'         => 'required|max:11',
                'proveedor'             => 'required', 
                'direccion_proveedor'   => 'required',
                'telefono_contacto'     => 'required|max:9',
            ],
            $message = [
                'ruc_proveedor'         => 'El RUC es requerido o es demasiado largo!',
                'proveedor'             => 'El Nombre es requerido!',
                'direccion_proveedor'   => 'La Dirección es requerido!',
                'telefono_contacto'     => 'El teléfono es requerido o es demasiado largo!'
            ]
        );

        Proveedor::findOrFail($id)->update([
            'ruc_prov' => $request->ruc_proveedor,
            'nom_prov' => $request->proveedor,
            'dir_prov' => $request->direccion_proveedor,
            'nom_cont' => $request->nombre_contacto,
            'tel_cont' => $request->telefono_contacto,
            'email_cont' => $request->email_contacto,
        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El proveedor ha sido actualizado correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.provider')->with($notifications);
    }
    
    

    public function deleteProvider(Request $request, $id){

        Proveedor::findOrFail($id)->delete();

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'El proveedor ha sido eliminado correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notifications);

    }



}
