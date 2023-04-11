<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Auth;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

       public function contactSaveData(Request $request)
   {
    if (Auth::check()) {
    $user_id=Auth::user()->id;
    }
    $user_id=0;
    $service_id=$request['service_id'];
    // $service_id=1;
    $reason=$request['message'];
    Complaint::complaint_create($user_id,$service_id,$reason);

      Complaint::complaint_create($user_id,$service_id,$reason); 
              Mail::send('emails.contactus', ['name' => $request->post('name'),'email'=> $request->post('email'),'message1'=>$request->post('message'),'service'=>$request->post('service_id'),'type'=>$request->post('type')], function ($m) use ($request) {
            $m->from('KIB@khouryinsurance.com', 'Complaint');

            $m->to("info@khouryinsurance.com","KIB")->subject('Contact Us E-Mail');
        });
 
    return back()->with('success', 'Thanks for contacting us!'); 
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
