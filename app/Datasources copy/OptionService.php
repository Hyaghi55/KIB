<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OptionService extends Model
{
     public function option()
    {
    	return $this->belongsTo('App\Option','option_id');
    }
    
    public function service()
    {
    	return $this->belongsTo('App\Service',"service_id");
    }

     protected $fillable = [
        'option_id', 'service_id', 'option_value',
    ];


    public static  function option_create($option_id,$option_value,$service_id)
    {
        $option_service=new OptionService;
        $option_service->option_id=$option_id;
        $option_service->service_id=$service_id;
        $option_service->option_value=$option_value;
        $option_service->save();
        return $option_service;
    }


        public static function option_update($id,$option_id,$option_value,$service_id)
    {
        $option_service=OptionService::find($id);
        $option_service->option_id=$option_id;
        $option_service->service_id=$service_id;
        $option_service->option_value=$option_value;
        $option_service->save();
        return $option_service;
    }
}
