<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
     protected $fillable = [
        'name', 'link', 'image',
    ];



    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public static function company_index()
    {
    	$compamies=Company::all();
    	return $compamies;
    }

    public static function company_create($name,$link,$image)
    {
    	$company=new Company;
    	$company->name=$name;
    	$company->link=$link;
    	$company->image=$image;
    	$company->save();
    	return $company;
    }

    public static function company_update($id,$name,$link,$image)
    {
    	$company=Company::find($id);
    	$company->name=$name;
    	$company->link=$link;
    	$company->image=$image;
    	$company->save();
    	return $company;
    }

public static function company_delete($id)
{
	$company=Company::find($id);
	$company->delete();
}
    public static function company_show($id)
{
    $company=Company::find($id);
    return $company;
}
}
