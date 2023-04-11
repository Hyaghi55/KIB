<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use App\News;
use App\Slider;
use App\Service;
use Illuminate\Support\Facades\Storage;
class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($content_id,$content_type)
    {
        $media=Media::get($content_id,$content_type);
        return view('admin.media.create',compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content_id=$request['content_id'];
        $content_type=$request['content_type'];
        $media_type=$request['media_type'];
              if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
        Media::media_create($image,$media_type,$content_id,$content_type);
         return redirect('/admin/media/index/'.$content_id.'/'.$content_type);
    }

     return redirect('/admin/media/index/'.$content_id.'/'.$content_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media=Media::media_show($id);
        return view('admin.media.update',compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request['id'];
        $media=Media::media_show($id);
              if($request->file('image')!= null){

            $path;
            if(request()->file('image')->isValid()){
                $path = $request->file('image')->storeAs('public', time().'.jpg');
                $image=str_replace('public/', '', $path);
                if(empty($path)){
                    return response()->json([],400);
                }

            }
        Media::media_update($id,$image);
         return redirect('/admin/media/index/'.$media->content_id.'/'.$media->content_type);
    }

    return redirect('/admin/media/index/'.$media->content_id.'/'.$media->content_type);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $media)
    {
        //
    }

    public function get_by_type(Request $request)
    {
        $content_type=$request['content_type'];
        $content_id=$request['content_id'];
        $medias=Media::media_by_type($content_id,$content_type);
        
        // return compact('medias');

        return view('admin.media.index',compact('medias'));
    }


        public function delete($id)
    {
        $media=Media::media_show($id);
        Storage::delete('public'.$media->url);
        Media::media_delete($id);
        return redirect('/admin/media/index/'.$media->content_id.'/'.$media->content_type); 
    }
}
