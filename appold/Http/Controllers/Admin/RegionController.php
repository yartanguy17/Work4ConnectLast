<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegionRequest;
use App\Models\Region;
use App\Models\Ville;

class RegionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::all(); //Get all regions

        return view('admin.regions.index')->with('regions', $regions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegionRequest $request)
    {
        $region = new Region();
        $region->title_region = $request->input('title_region');
        $region->description_region = $request->input('description_region');

        $check = Region::where('title_region', $request->input('title_region'))->get();

        if (count($check) > 0) {

            return back()->with('error', trans('success.regionalre'));

        } else {

            $region->save();

            return redirect()->route('admin.regions.index')->with('success', trans('success.regionadd'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::findOrFail($id);

        return view('admin.regions.show', compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::findOrFail($id);

        return view('admin.regions.edit', compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\RegionRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegionRequest $request, $id)
    {
        $region = Region::findOrFail($id);
        $region->title_region = $request->input('title_region');
        $region->description_region = $request->input('description_region');

        $check = Region::where('title_region', $request->input('title_region'))->get();

        if (count($check) > 1) {

            return back()->with('error', trans('success.regionalre'));

        } else {

            $region->save();

            return redirect()->route('admin.regions.index')->with('success', trans('success.regionupd'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Ville::where('region_id', $id)->get();

        if (count($check) > 0) {

            return back()->with('error', trans('success.regiondel'));

        } else {

            $region = Region::findOrFail($id);
            $region->delete();

            return redirect()->route('admin.regions.index')->with('success', trans('success.regiondele'));
        }
    }
}
