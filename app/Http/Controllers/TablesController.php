<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;


class TablesController extends Controller
{
    //

    public function index() {
        return  Inertia::render('Tables/index',[
         'tables' => 'test',
        ]);
     }
}
