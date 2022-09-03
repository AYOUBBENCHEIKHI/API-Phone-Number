<?php

namespace App\Http\Controllers;

use App\Models\PhonNumber;
use App\Http\Requests\StorePhonNumberRequest;
use App\Http\Requests\UpdatePhonNumberRequest;

class PhonNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PhonNumber::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhonNumberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePhonNumberRequest $request)
    {
        $phonNumber = (new PhonNumber)->fill($request->validated());
        $phonNumber->save();
        return response()->json($phonNumber->refresh()); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhonNumber  $phonNumber
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //PhonNumber $phonNumber
        return PhonNumber::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhonNumber  $phonNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(PhonNumber $phonNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhonNumberRequest  $request
     * @param  \App\Models\PhonNumber  $phonNumber
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePhonNumberRequest $request, $id)
    {
        $phonNumber = PhonNumber::findOrFail($id);
        $phonNumber->update($request->all());
        return response()->json($phonNumber->refresh()); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhonNumber  $phonNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phonNumber = PhonNumber::findOrFail($id);
        $phonNumber->delete();
        return response()->json(array(
            'message'   =>  'phon number is deleted ..'
        ),200); 
    }
}
