<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class QrController extends Controller
{
    //

    public function index()
    {
        # code...
        return Inertia::render('Qr');
    }
}
