<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portal extends Model
{
    
       protected $fillable = [
        'company_id','portal',
    ];

    public function company()
    {
        return $this->belongsTo('App\User','company_id')->where('role','company');
    }


     public static function portal_index()
    {
    	$portals=Portal::with('company')->get();
    	return  $portals;
    }

         public static function portal_show($id)
    {
    	$portals=Portal::where('id',$id)->with('company')->first();
    	return  $portals;
    }


             public static function portal_by_company($company_id)
    {
        $portals=Portal::where('company_id',$company_id)->get();
        return  $portals;
    }


        public static function portal_create($company_id,$portal)
    {
    	$portal1=new Portal;
    	$portal1->company_id=$company_id;
    	$portal1->portal=$portal;
    	$portal1->save();
    	return $portal1;
    }

      public static function portal_update($id,$company_id,$portal)
    {
    	$portal1=Portal::find($id);
    	$portal1->company_id=$company_id;
    	$portal1->portal=$portal;
    	$portal1->save();
    	return $portal1;
    }


       public static function portal_delete($id)
    {
    	$portal=Portal::find($id);
    	$portal->delete();
    }
}
