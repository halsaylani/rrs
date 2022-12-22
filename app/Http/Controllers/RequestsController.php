<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmEmailToUserRequest;
use App\Mail\WelcomeEmailToUserRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Requests;
use App\Models\Sessions;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Exception;
use Illuminate\Support\Facades\Crypt;


class RequestsController extends Controller
{
    //
    public function index(){
        return Inertia::render('Requests/index',[
            'requests' => Requests::orderBy('created_at','desc')->get()
        ]);
    }

    public function add(Request $request){

        $request->validate([
            'name' => 'required',
            'persons_number' => 'required',
          ]);
        $requests = Requests::create([
            'name'=> request('name'),
            'email'=> request('email'),
            'phone_number'=> request('phone_number'),
            'persons_number'=> request('persons_number'),
            'is_canceled' =>false,
            'is_confirmed' =>false,
            'is_done'=>false

        ]);
        try {
            Mail::to($requests->email)->send(new WelcomeEmailToUserRequest($requests));
        } catch (Exception $e) {
            return abort(404);
        }
        //session(['request_id' => $requests->id]);
        //dd(Sessions::all());
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
        try {
            $request = Requests::findOrfail($id);
            Mail::to($request->email)->send(new ConfirmEmailToUserRequest($request));
            $request->update([
                'is_email_sent' => true,
            ]);
        } catch (Exception $e) {
            return abort(404);
        }
    }

    public function live($id){
       
        $decryptedRequest = Crypt::decryptString($id);
        $requests = Requests::where('id',$decryptedRequest)->first();
            // on request deleted redirect welcome
            if(!$requests){
                return redirect('/');
            }
            // on request finish redirect welcome
            if($requests->is_done == true){
                return redirect('/');
            }

            return Inertia::render('LiveUpdate',[
                'inWaiting' => Requests::where('is_done',0)->count(),
                'requests' => Requests::where('id',$decryptedRequest)->get(),
                'confirm'=>false,
            ]);
        }

        public function confirm($id){
       
            $decryptedRequest = Crypt::decryptString($id);
            $requests = Requests::where('id',$decryptedRequest)->first();
                // on request deleted redirect welcome
                if(!$requests){
                    return redirect('/');
                }
                // on request finish redirect welcome
                if($requests->is_done == true){
                    return redirect('/');
                }
    
                return Inertia::render('LiveUpdate',[
                    'inWaiting' => Requests::where('is_done',0)->count(),
                    'requests' => Requests::where('id',$decryptedRequest)->get(),
                    'confirm'=>true,
                  
                ]);
            }
            public function confirmRequest($id){
                $request = Requests::findOrfail($id);
                $request->update([
                    'is_confirmed' => true,
                ]);
                return redirect()->back();

                }

        
}
