<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Media;
use Session;
class Gallery extends Model
{
       protected $fillable = [
        'ar_title', 'en_title','en_description','ar_description'
    ];


       public function media()
    {
    	return $this->hasMany('App\Media','content_id')->where('content_type','gallery');
    }

        public static function gallery_index()
    {
    	$galleries=Gallery::with('media')->get();
    	return  $galleries;
    }


     public static function gallery_show($gallery_id)
    {
        $gallery=Gallery::where('id',$gallery_id)->with('media')->first();
        return  $gallery;
    }


        public static function gallery_create($ar_title,$en_title,$en_description,$ar_description)
    {
    	$gallery=new Gallery;
    	$gallery->ar_title=$ar_title;
    	$gallery->en_title=$en_title;
        $gallery->en_description=$en_description;
        $gallery->ar_description=$ar_description;
    	$gallery->save();
    	return $gallery;
    }

      public static function gallery_update($id,$ar_title,$en_title,$en_description,$ar_description)
    {
    	$gallery=Gallery::find($id);
    	$gallery->ar_title=$ar_title;
    	$gallery->en_title=$en_title;
        $gallery->en_description=$en_description;
        $gallery->ar_description=$ar_description;
    	$gallery->save();
    	return $gallery;
    }

    public static function gallery_delete($id)
    {
    	$gallery=Gallery::find($id);
        foreach ($gallery->media as $media) {
            Media::media_delete($media->id);
        }
    	$gallery->delete();
    }

        public function getTitle()
{
 $str =  Session::get('locale').'_title';
 $title=$this[$str];
 return $title;
}

   public function getDescription()
{
 $str =  Session::get('locale').'_description';
 $description=$this[$str];
 return $description;
}


}
