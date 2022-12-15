<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Requests;
use App\Models\Tables;

class DashboardController extends Controller
{
    //

    public function index(){

     
        return Inertia::render('Dashboard',[
            'totalRequests' => Requests::get()->count(),
            'totalDone' => Requests::where('is_done',1)->count(),
            'totalCancele' =>Requests::where('is_canceled',1)->count(),
            'totalTables'=>Tables::all()->count(),

        ]);
      
        }
}
