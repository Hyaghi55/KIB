<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Slider extends Model
{
        protected $fillable = [
        'ar_title', 'en_title','en_sub_title','ar_sub_title'
    ];



       public function media()
    {
        return $this->hasMany('App\Media','content_id')->where('content_type','slider');
    }

        public static function slider_index()
    {
    	$slider=Slider::with('media')->get();
    	return  $slider;
    }


            public static function slider_show($id)
    {
        $slider=Slider::where('id',$id)->with('media')->first();
        return  $slider;
    }


        public static function slider_create($en_title,$ar_title,$en_sub_title,$ar_sub_title)
    {
    	$slider=new Slider;
    	$slider->ar_title=$ar_title;
    	$slider->en_title=$en_title;
    	$slider->en_sub_title=$en_sub_title;
    	$slider->ar_sub_title=$ar_sub_title;
    	$slider->save();
    	return $slider;
    }

     public static function slider_update($id,$en_title,$ar_title,$en_sub_title,$ar_sub_title)
    {
    	$slider=Slider::find($id);
    	$slider->ar_title=$ar_title;
    	$slider->en_title=$en_title;
    	$slider->en_sub_title=$en_sub_title;
    	$slider->ar_sub_title=$ar_sub_title;
    	$slider->save();
    	return $slider;
    }

    public static function slider_delete($id)
    {
    	$slider=Slider::find($id);
    	$slider->delete();
    }


        public function getTitle()
{
 $str =  Session::get('locale').'_title';
 $title=$this[$str];
 return $title;
}

   public function getsubtitle()
{
 $str =  Session::get('locale').'_sub_title';
 $description=$this[$str];
 return $description;
}
}
