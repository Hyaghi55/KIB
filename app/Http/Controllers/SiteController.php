<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Slider;
use App\Gallery;
use App\Application;
use App\Media;
use App\Option;
use App\Partner;
use App\Price;
use App\News;
use App\Sms_helper;
use Carbon\Carbon;
use App\Page;
use Redirect;
use App\User;
use Auth;
use Mail;
use Session;
use App\ApplicationOption;
use Illuminate\Support\Facades\Validator;
class SiteController extends Controller
{


         protected function validator_application(array $data)
    {


        return Validator::make($data, [
            'fname_en' => ['required', 'string', 'max:255'],
             'father_name_en' => ['required', 'string', 'max:255'],
             'lname_en' => ['required', 'string', 'max:255'],
             'fname_ar' => ['required', 'string', 'max:255'],
             'father_name_ar' => ['required', 'string', 'max:255'],
             'lname_ar' => ['required', 'string', 'max:255'],
             'birthdate' =>  ['required', 'date'],
             'service' => ['required',],
             'sub_service' => ['required'],
             'nationality' => ['required', 'string', 'max:255'],
             'national_id' => ['required', 'string', 'max:255'],
             'martial_status' => ['required', 'string', 'max:255'],
             'work' => ['required', 'string', 'max:255'],
            'is_date' =>  ['required'],

        ]);
    }



             protected function validator_application_mobile(array $data)
    {


        return Validator::make($data, [
            'fname_en' => ['required', 'string', 'max:255'],
             'father_name_en' => ['required', 'string', 'max:255'],
             'lname_en' => ['required', 'string', 'max:255'],
             'fname_ar' => ['required', 'string', 'max:255'],
             'father_name_ar' => ['required', 'string', 'max:255'],
             'lname_ar' => ['required', 'string', 'max:255'],
             'birthdate' =>  ['required', 'date'],
             'service' => ['required',],
             'sub_service' => ['required'],
             'nationality' => ['required', 'string', 'max:255'],
             'national_id' => ['required', 'string', 'max:255'],
             'martial_status' => ['required', 'string', 'max:255'],
             'work' => ['required', 'string', 'max:255'],
            'is_date' =>  ['required'],

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      public function application_send($id)
   {
   
              Mail::send('emails.application', ['application_id' => $id], function ($m) use ($id) {
            $m->from('KIB@khouryinsurance.com', 'New Application');

            $m->to("info@khouryinsurance.com","KIB")->subject('New Service Application');
        });
   }

public function services()
{
    $services=Service::service_index_fathers();
    $partners=Partner::partner_index();
    $service;
    if (count($services)> 0 ){
        $service = $services[0];
        //dd($service);
        return redirect('/service/'.$service->id.'/show');
    }

    return view('main_site.services',compact('services','partners'));
}



public function service_sons(Request $request)
{
    $id=$request['id'];
    $services=Service::service_index_fathers();
    $main_service=Service::service_show($id);
    if ($main_service) {
    return view('main_site.service_sons',compact('services','main_service'));
    }
    abort(404);


}


public function product_sons(Request $request)
{
    $id=$request['id'];
    $products=Service::product_index_fathers();
    $main_service=Service::product_show($id);
    $partners=Partner::partner_index();
    return view('main_site.product_sons',compact('products','partners','main_service'));
}


public function products()
{
    $products=Service::product_index_fathers();
    // return $products;
    // $partners=Partner::partner_index();
    // $product;

    // if (count($products)> 0 ){
    //     $product = $products[0];
    //     //dd($service);
    //     return redirect('/product/'.$product->id.'/show');
    // }
    return view('main_site.products',compact('products'));
}




public function services_single($id)
{
    $service=Service::service_show($id);
    // return $service;
    return view('main_site.service_single',compact('service'));
}

public function product_single($id)
{
    $product=Service::product_show($id);
    // return $service;
    return view('main_site.product_single',compact('product'));
}


public function application_single(Request $request)
{

         $id=$request['id'];

        $application=Application::application_show($id);

        // return $application;
        if ($application==null) 
             abort(404);
            # code...
        else{
        if (Auth::check()) {


        if ($application->user_id==Auth::user()->id) {
       return view('main_site.summary',compact('application'));
        }
    }
}

  
   

         return back()->withErrors("you're not Authorized");
}



public function application_service_single(Request $request)
{
         $id=$request['id'];
        $application=Application::application_show($id);

        // return $application;
        return view('main_site.summary_service',compact('application'));
}



public function application_single_mobile(Request $request)
{
         $id=$request['id'];
        $application=Application::application_show($id);
        // return $application;
        return view('main_site.summary_mobile',compact('application'));
}



public function application_service_single_mobile(Request $request)
{
         $id=$request['id'];
        $application=Application::application_show($id);
        // return $application;
        return view('main_site.summary_service_mobile',compact('application'));
}





public function galleries()
{
    $galleries=Gallery::gallery_index();
        return view('main_site.galleries',compact('galleries'));
}


  public function gallery(Request $request)
    {
        $gallery_id=$request['gallery_id'];
        $gallery=Gallery::gallery_show($gallery_id);
        if ($gallery!=null) {
       return view('main_site.gallery',compact('gallery'));
        }
       
       abort(404);
    }

    public function application_create()
    {
        $services=Service::product_index_fathers();
        return view('main_site.application_create',compact('services'));
    }



    public function application_service_create()
    {
        $services=Service::service_index_fathers();
        return view('main_site.application_service_create',compact('services'));
    }


    public function application_create_mobile(Request $request)
    {

        //$token=$request['token'];
        $user_id=$request['user_id'];
        $user=User::where('id',$user_id)->with('city')->first();
        //$user=User::get_by_token($user_id);
        $services=Service::product_index_fathers();
        return view('main_site.application_create_mobile',compact('services','user'));
    }


    public function application_service_create_mobile(Request $request)
    {
        //$token=$request['token'];
        $user_id=$request['user_id'];
        //$user=User::get_by_token($token);
        $user=User::where('id',$user_id)->with('city')->first();
        $services=Service::service_index_fathers();
        return view('main_site.application_service_create_mobile',compact('services','user'));
    }



               public function application_service_store_api(Request $request,$options=null)
    {

        //      $validator = $this->validator_application($request->input());
        //  if ($validator->fails()) {
        //     // return back()->withErrors($validator)->withInput(); //TODO

        //     return redirect()->back()
        //             ->withInput($request->input())
        //             ->withErrors($validator);

        // }
        $applicant_name_en=$request['fname_en'].' '.$request['father_name_en'].' '.$request['lname_en'];
        $applicant_name_ar=$request['fname_ar'].' '.$request['father_name_ar'].' '.$request['lname_ar'];
        $main_service_id=$request['main_service_id'];
        $service_id=$request['sub_service_id'];
        $birthdate=$request['birthdate'];
        $nationality=$request['nationality'];
        $national_id=$request['national_number'];
        $martial_status=$request['martial_status'];
        $work=$request['work'];
        // $user_id=Auth::user()->id;
        $user_id=$request['user_id'];
        $is_date=$request['issuing_date'];
        $code=Sms_helper::RandomString();
        $date=date('Y-m-d H:i:s');
        $service=Service::service_show($main_service_id);
        $application=Application::application_create($applicant_name_en,$applicant_name_ar,$service_id,$user_id,$date,$code,$birthdate,$nationality,$national_id,$martial_status,$work,$is_date);


            if ($options) 
            {
            $options = explode('&', $options);
            // $count = count($options);
            // $str = '\''.$options[0]. '\'';
            // for ($i=1;$i < count($options) ;$i++){
            // $str = $str . ',' .'\'' .$options[$i].'\'';
            // }
            foreach ($options as $option) {

                 $option = explode('=', $option);
                 if (count($option)>1) {
                      $key=$option[0];
                      $value=$option[1];
                      $option_obj=Option::option_by_service_by_attr($main_service_id,$key);
                      if ($option_obj!=null) {
                      $option_id=$option_obj->id;
                      // $name=$option_obj->attr;
                      $application_id=$application->id;
                      $option_name=$option_obj->title;
                      $option_value=$value;
                      ApplicationOption::application_option_create($option_id,$option_value,$application_id);
                      }

                 }

            }
            }


        

        // return response()->json(['status' => True, 'data' => $application, 'message' => '','type'=>'array']);

       $age=$this->calculate_age($birthdate);
        $service_info=Service::product_show($main_service_id);
        $service_title=$service_info->en_title;
        $sub_service_ob=Service::product_show($service_id);
        $sub_service_title=$sub_service_ob->en_title;
        
        // $sub_service_ob=Service::product_show($sub_service);
        // $sub_service_title=$sub_service_ob->en_title;

        // Sms_helper::send_sms($application->user->mobile,$application->code);
        $cost=0;
        if (strpos($service_title, 'Medical') !== false) {

          if (strpos($sub_service_title, 'Family') !== false) {

            $members=$request['family_members'];

            for ($i=1; $i <$members+1 ; $i++) {

              $birthdates=$request['birthdate'.$i];
                $age_family=$this->calculate_age($birthdates);
              $price=Price::price_show_by_service_id($service_id,$age_family);
              if($price!=null){
                $cost+=$price->value;
              }


            }
          }else{
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null)
            {$cost=$price->value;}
        else
            {$cost=0;}
        }
      }
        elseif (strpos($service_title, 'Life') !== false) {

          if (strpos($sub_service_title, 'Family') !== false) {

            $members=$request['family_members'];

            for ($i=1; $i <$members+1 ; $i++) {

              $birthdates=$request['birthdate'.$i];
                $age_family=$this->calculate_age($birthdates);
              $price=Price::price_show_by_service_id($service_id,$age_family);
              if($price!=null){
                $price_value=$price->value;

                $value=$request['life_price'];
                $cost+=$value*$price_value;
                }


            }
          }else{
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null){
              $price_value=$price->value;
              $value=$request['life_price'];
              $cost=$value*$price_value;
              }
        }



        }

        elseif ($service_title=="Travel insurance") {
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null)
            {$cost=$price->value;}
        else
        $cost=0;
        }

    Application::application_update_cost($application->id,$cost);
    $data['application_id']=$application->id;
    $data['cost']=$cost;
    $data['code']=$application->code;
         return response()->json(['status' => True, 'data' =>$data, 'message' => '','type'=>'array']);
        // return redirect('application/single/'.$application->id);
        // // return view('main_site.summary',compact('application','cost'));
    }





        public function application_service_store(Request $request)
    {

             $validator = $this->validator_application($request->input());
         if ($validator->fails()) {
            // return back()->withErrors($validator)->withInput(); //TODO

            return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator);

        }

        $applicant_name_en=$request['fname_en'].' '.$request['father_name_en'].' '.$request['lname_en'];
        $applicant_name_ar=$request['fname_ar'].' '.$request['father_name_ar'].' '.$request['lname_ar'];
        $main_service_id=$request['service'];
        $service_id=$request['sub_service'];
        $birthdate=$request['birthdate'];
        $nationality=$request['nationality'];
        $national_id=$request['national_id'];
        $martial_status=$request['martial_status'];
        $work=$request['work'];
        $user_id=Auth::user()->id;
        $is_date=$request['is_date'];
        $code=Sms_helper::RandomString();
        $date=date('Y-m-d H:i:s');
        $service=Service::service_show($main_service_id);
        $application=Application::application_create($applicant_name_en,$applicant_name_ar,$service_id,$user_id,$date,$code,$birthdate,$nationality,$national_id,$martial_status,$work,$is_date);
         
        if ($service->options!=null) {
        foreach ($service->options as $key => $option) {
            $option_id=$option->id;
            $name=$option->attr;
            $application_id=$application->id;
            $option_name=$option->title;
            $option_value=$request[$name];
           ApplicationOption::application_option_create($option_id,$option_value,$application_id);
        }
        }

        return redirect('application/service/single/'.$application->id);
        // $age=$this->calculate_age($birthdate);
        // $service_info=Service::product_show($main_service_id);
        // $service_title=$service_info->en_title;

        // Sms_helper::send_sms($application->user->mobile,$application->code);
        // $cost=0;
        // if ($service_title=="Medical insurance") {
        //     $price=Price::price_show_by_service_id($service_id,$age);
        //     if($price!=null)
        //     {$cost=$price->value;}
        // else
        //     {$cost=0;}
        // }
        // elseif ($service_title=="Life insurance") {

        //     $price=Price::price_show_by_service_id($service_id,$age);
        //     if($price!=null)
        //     {$price_value=$price->value;
        //                 $value=$request['life_price'];
        //                 $cost=$value*$price_value;}
        //                 else
        //                 {$cost=0;}
        // }

        // elseif ($service_title=="Travel insurance") {
        //     $price=Price::price_show_by_service_id($service_id,$age);
        //     if($price!=null)
        //     {$cost=$price->value;}
        // else
        // $cost=0;
        // }

    // Application::application_update_cost($application->id,$cost);

        // return view('main_site.summary',compact('application','cost'));
    }


    public function application_store(Request $request)
    {
             $validator = $this->validator_application($request->input());
         if ($validator->fails()) {
            // return back()->withErrors($validator)->withInput(); //TODO

            return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator);

        }

        $applicant_name_en=$request['fname_en'].' '.$request['father_name_en'].' '.$request['lname_en'];
        $applicant_name_ar=$request['fname_ar'].' '.$request['father_name_ar'].' '.$request['lname_ar'];
        $main_service_id=$request['service'];
        $service_id=$request['sub_service'];
        $birthdate=$request['birthdate'];
        $nationality=$request['nationality'];
        $national_id=$request['national_id'];
        $martial_status=$request['martial_status'];
        $work=$request['work'];
        $user_id=Auth::user()->id;
        $is_date=$request['is_date'];
        $code=Sms_helper::RandomString();
        $date=date('Y-m-d H:i:s');
        $service=Service::product_show($main_service_id);
        $application=Application::application_create($applicant_name_en,$applicant_name_ar,$service_id,$user_id,$date,$code,$birthdate,$nationality,$national_id,$martial_status,$work,$is_date);
        foreach ($service->options as $key => $option) {
            $option_id=$option->id;
            $name=$option->attr;
            $application_id=$application->id;
            $option_name=$option->title;
            $option_value=$request[$name];
           ApplicationOption::application_option_create($option_id,$option_value,$application_id);
        }
        $age=$this->calculate_age($birthdate);
        $service_info=Service::product_show($main_service_id);
        $service_title=$service_info->en_title;
        $sub_service_ob=Service::product_show($service_id);
        $sub_service_title=$sub_service_ob->en_title;
        
        // $sub_service_ob=Service::product_show($sub_service);
        // $sub_service_title=$sub_service_ob->en_title;

        // Sms_helper::send_sms($application->user->mobile,$application->code);
        $cost=0;
        if (strpos($service_title, 'Medical') !== false) {

          if (strpos($sub_service_title, 'Family') !== false) {

            $members=$request['family_members'];
            Session::put('family_members', $members);

            for ($i=1; $i <$members+1 ; $i++) {

              $birthdates=$request['birthdate'.$i];
              Session::put('birthdate'.$i, $birthdates);
              //dd($birthdates);
                $age_family=$this->calculate_age($birthdates);
              $price=Price::price_show_by_service_id($service_id,$age_family);
              if($price!=null){
                $cost+=$price->value;
              }


            }
          }else{
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null)
            {$cost=$price->value;}
        else
            {$cost=0;}
        }
      }
        elseif (strpos($service_title, 'Life') !== false) {

          if (strpos($sub_service_title, 'Family') !== false) {

            $members=$request['family_members'];

            for ($i=1; $i <$members+1 ; $i++) {

              $birthdates=$request['birthdate'.$i];
                $age_family=$this->calculate_age($birthdates);
              $price=Price::price_show_by_service_id($service_id,$age_family);
              if($price!=null){
                $price_value=$price->value;

                $value=$request['life_price'];
                $cost+=$value*$price_value;
                }


            }
          }else{
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null){
              $price_value=$price->value;
              $value=$request['life_price'];
              $cost=$value*$price_value;
              }
        }



        }

        elseif ($service_title=="Travel insurance") {
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null)
            {$cost=$price->value;}
        else
        $cost=0;
        }

    Application::application_update_cost($application->id,$cost);
        return redirect('application/single/'.$application->id);
        // return view('main_site.summary',compact('application','cost'));
    }



    public function application_store_mobile(Request $request)
    {
    	  $validator = $this->validator_application($request->input());
         if ($validator->fails()) {
            // return back()->withErrors($validator)->withInput(); //TODO

            return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator);

        }
        $token=$request['token'];
        $applicant_name_en=$request['fname_en'].' '.$request['father_name_en'].' '.$request['lname_en'];
        $applicant_name_ar=$request['fname_ar'].' '.$request['father_name_ar'].' '.$request['lname_ar'];
        $main_service_id=$request['service'];
        $service_id=$request['sub_service'];
        $birthdate=$request['birthdate'];
        $nationality=$request['nationality'];
        $national_id=$request['national_id'];
        $martial_status=$request['martial_status'];
        $work=$request['work'];
        $user_id=$request['user_id'];
        $is_date=$request['is_date'];
        $token=$request['token'];
        $code=Sms_helper::RandomString();
        $date=date('Y-m-d H:i:s');
        $service=Service::product_show($main_service_id);
        $user=User::user_show($user_id);
        if ($user->token==$token) {
            $application=Application::application_create($applicant_name_en,$applicant_name_ar,$service_id,$user_id,$date,$code,$birthdate,$nationality,$national_id,$martial_status,$work,$is_date);
             
        foreach ($service->options as $key => $option) {
            $option_id=$option->id;
            $name=$option->attr;
            $application_id=$application->id;
            $option_name=$option->title;
            $option_value=$request[$name];
           ApplicationOption::application_option_create($option_id,$option_value,$application_id);
        }
        $age=$this->calculate_age($birthdate);
        $service_info=Service::product_show($main_service_id);
        $service_title=$service_info->en_title;
        $sub_service_ob=Service::product_show($service_id);
        $sub_service_title=$sub_service_ob->en_title;
        // Sms_helper::send_sms($application->user->mobile,$application->code);
        $cost=0;
        if (strpos($service_title, 'Medical') !== false) {

          if (strpos($sub_service_title, 'Family') !== false) {

            $members=$request['family_members'];

            for ($i=1; $i <$members+1 ; $i++) {

              $birthdates=$request['birthdate'.$i];
                $age_family=$this->calculate_age($birthdates);
              $price=Price::price_show_by_service_id($service_id,$age_family);
              if($price!=null){
                $cost+=$price->value;
              }


            }
          }else{
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null)
            {$cost=$price->value;}
        else
            {$cost=0;}
        }
      }
        elseif (strpos($service_title, 'Life') !== false) {

          if (strpos($sub_service_title, 'Family') !== false) {

            $members=$request['family_members'];

            for ($i=1; $i <$members+1 ; $i++) {

              $birthdates=$request['birthdate'.$i];
                $age_family=$this->calculate_age($birthdates);
              $price=Price::price_show_by_service_id($service_id,$age_family);
              if($price!=null){
                $price_value=$price->value;

                $value=$request['life_price'];
                $cost+=$value*$price_value;
                }


            }
          }else{
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null){
              $price_value=$price->value;
              $value=$request['life_price'];
              $cost=$value*$price_value;
              }
        }



        }

        elseif ($service_title=="Travel insurance") {
            $price=Price::price_show_by_service_id($service_id,$age);
            if($price!=null)
            {$cost=$price->value;}
        else
        $cost=0;
        }

       Application::application_update_cost($application->id,$cost);
        return redirect('application/single/mobile/'.$application->id);
        }

        return Redirect::back()->withErrors('You Are  Not Autorized');
    }




    public function application_service_store_mobile(Request $request)
    {

             $validator = $this->validator_application($request->input());
         if ($validator->fails()) {
            // return back()->withErrors($validator)->withInput(); //TODO

            return redirect()->back()
                    ->withInput($request->input())
                    ->withErrors($validator);

        }

        $applicant_name_en=$request['fname_en'].' '.$request['father_name_en'].' '.$request['lname_en'];
        $applicant_name_ar=$request['fname_ar'].' '.$request['father_name_ar'].' '.$request['lname_ar'];
        $main_service_id=$request['service'];
        $service_id=$request['sub_service'];
        $birthdate=$request['birthdate'];
        $nationality=$request['nationality'];
        $national_id=$request['national_id'];
        $martial_status=$request['martial_status'];
        $work=$request['work'];
        $user_id=$request['user_id'];
        $is_date=$request['is_date'];
        $code=Sms_helper::RandomString();
        $date=date('Y-m-d H:i:s');
        $service=Service::product_show($main_service_id);
        $application=Application::application_create($applicant_name_en,$applicant_name_ar,$service_id,$user_id,$date,$code,$birthdate,$nationality,$national_id,$martial_status,$work,$is_date);
         
        // if ($service->options!=null) {
        // foreach ($service->options as $key => $option) {
        //     $option_id=$option->id;
        //     $name=$option->attr;
        //     $application_id=$application->id;
        //     $option_name=$option->title;
        //     $option_value=$request[$name];
        //    ApplicationOption::application_option_create($option_id,$option_value,$application_id);
        // }
        // }

        return redirect('application/service/single/mobile/'.$application->id);
        // $age=$this->calculate_age($birthdate);
        // $service_info=Service::product_show($main_service_id);
        // $service_title=$service_info->en_title;

        // Sms_helper::send_sms($application->user->mobile,$application->code);
        // $cost=0;
        // if ($service_title=="Medical insurance") {
        //     $price=Price::price_show_by_service_id($service_id,$age);
        //     if($price!=null)
        //     {$cost=$price->value;}
        // else
        //     {$cost=0;}
        // }
        // elseif ($service_title=="Life insurance") {

        //     $price=Price::price_show_by_service_id($service_id,$age);
        //     if($price!=null)
        //     {$price_value=$price->value;
        //                 $value=$request['life_price'];
        //                 $cost=$value*$price_value;}
        //                 else
        //                 {$cost=0;}
        // }

        // elseif ($service_title=="Travel insurance") {
        //     $price=Price::price_show_by_service_id($service_id,$age);
        //     if($price!=null)
        //     {$cost=$price->value;}
        // else
        // $cost=0;
        // }

    // Application::application_update_cost($application->id,$cost);

        // return view('main_site.summary',compact('application','cost'));
    }


    public function news_index()
    {
        $news=News::news_index();
        return view('main_site.news',compact('news'));
    }


    public function news_show($id)
    {
        $news=News::news_show($id);
        if ($news!=null) {
        	return view('main_site.news_single',compact('news'));
        }
          abort(404);
        
    }

    public function calculate_age($birthdate)
    {
        $from = Carbon::createFromFormat('Y-m-d',$birthdate);
        $to = Carbon::createFromFormat('Y-m-d H:s:i', Carbon::now());
        $diff_in_days = $to->DiffInYears($from);
        return $diff_in_days;
    }


    public function about()
    {
        $page=Page::about_us();
        return view('main_site.about_us',compact('page'));
    }

    public function aboutApi()
    {
        $page=Page::about_us();
        return response()->json(['status' => True, 'data' => $page, 'message' => '','type'=>'array']);
    }

    public function product_sons_api(Request $request)
    {

        $id=$request['id'];
        // $products=Service::product_index_fathers();
        $main_service=Service::service_index_sons($id);
        foreach ($main_service as $key => $service) {
                foreach ($service->media as $key => $image) {
            $image->url=env('website_link').env('image_storage').$image->url;
        }
        }
         return response()->json(['status' => True, 'data' => $main_service, 'message' => '','type'=>'array']);
    }


    public function contact()
    {
        $services=Service::sons_index();
        return view('main_site.contact',compact('services'));
    }


    public function application_cancel(Request $request)
    {
      $id=$request['id'];
      $application=Application::application_delete($id);
      return redirect('/application/create');
    }

    public function application_cancel_mobile(Request $request)
    {
      $id=$request['id'];

      $application=Application::application_show($id);
      $token=$application->user->token;
      $user_id=$application->user->id;
      $application->delete();
      return redirect('/application/'.$token.'/'.$user_id.'/create');
    }


    public function application_service_cancel(Request $request)
    {
      $id=$request['id'];
      $application=Application::application_delete($id);
      return redirect('/application/service/create');
    }

    public function application_service_cancel_mobile(Request $request)
    {
      $id=$request['id'];

      $application=Application::application_show($id);
      $token=$application->user->token;
      $user_id=$application->user->id;
      $application->delete();
      return redirect('/application/service/'.$token.'/'.$user_id.'/create');
    }


    public function application_confirm(Request $request)
    {
      $id=$request['id'];
      $application=Application::confirm($id);
      $this->application_send($application->id);
        return redirect('/application/single/'.$application->id);
    }

    public function application_service_confirm(Request $request)
    {
      $id=$request['id'];
      $application=Application::confirm($id);
      $this->application_send($application->id);
      return redirect('/application/service/single/'.$application->id);
    }


    public function application_confirm_mobile(Request $request)
    {
      $id=$request['id'];
      $application=Application::confirm($id);
      $this->application_send($application->id);
        return redirect('/application/single/mobile/'.$application->id);
    }

    public function application_service_confirm_mobile(Request $request)
    {
      $id=$request['id'];
      $application=Application::confirm($id);
      $this->application_send($application->id);
      return redirect('/application/service/single/mobile/'.$application->id);
    }


}
