<?php

namespace App\Http\Controllers\App\Account;


use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function editProfile()
    {
        $currenctUser = Auth::user();

//        return $currenctUser;


        $data = User::with('primaryPerson')->find($currenctUser->id);

//        return $data = $currenctUser->with('me')->first();


//        return $data;

        return view('app.account.profile.edit', compact('data'));

    }



    public function updateProfile(Request $request)
    {

        $currenctUser = Auth::user();


        $personData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'is_primary' => true
        ];

        $currenctUser->primaryPerson()->updateOrCreate([
            'personable_id' => $currenctUser->id,
            'personable_type' => get_class($currenctUser)
        ], $personData);


    }

}