<?php

namespace App\Http\Controllers;

use App\Models\EquipmentCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEquipmentCategoryRequest;
use App\Http\Requests\UpdateEquipmentCategoryRequest;

class EquipmentCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipmentCategories = EquipmentCategory::all();
        return view('equipmentCategory.index', compact('equipmentCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content_header = "Add new category";
        $breadcrumbs = [
            [ 'name' => 'Home', 'link' => '/' ],
            [ 'name' => 'Equipment Categories list', 'link' => '/equipment_categories'],
            [ 'name' => 'Add new category', 'link' => '/equipment_categories/create' ],
        ];
        return view('equipmentCategory.create', compact(['content_header', 'breadcrumbs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEquipmentCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentCategoryRequest $request)
    {
        EquipmentCategory::query()->create($request->validated());
        return redirect('/equipment_categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentCategory  $equipmentCategory
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentCategory $equipmentCategory)
    {
        return view('equipmentCategory.show', compact('equipmentCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipmentCategory  $equipmentCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentCategory $equipmentCategory)
    {
        return view('equipmentCategory.edit', compact('equipmentCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipmentCategoryRequest  $request
     * @param  \App\Models\EquipmentCategory  $equipmentCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentCategoryRequest $request, EquipmentCategory $equipmentCategory)
    {
        $equipmentCategory->update($request->validated());
        return redirect('/equipment_categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentCategory  $equipmentCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentCategory $equipmentCategory)
    {
        $equipmentCategory->delete();
        return redirect('/equipment_categories');
    }
}
