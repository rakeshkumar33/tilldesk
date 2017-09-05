<?php

namespace App\Http\Controllers\App\Contacts;
use App\Entities\Contact;
use App\Entities\Organization;
use App\Http\Controllers\Controller;
use App\Repositories\Contact\ContactRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{

    protected $contact;

    public function __construct(ContactRepository $contact)
    {
        $this->middleware('auth');
        $this->contact = $contact;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = $this->contact->paginate();


        $account = Auth::user()->current_org_id;

        $data = Contact::with(['primaryAddress', 'primaryPerson', 'memorandum'])
            ->where('contactable_type', 'App\Entities\Organization')
            ->where('contactable_id', $account)
            ->where('is_primary', false)
            ->paginate(10);

//        return $data;


        return view('app.contacts.index', compact('data'));
    }


    public function create()
    {
        return view('app.contacts.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        return array_except($request->all(), '_token');



        $currenctId = Auth::user()->with('currentOrg')->first()->current_org_id;

        $currenctOrg = Organization::find($currenctId);

        $contactData = [
            'category' => $request->get('type'),
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'is_primary' => false
        ];


        $personData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
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


        $contact = $currenctOrg->contactInfo()->create($contactData);

        $contact->people()->create($personData);

        $contact->addresses()->create($addressData);

        $contact->memorandum()->create([
            'memo' => $request->get('memo'),
        ]);


//        return $this->contact->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->contact->find($id);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $data  = $this->contact->find($id);


        $account = Auth::user()->current_org_id;

        $data = Contact::with(['primaryAddress', 'primaryPerson', 'memorandum'])
            ->where('contactable_type', 'App\Entities\Organization')
            ->where('contactable_id', $account)
            ->where('is_primary', false)
            ->find($id);

//        return $data;



        return view('app.contacts.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $currenctOrgId = Auth::user()->with('currentOrg')->first()->current_org_id;

        $currentOrg= Organization::find($currenctOrgId);
//        $currenctContact = Contact::find($id);

        $contact = $currentOrg->contactInfo->find($id);

        $contactData = [
            'category' => $request->get('type'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'is_primary' => false
        ];

        $personData = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'title' => $request->get('title'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
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

        $contact->updateOrCreate([
            'contactable_id' => $currenctOrgId,
            'contactable_type' => get_class($currentOrg)
        ], $contactData);


        $contact->people()->updateOrCreate([
            'personable_id' => $id,
            'personable_type' => get_class($currentOrg->contactInfo)
        ], $personData);


        $contact->addresses()->updateOrCreate([
            'addressable_id' => $id,
            'addressable_type' => get_class($currentOrg->contactInfo)
        ], $addressData);


        $contact->memorandum()->updateOrCreate([
            'memorandum_id' => $id,
            'memorandum_type' => get_class($currentOrg->contactInfo),
        ], [
            'memo' => $request->get('memo'),
        ]);



        return $contact->with(['primaryAddress', 'primaryPerson', 'memorandum'])->find($id);

//        return $this->contact->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->contact->delete($id);
    }
}
