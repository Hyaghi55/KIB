<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
           protected $fillable = [
      'applicant_name_en','applicant_name_ar', 'service_id','user_id','date','code','birthdate','nationality','national_id','martial_status','work','cost','is_date','confirm','paid'
    ];

    public function service()
    {
    	return $this->BelongsTo('App\Service','service_id');
    }

    public function user()
    {
    	return $this->BelongsTo('App\User','user_id');
    }

    public function options()
    {
    	   return $this->belongsToMany('App\Option','application_options')->as('app_option')->withpivot('option_value')->withTimestamps();
    }

    public static function application_index()
    {
    	$applications=Application::where('confirm',1)->with('service','user','options')->get();
    	return $applications;
    }


        public static function application_index_by_service($service_id)
    {
      $applications=Application::where('confirm',1)->where('service_id',$service_id)->with('service','user','options')->get();
      return $applications;
    }


    


        public static function application_show($id)
    {
        $application=Application::where('id',$id)->with('service','user','options')->first();
        return $application;
    }


            public static function application_show_by_code($code)
    {
        $application=Application::where('code',$code)->with('service','user','options')->first();
        return $application;
    }


    public static function confirm($id)
    {
      $application=Application::find($id);
      $application->confirm=1;
      $application->save();
      return $application;
    }

    public static function  application_create($applicant_name_en,$applicant_name_ar,$service_id,$user_id,$date,$code,$birthdate,$nationality,$national_id,$martial_status,$work,$is_date)
    {
      $application=new Application;
      $application->applicant_name_en=$applicant_name_en;
      $application->applicant_name_ar=$applicant_name_ar;
      $application->service_id=$service_id;
      $application->user_id=$user_id;
      $application->date=$date;
      $application->code=$code;
      $application->birthdate=$birthdate;
      $application->nationality=$nationality;
      $application->national_id=$national_id;
      $application->martial_status=$martial_status;
      $application->work=$work;
      $application->confirm=0;
      $application->cost=0;
      $application->paid='1';
      $application->is_date=$is_date;
      $application->save();
    	return $application;
    }

        public static function application_update($applicant_name_en,$applicant_name_ar,$id,$service_id,$user_id,$date,$code)
    {
      $application=Application::find($id);
      $application->applicant_name_en=$applicant_name_en;
      $application->applicant_name_ar=$applicant_name_ar;
      $application->service_id=$service_id;
      $application->user_id=$user_id;
      $application->date=$date;
      $application->code=$code;
      $application->nationality=$nationality;
      $application->national_id=$national_id;
      $application->martial_status=$martial_status;
      $application->work=$work;
      $application->cost=0;
      $application->save();
    	return $application;
    }

    public static function application_update_cost($id,$cost)
    {
        $application=Application::find($id);
        $application->cost=$cost;
        $application->save();
        return $application;
    }

         public static function application_delete($id)
    {
      $application=Application::where('id',$id)->with('service','user','options')->first();
    	$application->delete();
    }


             public static function application_pay($id,$code)
    {
      $application=Application::where('id',$id)->with('service','user','options')->first();
      if($application->code==$code) {
      	$application->pay='1';
      	return $application;
      }
    	return false;
    }
    

}
