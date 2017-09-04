<?php

namespace App\Http\Controllers\App\Account;


use App\Entities\Contact;
use App\Entities\Organization;
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
        $currenctId = $this->currentOrg()->current_org_id;

        $account = Organization::with(['contactInfo'])->find($currenctId);

        $data = Contact::with(['primaryAddress', 'primaryContact'])
            ->where('contactable_type', 'App\Entities\Organization')->where('contactable_id', $account->id)->first();

        return $data;

        return view('app.account.company.edit', compact('data'));
    }


    public function updateOrganisation(Request $request)
    {

        $currenctId = $this->currentOrg()->with('currentOrg')->first()->current_org_id;

        $currenctOrg = Organization::find($currenctId);

        $contactData = [
            'category' => $request->get('type'),
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'is_primary' => true
        ];


        $personData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'title' => $request->get('title'),
            'is_primary' => true
        ];

        $addressData = [
            'line_1' => $request->get('line_1'),
            'line_2' => $request->get('line_2'),
            'city' => $request->get('city'),
            'zip_code' => $request->get('zip_code'),
            'state_id' => $request->get('state'),
            'country_id' => $request->get('country'),
            'is_primary' => true
        ];


        $currenctOrg->contactInfo()->updateOrCreate([
            'contactable_id' => $currenctOrg->id,
            'contactable_type' => get_class($currenctOrg)
        ], $contactData);


        $currenctOrg->contactInfo->people()->updateOrCreate([
            'personable_id' => $currenctOrg->contactInfo->id,
            'personable_type' => get_class($currenctOrg->contactInfo)
        ], $personData);


        $currenctOrg->contactInfo->addresses()->updateOrCreate([
            'addressable_id' => $currenctOrg->contactInfo->id,
            'addressable_type' => get_class($currenctOrg->contactInfo)
        ], $addressData);


    }


    private function currentOrg()
    {
        return auth()->user();
    }

}