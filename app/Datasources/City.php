<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
      protected $fillable = [
        'ar_title', 'en_title', 'city_id'
    ];


    public function users()
    {
    	return $this->hasMany('App\User');
    }

    public static function get_cities($id)
    {
    	$cities=City::where('city_id',$id)->get();
        return $cities;
    }

      public static function get_cities_api()
    {
        $cities=City::where('city_id','!=',0)->get();
        return $cities;
    }
    public static function city_index()
    {
    	$cities=City::all();
    	return $cities;
    }

        public static function city_parent_index()
    {
    	$cities=City::where('city_id',0)->get();
    	return $cities;
    }


            public static function city_all()
    {
        $cities=City::where('city_id','!=',0)->get();
        return $cities;
    }


        public static function city_show($id)
    {
    	$city=City::find($id);
    	return $city;
    }



    public static function city_create($ar_title,$en_title,$city_id)
    {
    	$city= new City;
    	$city->ar_title=$ar_title;
    	$city->en_title=$en_title;
    	$city->city_id=$city_id;
    	$city->save();
    	return $city;
    }


    public static function city_update($id,$ar_title,$en_title,$city_id)
    {
    	$city=City::find($id);
    	$city->ar_title=$ar_title;
    	$city->en_title=$en_title;
    	$city->city_id=$city_id;
    	$city->save();
    	return $city;
    }


           public static function city_delete($id)
    {
    	$city=City::find($id);
    	$city->delete();
    }

}
