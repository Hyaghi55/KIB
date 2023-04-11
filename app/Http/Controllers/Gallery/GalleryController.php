<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{

         protected function validator_gallery(array $data)
    {
        return Validator::make($data, [
            'en_title' => ['required', 'string', 'max:255'],
            'ar_title' => ['required', 'string', 'max:255'],
            'en_description' => ['required', 'string'],
            'ar_description' => ['required', 'string'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries=Gallery::gallery_index();
        return view('admin.gallery.index',compact('galleries'));
    }

        public function index_api()
    {
        $galleries=Gallery::gallery_index();
        foreach ($galleries as $gallery) {
            foreach ($gallery->media as $media1) {
                $media1->url=env('website_link').env('image_storage').$media1->url;
            }
        }
        // return view('admin.gallery.index',compact('galleries'));
         return response()->json(['status' => True, 'data' => $galleries, 'message' => '','type'=>'array']);
    }

           public function show_api($gallery_id)
    {

        // $gallery_id=$request['id'];
        $gallery=Gallery::gallery_show($gallery_id);
            foreach ($gallery->media as $media1) {
                $media1->url=env('website_link').env('image_storage').$media1->url;
        }
        // return view('admin.gallery.index',compact('galleries'));
         return response()->json(['status' => True, 'data' => $gallery, 'message' => '','type'=>'array']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request)
    {
           $validator = $this->validator_gallery($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
        $data=$request->all();
        $ar_title=$data['ar_title'];
        $en_title=$data['en_title'];
        $en_description=$data['en_description'];
        $ar_description=$data['ar_description'];
        $content_type='gallery';
        $media_type='image';
        $gallery=Gallery::gallery_create($ar_title,$en_title,$en_description,$ar_description);

                    if($request->hasFile('image')){
            foreach($request->file('image') as $file) {
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().$imagename);
             $img_name=str_replace('public/', '', $path_img);
             Media::media_create($img_name,$media_type,$gallery->id,$content_type);

             }
             return redirect('/admin/gallery/index');
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
        $gallery=Gallery::gallery_show($id);
        return view('admin.gallery.update',compact('gallery'));
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
           $validator = $this->validator_gallery($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
        $id=$request['id'];
        $ar_title=$request['ar_title'];
        $en_title=$request['en_title'];
        $en_description=$request['en_description'];
        $ar_description=$request['ar_description'];
        Gallery::gallery_update($id,$en_title,$ar_title,$en_description,$ar_description);
        return redirect('/admin/gallery/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $gallery=Gallery::gallery_show($id);
        foreach ($gallery->media as $image) {
        Storage::delete('public'.$image->url);
        }
        Gallery::gallery_delete($id);
return redirect('/admin/gallery/index');
    }
}
