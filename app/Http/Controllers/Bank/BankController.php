<?php

namespace App\Http\Controllers;

use App\Bank;
use App\City;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks=Bank::bank_index();
        return view('admin.bank.index',compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::city_index();
        return view('admin.bank.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $en_name=$request['en_name'];
            $ar_name=$request['ar_name'];
            $city_id=$request['city_id'];
            Bank::bank_create($en_name,$ar_name,$city_id);
            return redirect('admin/bank/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank=Bank::bank_show($id);
        $cities=City::city_index();
        return view('admin.bank.update',compact('bank','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
            $id=$request['id'];
            $en_name=$request['en_name'];
            $ar_name=$request['ar_name'];
            $city_id=$request['city_id'];
            Bank::bank_update($id,$en_name,$ar_name,$city_id);
              return redirect('admin/bank/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
