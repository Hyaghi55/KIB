<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\Company;
use App\Media;
use App\PartnerService;
use App\Partner;
use Redirect;
use Illuminate\Support\Facades\Storage;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




     protected function service_validator(array $data)
    {
        return Validator::make($data, [
            'en_title' => ['required'],
             'ar_title' => ['required'],
              'en_subtitle' => ['required'],
            'ar_subtitle' => ['required'],
            'ar_description' => ['required'],
             'en_description' => ['required',],
             'company_id' => ['required'],
        ]);
    }

    public function index()
    {
        $services=Service::admin_service_index_fathers();
        return view('admin.service.index',compact('services'));
    }

     public function index_api()
    {
         $services=Service::service_index();
            foreach ($services as $service) {
            foreach ($service->media as $media1) {
                $media1->url=env('website_link').env('image_storage').$media1->url;
            }

                 foreach ($service->partner as $key => $partner1) {
                $partner1->image=env('website_link').env('image_storage').'/'.$partner1->image;
            }
              // $service->quotation->url=env('website_link').env('image_storage').$service->quotation->url;
        }
         return response()->json(['status' => True, 'data' => $services, 'message' => '','type'=>'array']);
    }




    public function get_sons_api($service_id)
    {
        $services=Service::service_index_sons($service_id);

            foreach ($services as $service) {
            foreach ($service->media as $media1) {
                $media1->url=env('website_link').env('image_storage').$media1->url;
            }


                // $service->quotation->url=env('website_link').env('image_storage').$service->quotation->url;

        }
        return response()->json(['status' => True, 'data' => $services, 'message' => '','type'=>'array']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::service_index();
        $companies=Partner::partner_index();
        return view('admin.service.create',compact('services','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $en_title =$request['en_title'];
        $ar_title=$request['ar_title'];
        $en_subtitle=$request['en_subtitle'];
        $ar_subtitle=$request['ar_subtitle'];
        $ar_description=$request['ar_description'];
        $en_description=$request['en_description'];
        $parent_id ='0';
        $company_id = $request['company_id'];
        $icon=$request['icon'];
        $content_type='service';
        $type='service';

        $service=Service::service_create($en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$type,$icon);
        if ($company_id){
            foreach ($company_id as $key => $company) {
                PartnerService::partner_service_create($company,$service->id);
            }
        }
        if($request->hasFile('image')){
            foreach($request->file('image') as $file) {
                $imagename=$file->getClientOriginalName();
                $path_img=$file->storeAs('public/',time().$imagename);
                 $img_name=str_replace('public/', '', $path_img);
                 Media::media_create($img_name,'image',$service->id,$content_type);
             }
        }

        // if($request->hasFile('quotation')){
        //     $file=$request['quotation'];
        //     $imagename=$file->getClientOriginalName();
        //     $path_img=$file->storeAs('public/',time().'.pdf');
        //     $img_name=str_replace('public/', '', $path_img);
        //     Media::media_create($img_name,'quotation',$service->id,$content_type);

        // }


        if($request->hasFile('icon')){
            $file=$request['icon'];
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().'.jpg');
            $img_name=str_replace('public/', '', $path_img);
            $service->icon=$img_name;
            $service->save();
            return redirect('/admin/service/index');
        }




    return Redirect::back()->withErrors('The image input must not be empty');
    }

    public function create_son($parent_id)
    {
        $service=Service::service_show($parent_id);
        $companies=Partner::partner_index();
        return view('admin.service.create_son',compact('service','companies'));
    }


    public function product_create_son($parent_id)
    {
        $product=Service::product_show($parent_id);
        $companies=Company::company_index();
        return view('admin.product.create_son',compact('product','companies'));
    }

        public function store_son(Request $request)
    {
        $en_title =$request['en_title'];
        $ar_title=$request['ar_title'];
        $en_subtitle=$request['en_subtitle'];
        $ar_subtitle=$request['ar_subtitle'];
        $ar_description=$request['ar_description'];
        $en_description=$request['en_description'];
        $parent_id =$request['parent_id'];
        $icon=$request['icon'];
        $company_id=$request['company_id'];
        $portal_link=$request['portal_link'];
        $content_type='service';
        $type='service';
        $service=Service::service_create($en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$type,$icon);

        if ($company_id){
            foreach ($company_id as $key => $company) {
                PartnerService::partner_service_create($company,$service->id);
            }
        }

        if($request->hasFile('image')){
            foreach($request->file('image') as $file) {
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().$imagename);
             $img_name=str_replace('public/', '', $path_img);
             Media::media_create($img_name,'image',$service->id,$content_type);
            
             }
        }


            if($request->hasFile('icon')){
            $file=$request['icon'];
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().'.jpg');
            $img_name=str_replace('public/', '', $path_img);
            $service->icon=$img_name;
            $service->save();
            return redirect('/admin/service/index/'.$parent_id);
        }


        // if($request->hasFile('quotation')){
        //     $file=$request['quotation'];
        //     $imagename=$file->getClientOriginalName();
        //     $path_img=$file->storeAs('public/',time().'.pdf');
        //     $img_name=str_replace('public/', '', $path_img);
        //     Media::media_create($img_name,'quotation',$service->id,$content_type);
        // return redirect('/admin/service/index/'.$parent_id);

        // }



    return Redirect::back()->withErrors('The image input must not be empty');
    }


    public function index_sons($parent_id)
    {
        $service_sons=Service::admin_service_index_sons($parent_id);
        return view('admin.service.index_sons',compact('service_sons','parent_id'));
    }

    public function product_index_sons($parent_id)
    {
        $product_sons=Service::admin_service_index_sons($parent_id);
        return view('admin.product.index_sons',compact('product_sons','parent_id'));
    }



        public function get_all_sons()
    {
        $product_sons=Service::fathers();
                 return response()->json(['status' => True, 'data' => $product_sons, 'message' => '','type'=>'array']);

    }




    


    


    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services=Service::service_index_fathers();
        $service=Service::service_show($id);
        $companies=Partner::partner_index();
        return view('admin.service.update',compact('service','services','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $id=$request['id'];
        $en_title =$request['en_title'];
        $ar_title=$request['ar_title'];
        $en_subtitle=$request['en_subtitle'];
        $ar_subtitle=$request['ar_subtitle'];
        $ar_description=$request['ar_description'];
        $en_description=$request['en_description'];
        $parent_id =$request['parent_id'];
        // $quotation_id=$request['quotation_id'];
        $company_id = $request['company_id'];
        $icon=$request['icon'];
        $content_type='service';
        $type='service';

        $service=Service::service_update($id,$en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$type,$icon);

        if ($company_id){
            foreach ($company_id as $key => $company) {
                PartnerService::partner_service_create($company,$service->id);
            }
        }
        if($request->hasFile('image')){
            foreach($request->file('image') as $file) {
                $imagename=$file->getClientOriginalName();
                $path_img=$file->storeAs('public/',time().$imagename);
                 $img_name=str_replace('public/', '', $path_img);
                 Media::media_create($img_name,'image',$service->id,$content_type);
             }
        }

        // if($request->hasFile('quotation')){
        //     $file=$request['quotation'];
        //     $imagename=$file->getClientOriginalName();
        //     $path_img=$file->storeAs('public/',time().'.pdf');
        //     $img_name=str_replace('public/', '', $path_img);
        //     Media::media_create($img_name,'quotation',$service->id,$content_type);

        // }


        if($request->hasFile('icon')){
            $file=$request['icon'];
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().'.jpg');
            $img_name=str_replace('public/', '', $path_img);
            $service->icon=$img_name;
            $service->save();
            return redirect('/admin/service/index');
        }
         return redirect('/admin/service/index');
    // return Redirect::back()->withErrors('The image input must not be empty');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */


      public function delete($id)
    {
        $service=Service::service_show($id);
        foreach ($service->media as $image) {
        Storage::delete('public'.$image->url);
        }
        service::service_delete($id);
 if ($service->parent_id==0) {
        return redirect('/admin/service/index');
        }
        return redirect('/admin/service/index/'.$service->parent_id);
    }





    /////-------------------------------------- products section


    public function product_create()
    {
        $services=Service::service_index();
        $companies=Partner::partner_index();
        return view('admin.product.create',compact('services','companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_store(Request $request)
    {
        $en_title =$request['en_title'];
        $ar_title=$request['ar_title'];
        $en_subtitle=$request['en_subtitle'];
        $ar_subtitle=$request['ar_subtitle'];
        $ar_description=$request['ar_description'];
        $en_description=$request['en_description'];
        $parent_id ='0';
        // $quotation_id=$request['quotation_id'];
        $company_id='';
        $portal_link='';
        $content_type='product';
        $icon = '';
        $type='product';
        $product=Service::service_create($en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$type,$icon);
        if($request->hasFile('image')){
            foreach($request->file('image') as $file) {
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().$imagename);
             $img_name=str_replace('public/', '', $path_img);
             Media::media_create($img_name,'image',$product->id,$content_type);
             return redirect('/admin/product/index');
             }

        }


    return Redirect::back()->withErrors('The image input must not be empty');
    }


        public function product_store_son(Request $request)
    {
        $en_title =$request['en_title'];
        $ar_title=$request['ar_title'];
        $en_subtitle=$request['en_subtitle'];
        $ar_subtitle=$request['ar_subtitle'];
        $ar_description=$request['ar_description'];
        $en_description=$request['en_description'];
        $parent_id =$request['parent_id'];
        // $quotation_id=$request['quotation_id'];
        $company_id='';
        $portal_link='';
        $icon=" ";
        $type='product';
        $content_type='product';
         $product=Service::service_create($en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$type,$icon);
                    if($request->hasFile('image')){
            foreach($request->file('image') as $file) {
            $imagename=$file->getClientOriginalName();
            $path_img=$file->storeAs('public/',time().$imagename);
             $img_name=str_replace('public/', '', $path_img);
             Media::media_create($img_name,'image',$product->id,$content_type);
             }
            return redirect('/admin/product/index/'.$parent_id);
        }
    return Redirect::back()->withErrors('The image input must not be empty');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function product_show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function product_edit($id)
    {
        $services=Service::service_index_fathers();
        $service=Service::product_show($id);
        return view('admin.product.update',compact('service','services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function product_update(Request $request, Service $service)
    {
        $id=$request['id'];
        $en_title =$request['en_title'];
        $ar_title=$request['ar_title'];
        $en_subtitle=$request['en_subtitle'];
        $ar_subtitle=$request['ar_subtitle'];
        $ar_description=$request['ar_description'];
        $en_description=$request['en_description'];
        $parent_id =$request['parent_id'];
        // $quotation_id=$request['quotation_id'];
        $company_id=$request['company_id'];
        $portal_link=$request['portal_link'];
        $service=Service::service_update($id,$en_title,$ar_title,$en_subtitle,$ar_subtitle,$en_description,$ar_description,$parent_id,$company_id,$portal_link);
        if ($service->parent_id==0) {
         return redirect('/admin/product/index');
        }
          return redirect('/admin/product/index/'.$service->parent_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */


    public function product_delete($id)
    {
        $service=Service::product_show($id);
        foreach ($service->media as $image) {
            Storage::delete('public'.$image->url);
        }
        service::service_delete($id);
        if ($service->parent_id==0) {
        return redirect('/admin/product/index');
        }
        return redirect('/admin/product/index/'.$service->parent_id);
    }


    public function product_index()
    {
        $products=Service::admin_product_index_fathers();
        return view('admin.product.index',compact('products'));
    }

     public function product_index_api()
    {
         $products=Service::product_index();
            foreach ($products as $product) {   
            foreach ($product->media as $media1) {
                $media1->url=env('website_link').env('image_storage').$media1->url;
            }

        }
         return response()->json(['status' => True, 'data' => $products, 'message' => '','type'=>'array']);
    }



public function active(Request $request)
{
  $id=$request['id'];
  $service=Service::service_active($id);

  if ($service->type=='product') {
    return redirect('admin/product/index')->with('success', 'Done Activating');
  }
  else {
    return redirect('admin/service/index')->with('success', 'Done Activating');
  }

}




}
