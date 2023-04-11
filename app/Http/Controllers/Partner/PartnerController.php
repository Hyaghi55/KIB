<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Storage;
class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners=Partner::partner_index();
        return view('admin.partner.index',compact('partners'));
    }

        public function index_api()
    {
        $partners=Partner::partner_index();
    return response()->json(['status' => True, 'data' => $partners, 'message' => '']);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partner.create');
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
        $title=$data['title'];
        $url=$data['url'];
 
      if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
        Partner::partner_create($title,$url,$image);
         return redirect('/admin/partner/index');
    }
    return Redirect::back()->withErrors('The image input must not be empty');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partner=Partner::partner_show($id);
        return view('admin.partner.update',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request)
    {   
        $data=$request->all();
        $id=$request['id'];
        $title=$data['title'];
        $url=$data['url'];
 
      if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
      Partner::partner_update($id,$title,$url,$image);
    }
    else
    {
        $partner=Partner::partner_show($id);
      Partner::partner_update($id,$title,$url,$partner->image);
    }

       
         return redirect('/admin/partner/index');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $partner=Partner::partner_delete($id);
        return redirect('/admin/partner/index');
    }
}
