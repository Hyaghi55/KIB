<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
     protected $fillable = [
        'en_title', 'ar_title','en_subtitle','ar_subtitle','en_description','ar_description','parent_id','company_id','portal_link','active','type'
    ];

       public function media()
    {
        return $this->hasMany('App\Media','content_id')->where('content_type','service');
    }

     public function partner()
    {
        return $this->belongsToMany('App\Partner','partner_options')->as('partner')->withPivot('value')->withTimestamps();
    }

         public function product_media()
    {
        return $this->hasMany('App\Media','content_id')->where('content_type','product');
    }

       public function quotation()
    {
        return $this->hasOne('App\Media','content_id')->where('content_type','service')->where('media_type','quotation');
    }

    public function options()
    {
        return $this->hasMany('App\Option');
    }

    public function company()
    {
    	return $this->BelongsTo('App\Company','company_id');
    }

        public function sons()
    {
    	return $this->HasMany('App\Service','parent_id');
    }


    public static function service_index()
    {
    	$services=Service::where('type','service')->with('media','sons','company','options','quotation')->get();
    	return $services;
    }



    public static function service_show($id)
    {
        $services=Service::where('type','service')->where('id',$id)->with('media','sons','company','options','quotation')->first();
        return $services;
    }

    public static function product_show($id)
    {
        $services=Service::where('type','product')->where('id',$id)->with('product_media','sons','company','options','quotation')->first();
        return $services;
    }



    public static function product_index()
    {
        $services=Service::where('type','product')->with('product_media','sons','company','options','quotation')->get();
        return $services;
    }

     public static function service_index_fathers()
    {
        $services=Service::where('parent_id','0')->where('type','service')->with('media','sons','company','quotation')->get();
        return $services;
    }


        public static function product_index_fathers()
    {
        $services=Service::where('parent_id','0')->where('type','product')->with('product_media','sons','company','quotation')->get();
        return $services;
    }


      public static function service_index_sons($service_id)
    {
        $services=Service::where('parent_id',$service_id)->with('media','sons','company','quotation')->get();
        return $services;
    }

         public static function service_all_sons()
    {
        $services=Service::where('parent_id','!=',0)->with('media','sons','company','quotation')->get();
        return $services;
    }


    public static function service_create($en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$company_id,$portal_link,$type)
    {
    	$service=new Service;
    	$service->en_title=$en_title;
    	$service->ar_title=$ar_title;
    	$service->en_subtitle=$en_subtitle;
        $service->ar_subtitle=$ar_subtitle;
    	$service->en_description=$en_description;
    	$service->ar_description=$ar_description;
    	$service->parent_id=$parent_id;
    	$service->company_id=$company_id;
    	$service->portal_link=$portal_link;
        $service->type=$type;
    	$service->active=1;
    	$service->save();
    	return $service;
    }


        public static function service_update($id,$en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$company_id,$portal_link)
    {
    	$service=Service::find($id);
    	$service->en_title=$en_title;
    	$service->ar_title=$ar_title;
    	$service->en_subtitle=$en_subtitle;
        $service->ar_subtitle=$ar_subtitle;
    	$service->en_description=$en_description;
    	$service->ar_description=$ar_description;
    	$service->parent_id=$parent_id;
    	$service->company_id=$company_id;
    	$service->portal_link=$portal_link;
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
    	if ($service->active=='active') {
    		$service->active='inactive';
    	}
    	else
    	{
    		$service->active='active';
    	}
    }

}
