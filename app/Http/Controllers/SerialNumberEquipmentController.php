<?php

namespace App\Http\Controllers;

use App\Models\SerialNumberEquipment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSerialNumberEquipmentRequest;
use App\Http\Requests\UpdateSerialNumberEquipmentRequest;
use Illuminate\Support\Facades\Validator;

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

    public function inputSerialNumber(StoreSerialNumberEquipmentRequest $request)
    {

        $rules = [];
        foreach ($request->all() as $key => $value) {
            if (preg_match('/^inputs_\d+$/', $key)) {
                $rules[$key] = 'required|string';
            }
        }

        // Validiraj podatke
        $validator = Validator::make($request->all(), $rules, [
            'required' => 'The field :attribute is required.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        SerialNumberEquipment::query()->where('equipment_id', '=', $request->equipment_id)->delete();
        $allInputs = $request->all();
        foreach ($allInputs as $key => $value) {
            if (strpos($key, 'inputs_') === 0) {
                // $key je naziv polja kao 'inputs_1', 'inputs_2', itd.
                // $value je vrijednost tog polja
                SerialNumberEquipment::query()->create([
                    'serial_number' => $value,
                    'equipment_id' => $request->equipment_id
                ]);
            }
        }

        // Možeš dodati dodatne obrade ovde

        return redirect('/equipment');
    }

    function getEquipmentSerialNumber($equipment_id)
    {
        $serial_numbers = SerialNumberEquipment::query()->where('equipment_id', '=', $equipment_id)->get();
        return response()->json($serial_numbers);
    }

}
