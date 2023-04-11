<?php

namespace App\Http\Controllers;

use App\Contact;
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
        $contacts=Contact::contact_index();
        return view('admin.contact.index',compact('contacts'));
    }

    
        public function index_api()
    {
        $phones=Contact::phones();
        $facebook=Contact::facebook();
        $twitter=Contact::twitter();
        $instagram=Contact::instagram();
        $email=Contact::email();
        return response()->json(['status' => True, 'data' => compact('phones','facebook','twitter','instagram','email'), 'message' => '']);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type=$request['type'];
        $data=$request['data'];
        Contact::contact_create($type,$data);   
        return redirect('/admin/contact/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=Contact::contact_show($id);
        return view('admin.contact.update',compact('contact'));
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
        $id=$request['id'];
        $type=$request['type'];
        $data=$request['data'];
        Contact::contact_update($id,$type,$data);   
        return redirect('/admin/contact/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id=$request['id'];
        Contact::contact_delete($id);
        return redirect('/admin/contact/index');
    }
}
