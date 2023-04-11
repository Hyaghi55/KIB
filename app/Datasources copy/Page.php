<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Media;
use Session;
class Page extends Model
{
	protected $fillable = [

	'en_name','en_description','ar_name','ar_description','image','link'
];
    

         public static function page_index()
    {
    	$pages=Page::all();
    	return  $pages;
    }



         public static function page_show($id)
    {
        $pages=Page::find($id);
        return  $pages;
    }



         public static function about_us()
    {
        $page=Page::where('en_name','about')->first();
        return  $page;
    }





        public static function page_create($en_name,$en_description,$ar_name,$ar_description,$image,$link)
    {
    	$page=new Page;
    	$page->en_name=$en_name;
    	$page->en_description=$en_description;
    	$page->ar_name=$ar_name;
    	$page->ar_description=$ar_description;
    	$page->image=$image;
    	$page->link=$link;
    	$page->save();
    	return $page;
    }

      public static function page_update($id,$en_name,$en_description,$ar_name,$ar_description,$image,$link)
    {
    	$page=Page::find($id);
    	$page->en_name=$en_name;
    	$page->en_description=$en_description;
    	$page->ar_name=$ar_name;
    	$page->ar_description=$ar_description;
    	$page->image=$image;
    	$page->link=$link;
    	$page->save();
    	return $page;
    }


       public static function page_delete($id)
    {
    	$page=Page::find($id);
    	$page->delete();
    }


        public function getName()
{
 $str =  Session::get('locale').'_name';
 $title=$this[$str];
 return $title;
}

   public function getDescription()
{
 $str = Session::get('locale').'_description';
 $description=$this[$str];
 return $description;
}

}
