<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class News extends Model
{
          protected $fillable = [
        'ar_title', 'en_title','en_body','ar_body'
    ];



       public function media()
    {
        return $this->hasMany('App\Media','content_id')->where('content_type','news');
    }

        public static function news_index()
    {
    	$news=News::with('media')->get();
    	return  $news;
    }


            public static function news_show($id)
    {
        $news=News::where('id',$id)->with('media')->first();
        return  $news;
    }


        public static function news_create($en_title,$ar_title,$en_body,$ar_body)
    {
    	$news=new News;
    	$news->ar_title=$ar_title;
    	$news->en_title=$en_title;
    	$news->en_body=$en_body;
    	$news->ar_body=$ar_body;
    	$news->save();
    	return $news;
    }

     public static function news_update($id,$ar_title,$en_title,$en_body,$ar_body)
    {
    	$news=News::find($id);
    	$news->ar_title=$ar_title;
    	$news->en_title=$en_title;
    	$news->en_body=$en_body;
    	$news->ar_body=$ar_body;
    	$news->save();
    	return $news;
    }

    public static function news_delete($id)
    {
    	$news=News::find($id);
    	$news->delete();
    }

       public function getTitle()
{
 $str =  Session::get('locale').'_title';
 $title=$this[$str];
 return $title;
}

   public function getBody()
{
 $str =  Session::get('locale').'_body';
 $description=$this[$str];
 return $description;
}
}
