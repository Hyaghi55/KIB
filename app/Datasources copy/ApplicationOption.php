<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApplicationOption extends Model
{
 
      protected $fillable = [
        'option_id', 'application_id', 'option_value',
    ];

         public function option()
    {
    	return $this->belongsTo('App\Option','option_id');
    }
    
    public function application()
    {
    	return $this->belongsTo('App\Application',"application_id");
    }

  


    public static  function application_option_create($option_id,$option_value,$application_id)
    {
        $application_option=new ApplicationOption;
        $application_option->option_id=$option_id;
        $application_option->application_id=$application_id;
        $application_option->option_value=$option_value;
        $application_option->save();
        return $application_option;
    }


        public static function application_option_update($id,$option_id,$option_value,$application_id)
    {
        $application_option=ApplicationOption::find($id);
        $application_option->option_id=$option_id;
        $application_option->application_id=$application_id;
        $application_option->option_value=$option_value;
        $application_option->save();
        return $application_option;
    }



    public static function application_option_delete($application_id)
    {
        $application_options=ApplicationOption::where('application_id',$application_id)->get();
        foreach ($application_options as $key => $application_option) {
            $application_option->delete();
        }
    }


}
