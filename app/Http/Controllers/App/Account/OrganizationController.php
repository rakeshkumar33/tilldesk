<?php

namespace App\Http\Controllers\App\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function editOrganisation()
    {
        return view('app.account.company.edit');
    }


    public function updateOrganisation(Request $request)
    {

    }

}