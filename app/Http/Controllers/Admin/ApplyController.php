<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;
use Illuminate\Http\Request;

class ApplyController extends Controller
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
        $applies = Apply::where('status', 0)->get();

        return view('admin.applies.index')->with('applies', $applies);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $applies = Apply::where('status', 1)->get();

        return view('admin.applies.archived')->with('applies', $applies);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function treat($id)
    {
        $apply = Apply::findOrFail($id); //Get apply specified by id

        return view('admin.applies.edit', compact('apply'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apply = Apply::findOrFail($id);

        return view('admin.applies.show', compact('apply'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apply = Apply::findOrFail($id);

        return view('admin.applies.edit', compact('apply'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $apply = Apply::findOrFail($id);
        $apply->is_favorable = $request->input('is_favorable');
        $apply->decision = $request->input('decision');
        $apply->status = 1;

        $apply->save();

        return redirect()->route('admin.applies.index')->with('success', trans('success.processedsuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apply = Apply::findOrFail($id);
        $apply->delete();

        return redirect()->route('admin.applies.index')->with('success', trans('success.processedeleted'));
    }
}
