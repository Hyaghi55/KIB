<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable = [
        'type', 'data',
    ];

    public static function contact_index()
    {
    	$contacts=Contact::all();
    	return  $contacts;
    }


   

          public static function phones()
    {
        $contact=Contact::where('type','phone')->get();
        return  $contact;
    }

          public static function facebook()
    {
        $contact=Contact::where('type','facebook')->get();
        return  $contact;
    }

              public static function twitter()
    {
        $contact=Contact::where('type','twitter')->get();
        return  $contact;
    }


        public static function instagram()
    {
        $contact=Contact::where('type','twitter')->get();
        return  $contact;
    }


        public static function email()
    {
        $contact=Contact::where('type','email')->get();
        return  $contact;
    }





          public static function contact_show($id)
    {
        $contact=Contact::find($id);
        return  $contact;
    }


    public static function contact_create($type,$data)
    {
    	$contact=new Contact;
    	$contact->type=$type;
    	$contact->data=$data;
    	$contact->save();
    	return $contact;
    }

      public static function contact_update($id,$type,$data)
    {
    	$contact=Contact::find($id);
    	$contact->type=$type;
    	$contact->data=$data;
    	$contact->save();
    	return $contact;
    }

    public static function contact_delete($id)
    {
    	$contact=Contact::find($id);
    	$contact->delete();
    }
}
