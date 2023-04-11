<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Storage;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies=Company::company_index();
        return view('admin.company.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
      {   
        $data=$request->all();
        $name=$data['name'];
        $link=$data['link'];
 
      if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
        Company::company_create($name,$link,$image);
         return redirect('/admin/company/index');
    }
    return Redirect::back()->withErrors('The image input must not be empty');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company=Company::company_show($id);
        return view('admin.company.update',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {   
        $data=$request->all();
        $id=$request['id'];
        $name=$data['name'];
        $link=$data['link'];
 
      if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
      Company::company_update($id,$name,$link,$image);
    }
    else
    {
        $company=Company::company_show($id);
      Company::company_update($id,$name,$link,$company->image);
    }

       
         return redirect('/admin/company/index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $company=Company::company_delete($id);
        return redirect('/admin/company/index');
    }
}
