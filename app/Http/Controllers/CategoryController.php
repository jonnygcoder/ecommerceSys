<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CategoryController extends Controller
{

    // GET
    public function allCategory() {

        $dataCategory = Categoria::latest()->get();
        return view('admin.category.category_all',compact('dataCategory'));

    }

    // GET
    public function addCategory() {
        return view('admin.category.category_add');
    }


    // POST
    public function storeCategory(Request $request){

        $request->validate(
            ['category' => 'required',],
            ['category.required'   => 'El nombre es requerido para la categoría!',]
        
        );

        Categoria::insert([
            'nombre' => $request->category,
            'created_at' => Carbon::now(),
        ]);

        // Notificación de alerta para la vista
        $notifications = [
            'message'    => 'La categoría ha sido insertada correctamente',
            'alert-type' => 'success'
        ];
        
        return redirect()->route('all.category')->with($notifications);
    }

}
