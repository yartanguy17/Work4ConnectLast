<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quotation;
use App\Models\Rappel;

class QuotationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:admin'])->except('changeUserStatus');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = Rappel::where('status', 0)->get();

        return view('admin.quotations.index')->with('quotations', $quotations);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $quotations = Quotation::where('status', 1)->get();

        return view('admin.quotations.archived')->with('quotations', $quotations);
    }

    public function changeUserStatus(Request $request)
    {
        $quotation = Quotation::findOrFail($request->quotation_id);
        $quotation->status = $request->status;

        $quotation->save();

        return response()->json(['success' => trans('success.requpd')]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quotation = Quotation::findOrFail($id);

        return view('admin.quotations.show', compact('quotation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quotation = Quotation::findOrFail($id);

        return view('admin.quotations.edit', compact('quotation'));
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
        $quotation = Quotation::findOrFail($id);
        $quotation->save();

        return redirect()->route('admin.quotations.index')->with('success', trans('success.reqprocd'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quotation = Quotation::findOrFail($id);
        $quotation->delete();

        return redirect()->route('admin.quotations.index')->with('success', trans('success.requdelet'));
    }
}
