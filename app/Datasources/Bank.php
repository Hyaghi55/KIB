<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
      protected $fillable = [
        'en_name', 'ar_name', 'city_id',
    ];

    public function city()
    {
    	return $this->belongsTo('App\City','city_id');
    }

    public static function bank_index()
    {
    	$banks=Bank::with('city')->get();
    	return $banks;
    }

    public static function bank_create($en_name,$ar_name,$city_id)
    {
    	$bank=new Bank;
    	$bank->en_name=$en_name;
    	$bank->ar_name=$ar_name;
    	$bank->city_id=$city_id;
    	$bank->save();
    	return $bank;
    }

    public static function bank_update($id,$en_name,$ar_name,$city_id)
    {
    	$bank=Bank::find($id);
    	$bank->en_name=$en_name;
    	$bank->ar_name=$ar_name;
    	$bank->city_id=$city_id;
    	$bank->save();
    	return $bank;
    }

    public static function bank_delete($id)
    {
    	$bank=Bank::find($id);
    	$bank->delete();
    }

        public static function bank_show($id)
    {
        $bank=Bank::find($id);
        return $bank;
    }
}
