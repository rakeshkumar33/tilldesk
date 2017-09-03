<?php

namespace App\Http\Controllers\App\Account;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    public function editPassword()
    {
        return view('app.account.password.edit');

    }


    public function updatePassword(Request $request)
    {

    }

}