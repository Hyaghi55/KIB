<?php

namespace App\Http\Controllers;

use App\Portal;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
class PortalController extends Controller
{


     protected function validator_portal(array $data)
    {


        return Validator::make($data, [
             'portal' => ['required',],
             'company_id' => ['required'],
             

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $portals=Portal::portal_index();
     return view('admin.portal.index',compact('portals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=User::company_index();
        return view('admin.portal.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $validator = $this->validator_portal($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
         $company_id=$request['company_id'];
         $portal=$request['portal'];
         Portal::portal_create($company_id,$portal);
         return redirect('/admin/portal/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function show(Portal $portal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id=$request['id'];
          $companies=User::company_index();
        $portal=Portal::portal_show($id);
         return view('admin.portal.update',compact('portal','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portal $portal)
    {
          $validator = $this->validator_portal($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
        $id=$request['id'];
        $company_id=$request['company_id'];
         $portal=$request['portal'];
         Portal::portal_update($id,$company_id,$portal);
          return redirect('/admin/portal/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id=$request['id'];
         Portal::portal_delete($id);
        return redirect('/admin/portal/index');    
    }
}
