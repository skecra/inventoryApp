<?php

namespace App\Http\Controllers;

use App\Models\EquipmentSerialNumbers;
use App\Http\Requests\StoreEquipmentSerialNumbersRequest;
use App\Http\Requests\UpdateEquipmentSerialNumbersRequest;

class EquipmentSerialNumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreEquipmentSerialNumbersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentSerialNumbersRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentSerialNumbers  $equipmentSerialNumbers
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentSerialNumbers $equipmentSerialNumbers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipmentSerialNumbers  $equipmentSerialNumbers
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentSerialNumbers $equipmentSerialNumbers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipmentSerialNumbersRequest  $request
     * @param  \App\Models\EquipmentSerialNumbers  $equipmentSerialNumbers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentSerialNumbersRequest $request, EquipmentSerialNumbers $equipmentSerialNumbers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentSerialNumbers  $equipmentSerialNumbers
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentSerialNumbers $equipmentSerialNumbers)
    {
        //
    }
}
