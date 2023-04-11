<?php

namespace App\Http\Controllers;

use App\Price;
use App\Service;
use Illuminate\Http\Request;

use App\User;
use Auth;
use Illuminate\Support\Facades\Validator;
class PriceController extends Controller
{

         protected function validator_price(array $data)
    {


        return Validator::make($data, [
             'service_id' => ['required',],
             'min' => ['required'],
                 'max' => ['required',],
             'value' => ['required'],
                 'type' => ['required',],
              

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices=Price::price_index();
        return view('admin.price.index',compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services=Service::product_all_sons();
        return view('admin.price.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
             $validator = $this->validator_price($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
        $service_id=$request['service_id'];
        $min=$request['min'];
        $max=$request['max'];
        $value=$request['value'];
        $type=$request['type'];
        Price::price_create($service_id,$min,$max,$value,$type);
        return redirect('/admin/price/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $services=Service::service_all_sons();
        $price=Price::price_show($id);
        return view('admin.price.update',compact('services','price'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
             $validator = $this->validator_price($request->input());
         if ($validator->fails()) {
            return back()->withErrors($validator)->withInput(); //TODO

        }
        $id=$request['id'];
        $service_id=$request['service_id'];
        $min=$request['min'];
        $max=$request['max'];
        $value=$request['value'];
        $type=$request['type'];
        Price::price_update($id,$service_id,$min,$max,$value,$type);
        return redirect('/admin/price/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Price::price_delete($id);
        return redirect('/admin/price/index');
    }


}
