<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function destroySesion(Request $request){

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }


    public function userProfile(){

        $id = Auth::user()->id;
        $dataUser = User::find($id);

        return view('admin.user_profile',compact('dataUser'));

    }
}
