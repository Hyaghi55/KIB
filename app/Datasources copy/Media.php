<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    



           protected $fillable = [
        'url', 'media_type', 'content_id','content_type',
    ];




    public static function get_by_category($content_id,$content_type)
    {
        $medias=Media::where('content_id',$content_id)->where('content_type',$content_type)->get();
        return $medias;
    }

      public static function get($content_id,$content_type)
    {
        $medias=Media::where('content_id',$content_id)->where('content_type',$content_type)->first();
        return $medias;
    }

        public static function media_create($url,$media_type,$content_id,$content_type)
    {
    	$media=new Media;
    	$media->url=$url;
    	$media->media_type=$media_type;
    	$media->content_id=$content_id;
    	$media->content_type=$content_type;
    	$media->save();
    	return $media;
    }

    // public static function media_update($id,$url,$media_type,$content_id,$content_type)
    public static function media_update($id,$url)
    {
    	$media=Media::find($id);
    	$media->url=$url;
    	// $media->media_type=$media_type;
    	// $media->content_id=$content_id;
    	// $media->content_type=$content_type;
    	$media->save();
    	return $media;
    }

    public static function media_delete($id)
    {
    	$media=Media::find($id);
    	$media->delete();
    }


    public static function media_by_type($content_id,$content_type)
    {
        $medias= Media::where('content_id',$content_id)->where('content_type',$content_type)->get();
        return $medias;
    }

        public static function media_show($id)
    {
        $media=Media::find($id);
        return $media;
    }
}