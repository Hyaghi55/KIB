<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
class Service extends Model
{
     protected $fillable = [
        'en_title', 'ar_title','en_subtitle','ar_subtitle','en_description','ar_description','parent_id','','active','type','icon',
    ];

         public function prices()
    {
        return $this->hasMany('App\Price');
    }

    public function media()
    {
        return $this->hasMany('App\Media','content_id');//->where('content_type','service');
    }

    public function cover()
    {
        if ($this->media != null){
            if (count($this->media) > 0){
                return $this->media[0]->url;
            }
        }
        return "";
    }



    public function proudct_cover()
    {
        if ($this->product_media != null){
            if (count($this->product_media) > 0){
                return $this->product_media[0]->url;
            }
        }
        return "";
    }


    public function icon()
    {
        if ($this->icon != null){
            return $this->icon;
        }
        return "";
    }

     public function partner()
    {
        return $this->belongsToMany('App\Partner','partner_services')->as('partner')->withPivot('partner_id')->withTimestamps();
    }

    public function product_media()
    {
        return $this->hasMany('App\Media','content_id')->where('content_type','product');
    }

    public function product_cover()
    {
        if ($this->product_media != null){
            if (count($this->product_media) > 0){
                return $this->product_media[0]->url;
            }
        }
        return "";
    }

       public function quotation()
    {
        return $this->hasOne('App\Media','content_id')->where('content_type','service')->where('media_type');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }


        public function sons()
    {
    	return $this->HasMany('App\Service','parent_id')->where('active',1);
    }


    public static function service_index()
    {
    	$services=Service::where('type','service')->where('active',1)->with('media','sons','options','prices','partner')->get();
    	return $services;
    }



    public static function service_show($id)
    {
        $services=Service::where('type','service')->where('id',$id)->where('active',1)->with('media','sons','options','partner','prices')->first();
        return $services;
    }

    public static function product_show($id)
    {
        $services=Service::where('type','product')->where('active',1)->where('id',$id)->with('product_media','sons','options','prices')->first();
        return $services;
    }



    public static function product_index()
    {
        $services=Service::where('type','product')->with('media','sons','options')->get();
        return $services;
    }

     public static function service_index_fathers()
    {
        $services=Service::where('parent_id','0')->where('active',1)->where('type','service')->with('media','sons','prices')->get();
        return $services;
    }


         public static function service_index_fathers_main()
    {
        $services=Service::where('parent_id','0')->where('active',1)->where('type','service')->orderBy('id', 'ASC')->with('media','sons','prices')->limit(10)->get();
        return $services;
    }



     public static function fathers()
    {
        $services=Service::where('parent_id','0')->where('active',1)->with('media','sons','prices')->get();
        return $services;
    }

    public static function admin_service_index_fathers()
   {
       $services=Service::where('parent_id','0')->where('type','service')->with('media','sons','prices')->get();
       return $services;
   }


    public static function product_index_fathers()
    {
        $services=Service::where('parent_id','0')->where('active',1)->where('type','product')->with('product_media','sons')->get();
        return $services;
    }

    public static function admin_product_index_fathers()
    {
        $services=Service::where('parent_id','0')->where('type','product')->with('product_media','sons')->get();
        return $services;
    }



    public static function admin_service_index_sons($service_id)
  {
      $services=Service::where('parent_id',$service_id)->with('media','sons','prices','options')->get();
      return $services;
  }

      public static function service_index_sons($service_id)
    {
        $services=Service::where('parent_id',$service_id)->where('active',1)->with('media','sons','prices','options')->get();
        return $services;
    }

    public static function service_all_sons()
    {
        $services=Service::where('parent_id','!=',0)->where('type','service')->where('active',1)->with('media','sons','prices','options')->get();
        return $services;
    }

      public static function product_all_sons()
    {
        $services=Service::where('parent_id','!=',0)->where('active',1)->where('type','product')->with('media','sons','prices','options')->get();
        return $services;
    }

            public static function index()
    {
        $services=Service::where('parent_id','0')->where('active',1)->with('media','sons','options','prices','partner')->get();
        return $services;
    }

               public static function sons_index()
    {
        $services=Service::where('parent_id','!=','0')->where('active',1)->with('media','sons','options','prices','partner')->get();
        return $services;
    }





    public static function service_create($en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$type,$icon)
    {
    	$service=new Service;
    	$service->en_title=$en_title;
    	$service->ar_title=$ar_title;
    	$service->en_subtitle=$en_subtitle;
        $service->ar_subtitle=$ar_subtitle;
    	$service->en_description=$en_description;
    	$service->ar_description=$ar_description;
    	$service->parent_id=$parent_id;
        $service->type=$type;
        $service->icon=$icon;
    	$service->active=1;
    	$service->save();
    	return $service;
    }


    public static function service_update($id,$en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$icon)
    {
    	$service=Service::find($id);
    	$service->en_title=$en_title;
    	$service->ar_title=$ar_title;
    	$service->en_subtitle=$en_subtitle;
        $service->ar_subtitle=$ar_subtitle;
    	$service->en_description=$en_description;
    	$service->ar_description=$ar_description;
    	// $service->parent_id=$parent_id;
        $service->icon=$icon;
    	$service->save();
    	return $service;
    }

        public static function service_delete($id)
    {
    	$service=Service::find($id);
    	$service->delete();
    }


    public static function service_active($id)
    {
    	$service=Service::find($id);
    	if ($service->active==1) {
    		$service->active=0;
    	}
    	else
    	{
    		$service->active=1;
    	}
      $service->save();
      return $service;
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
