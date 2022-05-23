<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobTypeRequest;
use App\Models\JobType;
use App\Models\Offer;

class JobTypeController extends Controller
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
        $types = JobType::all(); //Get all types

        return view('admin.jobtypes.index')->with('types', $types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jobtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\JobTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobTypeRequest $request)
    {
        $type = new JobType(); //Get category specified by id
        $type->title_job_ty = $request->input('title_job_ty');
        $type->description_job_ty = $request->input('description_job_ty');

        $check = JobType::where('title_job_ty', $type->title_job_ty)->get(); //Verifier si FaqCategory existe déjà

        if (count($check) > 0) {

            return back()->with('error', trans('success.jobalre'));
        } else {

            $type->save();

            return redirect()->route('admin.jobtypes.index')->with('success', trans('success.jobadd'));
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
        $type = JobType::findOrFail($id); //Get category specified by id

        return view('admin.jobtypes.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = JobType::findOrFail($id); //Get category specified by id

        return view('admin.jobtypes.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\JobTypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JobTypeRequest $request, $id)
    {
        $type = JobType::findOrFail($id); //Get category specified by id
        $type->title_job_ty = $request->input('title_job_ty');
        $type->description_job_ty = $request->input('description_job_ty');

        $check = JobType::where('title_job_ty', $type->title_job_ty)->get(); //Verifier si FaqCategory existe déjà

        if (count($check) > 1) {

            return back()->with('error', trans('success.jobalre'));
        } else {

            $type->save();

            return redirect()->route('admin.jobtypes.index')->with('success', trans('success.jobupd'));
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
        $check = Offer::where('job_type_id', $id)->get();

        if (count($check) > 0) {

            return redirect()->back()->with('error', trans('success.jobbeend'));
        } else {

            $type = JobType::findOrFail($id); //Get category specified by id
            $type->delete();

            return redirect()->route('admin.jobtypes.index')->with('success', trans('success.jobdelete'));
        }
    }
}
