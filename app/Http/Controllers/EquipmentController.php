<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\EquipmentCategory;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content_header = "Equipment";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment'],
//            [ 'name' => 'Add new category', 'link' => '/equipment_categories/create' ],
        ];
        $equipment = Equipment::all();
        return view('equipment.index', compact('equipment', 'content_header', 'breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EquipmentCategory::all();
        $content_header = "Add New Equipment";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment'],
            [ 'name' => 'Add new equipment', 'link' => '/equipment/create' ],
        ];
        return view('equipment.create', compact('categories', 'content_header', 'breadcrumbs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEquipmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentRequest $request)
    {
        Equipment::query()->create($request->validated());
        return redirect('/equipment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        $categories = EquipmentCategory::all();
        $content_header = "Equipment details";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment'],
            [ 'name' => 'Equipment details', 'link' => '/equipment/create' ],
        ];
        return view('equipment.show', compact(['categories', 'content_header', 'breadcrumbs', "equipment"]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $content_header = "Add New Equipment";
        $categories = EquipmentCategory::all();
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment list', 'link' => '/equipment'],
            [ 'name' => 'Add new equipment', 'link' => '/equipment/create' ],
        ];
        return view('equipment.edit', compact(['equipment', 'content_header', 'breadcrumbs', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipmentRequest  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->all());
        return redirect('/equipment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect('equipment');
    }
}
