<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Faq;
use App\Models\FaqCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\FaqRequest;

class FaqController extends Controller
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
        $faqs = Faq::all();

        return view('admin.faqs.index')->with('faqs', $faqs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = FaqCategory::all();

        return view('admin.faqs.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FaqRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        $faq = new Faq();
        $faq->faq_category_id = $request->input('faq_category_id');
        $faq->question_faq = $request->input('question_faq');
        $faq->answer_faq = $request->input('answer_faq');

        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', trans('success.fadd'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id); //Get faq specified by id

        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id); //Get faq specified by id
        $categories = FaqCategory::all();

        return view('admin.faqs.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FaqRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->faq_category_id = $request->input('faq_category_id');
        $faq->question_faq = $request->input('question_faq');
        $faq->answer_faq = $request->input('answer_faq');

        $faq->save();

        return redirect()->route('admin.faqs.index')->with('success', trans('success.fupdat'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id); //Find a faq with a given id and delete
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('success', trans('success.fdelete'));
    }
}
