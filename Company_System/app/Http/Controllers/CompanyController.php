<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use App\Contact;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact =Contact::all();
        $company = Company::all();
        return  view("company.index",['companies' => $company, 'contacts'=>$contact]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact =Contact::all();
        return view("company.create", ['contacts'=>$contact] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $company = new Company;


        $company->title = $request->company_title;
        $company->description = $request->company_description;
        $company->contact_id=$request->company_contact_id;
        if($request->hasFile("company_logo")){

            // $imageName = time().'.'.$request->company_logo->extension();
            // $company->logo = '/uploads/company/'.$imageName;
            // $request->company_logo->move(public_path('uploads/company'), $imageName);

            $file = $request->file("company_logo");
            $extention=$file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move("uploads/company", $filename);
            $company->logo = "uploads/company/".$filename;
        }
        else{
            $company->logo='uploads/images/placeholder.png';
        }
        $company->save();

        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view("company.show",['company' => $company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $contact =Contact::all();
        return view("company.edit",['company' => $company, 'contacts'=>$contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company->title = $request->company_title;
        $company->description = $request->company_description;
        $company->contact_id=$request->company_contact_id;
        if($request->hasFile("company_logo")){

            $file = $request->file("company_logo");
            $extention=$file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move("uploads/company", $filename);
            $company->logo = "uploads/company/".$filename;
        }
        $company->save();

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $type_count=$company->typeHasMany->count();

        if($type_count==0){
            $company->delete();
            return redirect()->route("company.index")->with('success_message', 'kompanija ištrinta sėkmingai');
        }
        return redirect()->route("company.index")->with('error_message', 'kompanija turi tipus');

    }
}
