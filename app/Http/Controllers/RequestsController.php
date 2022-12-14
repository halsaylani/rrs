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
            'requests' => Requests::get()
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
}
