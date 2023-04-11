<?php

namespace App\Http\Controllers;

use App\News;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::news_index();
        return view('admin.news.index',compact('news'));
    }

        public function index_api()
    {
        $news=News::news_index();
        foreach ($news as $new) {
            foreach ($new->media as $media1) {
                $media1->url=env('website_link').env('image_storage').$media1->url;
            }
        }
        // return view('admin.gallery.index',compact('galleries'));
         return response()->json(['status' => True, 'data' => $news, 'message' => '','type'=>'array']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
        $ar_title=$data['ar_title'];
        $en_title=$data['en_title'];
        $en_body=$data['en_body'];
        $ar_body=$data['ar_body'];
        $content_type='news';
        $media_type='image';
        $news=News::news_create($en_title,$ar_title,$en_body,$ar_body);

                    if($request->hasFile('image')){
            foreach($request->file('image') as $file) {                    
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().$imagename);
             $img_name=str_replace('public/', '', $path_img);
             Media::media_create($img_name,$media_type,$news->id,$content_type);
            
             }
             return redirect('/admin/news/index');
        }
    return Redirect::back()->withErrors('The image input must not be empty');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news=News::news_show($id);
        return view('admin.news.update',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request['id'];
        $ar_title=$request['ar_title'];
        $en_title=$request['en_title'];
        $en_body=$request['en_body'];
        $ar_body=$request['ar_body'];
        News::news_update($id,$en_title,$ar_title,$en_body,$ar_body);
        return redirect('/admin/news/index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $new=News::news_show($id);
        foreach ($new->media as $image) {
        Storage::delete('public'.$image->url);
        }
        News::news_delete($id);
return redirect('/admin/news/index'); 
    }
}
