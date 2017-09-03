<?php

namespace App\Http\Controllers\App\Invoices;


use App\Http\Controllers\Controller;

class InvoicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('app.invoices.index');
    }
}