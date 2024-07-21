<?php

namespace App\Http\Controllers;

use App\Models\SerialNumberEquipment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSerialNumberEquipmentRequest;
use App\Http\Requests\UpdateSerialNumberEquipmentRequest;

class SerialNumberEquipmentController extends Controller
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
     * @param  \App\Http\Requests\StoreSerialNumberEquipmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSerialNumberEquipmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SerialNumberEquipment  $serialNumberEquipment
     * @return \Illuminate\Http\Response
     */
    public function show(SerialNumberEquipment $serialNumberEquipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SerialNumberEquipment  $serialNumberEquipment
     * @return \Illuminate\Http\Response
     */
    public function edit(SerialNumberEquipment $serialNumberEquipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSerialNumberEquipmentRequest  $request
     * @param  \App\Models\SerialNumberEquipment  $serialNumberEquipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSerialNumberEquipmentRequest $request, SerialNumberEquipment $serialNumberEquipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SerialNumberEquipment  $serialNumberEquipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SerialNumberEquipment $serialNumberEquipment)
    {
        //
    }
}
