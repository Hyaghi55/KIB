<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus=AboutUs::aboutus_index();
        return view('admin.about_us.index',compact('aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $description=$request['description'];
        $address=$request['address'];
        $lat=$request['lat'];
        $lang=$request['lang'];
       $aboutus=AboutUs::aboutus_insert($description,$address,$lat,$lang);
        return redirect('admin/about/index');     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutus=AboutUs::aboutus_show($id);
        return view('admin.about_us.update',compact('aboutus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutUs $aboutUs)
    {
        $id=$request['id'];
        $description=$request['description'];
        $address=$request['address'];
        $lat=$request['lat'];
        $lang=$request['lang'];
       $aboutus=AboutUs::aboutus_update($id,$description,$address,$lat,$lang);
        return redirect('admin/about/index');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $aboutus=AboutUs::aboutus_delete($id);
        return redirect('admin/about/index');  
    }


        public function index_api()
    {
        $aboutus=AboutUs::aboutus_index();
        return response()->json(['status' => True, 'data' => $aboutus, 'message' => '','type'=>'array']);
    }



}
