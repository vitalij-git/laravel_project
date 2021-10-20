<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact= Contact::all();
        $company =Company::all();
        return  view("contact.index",['contacts' => $contact, 'companies'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("contact.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->title = $request->contact_title;
        $contact->phone = $request->contact_phone;
        $contact->address = $request->contact_address;
        $contact->email = $request->contact_email;
        $contact->country = $request->contact_country;
        $contact->city = $request->contact_city;

        $contact->save();

        return redirect()->route('contact.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view("contact.show",['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view("contact.edit",['contact' => $contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->title = $request->contact_title;
        $contact->phone = $request->contact_phone;
        $contact->address = $request->contact_address;
        $contact->email = $request->contact_email;
        $contact->country = $request->contact_country;
        $contact->city = $request->contact_city;

        $contact->save();

        return redirect()->route('contact.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $company_count=$contact->companyHasMany->count();

        if($company_count==0){
            $contact->delete();
            return redirect()->route("contact.index")->with('success_message', 'kontaktas ištrinta sėkmingai');
        }
        return redirect()->route("contact.index")->with('error_message', 'kontaktas turi kompanija');
    }
}
