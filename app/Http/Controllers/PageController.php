<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
Use Redirect;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



       protected function validator_page(array $data)
    {


        return Validator::make($data, [
            'en_name' => ['required', 'string', 'max:255'],
             'ar_name' => ['required', 'string', 'max:255'],
              'en_description' =>  ['required', 'string'],
            'ar_description' => ['required', 'string'],
             'link' => ['required',],
             'img_name' => ['required'],
             

        ]);
    }


        protected function validator_update(array $data)
    {


        return Validator::make($data, [
            'en_name' => ['required', 'string', 'max:255'],
             'ar_name' => ['required', 'string', 'max:255'],
              'en_description' =>  ['required', 'string'],
            'ar_description' => ['required', 'string'],
             'link' => ['required',],

        ]);
    }
    public function index()
    {
        $pages=Page::page_index();
        return view('admin.page.index',compact('pages'));
    }

      public function who_we_are()
    {
        $pages=Page::who_we_are();
        return compact('pages');
    }


    public function what_we_treat()
    {
        $pages=Page::what_we_treat();
        return compact('pages');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = $this->validator_page($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
            $en_name=$request['en_name'];
            $ar_name=$request['ar_name'];
            $en_description=$request['en_description'];
            $ar_description=$request['ar_description'];
            $link=$request['link'];

    if($request->hasFile('img_name'))
        {  
            $file=$request->file('img_name');                  
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().$imagename);
            $img_name=str_replace('public/', '', $path_img);
            Page::page_create($en_name,$en_description,$ar_name,$ar_description,$img_name,$link);

            return redirect('/admin/page/index');
        }   

            return Redirect::back()->withErrors('The image input must not be empty');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $page=Page::page_show($id);
          return view('admin.page.update',compact('page'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {

            $validator = $this->validator_update($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
        $id=$request['id'];
        $en_name=$request['en_name'];
        $ar_name=$request['ar_name'];
        $en_description=$request['en_description'];
        $ar_description=$request['ar_description'];
        $link=$request['link'];
        $image=$request['img_name'];
    if($request->hasFile('img_name'))
        {  
            $file=$request->file('img_name');                  
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().$imagename);
            $img_name=str_replace('public/', '', $path_img);
            Page::page_update($id,$en_name,$en_description,$ar_name,$ar_description,$img_name,$link);

            return redirect('/admin/page/index');
        }   

        $page=Page::page_show($id);
          Page::page_update($id,$en_name,$en_description,$ar_name,$ar_description,$page->image,$link);
          
           return redirect('/admin/page/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id=$request['id'];
        $page=Page::page_show($id);
        Storage::delete('public'.$page->image);
        $page->delete();
        return redirect('/admin/page/index');
    }
}
