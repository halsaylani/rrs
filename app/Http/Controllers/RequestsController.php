<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Requests;

class RequestsController extends Controller
{
    //
    public function index(){
        return Inertia::render('requests',[
            'requests' => Requests::orderBy('created_at','desc')->get()
        ]);
    }

    public function add(Request $request){
       
        Requests::create([
            'name'=> request('name'),
            'email'=> request('email'),
            'phone_number'=> request('phone_number'),
            'persons_number'=> request('persons_number'),
            'is_canceled' =>false,
            'is_confirmed' =>false,
            'is_done'=>false

        ]);

        return redirect()->back();
    }
    public function done($id){

        $request = Requests::findOrfail($id);
        $request->update([
            'is_done' => true,
            'is_canceled' => false
    ]);
        return redirect()->back();
    }
    public function cancele($id){
        
        $request = Requests::findOrfail($id);
        $request->update([
            'is_done' => false,
            'is_canceled' => true
        ]);
        return redirect()->back();
    }
}
