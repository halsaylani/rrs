<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Tables;

class TablesController extends Controller
{
    //

    public function index() {
        return  Inertia::render('Tables/index',[
         'tables' => Tables::get(['id','table_number','seats_number']),
        ]);
     }

     public function add(Request $request){
        request()->validate([
            'table_number' => ['required'],
            'seats_number' => ['required'],
        ]);
        
      Tables::create([
            'table_number' => request('table_number'),
            'seats_number' => request('seats_number'),
        ]);

        return redirect()->back();

     }

     public function edit($id){
        $tables = Tables::findOrfail($id);
        $tables->update([
            'table_number' =>request('table_number') ?? $tables->table_number,
            'seats_number' =>request('seats_number') ?? $tables->seats_number
        ]);
        return redirect()->back();
     }
     public function delete($id){
        Tables::findOrfail($id)->delete();
        return redirect()->back();
     }
}
