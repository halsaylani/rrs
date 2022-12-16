<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailToUserRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Requests;
use Illuminate\Support\Facades\Mail;

class RequestsController extends Controller
{
    //
    public function index(){
        return Inertia::render('Requests/index',[
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

    public function search(Request $request){
    
        return Inertia::render('Requests/searchResult',[
            'results' => Requests::where('name', 'LIKE', '%'.$request->input('name').'%')->paginate(),
        ]);
    }

    public function sendEmail($id){
        $request = Requests::findOrfail($id);
        Mail::to($request->email)->send(new SendEmailToUserRequest($request));


    }
}
