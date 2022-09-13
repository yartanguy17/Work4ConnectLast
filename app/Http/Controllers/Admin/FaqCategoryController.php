<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaqCategoryRequest;
use App\Models\FaqCategory;

class FaqCategoryController extends Controller
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
        $categories = FaqCategory::all(); //Get all categories

        return view('admin.faqcategories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\FaqCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqCategoryRequest $request)
    {
        $category = new FaqCategory(); //Get category specified by id
        $category->title_faq_cat = $request->input('title_faq_cat');
        $category->description_faq_cat = $request->input('description_faq_cat');

        $check = FaqCategory::where('title_faq_cat', $category->title_faq_cat)->get(); //Verifier si FaqCategory existe déjà

        if (count($check) > 0) {

            return back()->with('error', trans('success.faqalre'));
        } else {

            $category->save();

            return redirect()->route('admin.faqcategories.index')->with('success', trans('success.faqadd'));
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
        $category = FaqCategory::findOrFail($id);

        return view('admin.faqcategories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = FaqCategory::findOrFail($id);

        return view('admin.faqcategories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\FaqCategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FaqCategoryRequest $request, $id)
    {
        $category = FaqCategory::findOrFail($id);
        $category->title_faq_cat = $request->input('title_faq_cat');
        $category->description_faq_cat = $request->input('description_faq_cat');

        $check = FaqCategory::where('title_faq_cat', $category->title_faq_cat)->get(); //Verifier si FaqCategory existe déjà

        if (count($check) > 1) {

            return back()->with('error', trans('success.faqalre'));
        } else {

            $category->save();

            return redirect()->route('admin.faqcategories.index')->with('success', trans('success.faqupd'));
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
        $category = FaqCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.faqcategories.index')->with('success', trans('success.faqdel'));
    }
}
