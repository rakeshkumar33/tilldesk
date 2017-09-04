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
        $data = $this->contact->paginate();

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


        $currenctOrg->contactInfo()->create($contactData);

        $currenctOrg->contactInfo->people()->create($personData);

        $currenctOrg->contactInfo->addresses()->create($addressData);

        $currenctOrg->contactInfo->memorandum()->create([
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

//        $currenctId = $this->currentOrg()->current_org_id;
//
//        $account = Organization::with(['contactInfo'])->find($currenctId);

        $data = Contact::with(['primaryAddress', 'primaryContact'])
            ->where('contactable_type', 'App\Entities\Organization')->where('contactable_id', $account)->find($id);

        return $data;



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
        return $this->contact->update($id, $request->all());
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
