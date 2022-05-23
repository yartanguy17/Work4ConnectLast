<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
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
        $categories = Category::all(); //Get all categories

        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category(); //Get category specified by id
        $category->title_categorie = $request->input('title_categorie');
        $category->description_categorie = $request->input('description_categorie');

        $check = Category::where('title_categorie', $category->title_categorie)->get(); //Verifier si categorie existe déjà

        if (count($check) > 0) {

            return back()->with('error', trans('success.categalrea'));
        } else {

            $category->save();

            return redirect()->route('admin.categories.index')->with('success', trans('success.categoryadd'));
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
        $category = Category::findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id); //Get category specified by id
        $category->title_categorie = $request->input('title_categorie');
        $category->description_categorie = $request->input('description_categorie');

        $check = Category::where('title_categorie', $category->title_categorie)->get(); //Verifier si categorie existe déjà

        if (count($check) > 1) {
            return back()->with('error', trans('success.categalrea'));
        } else {

            $category->save();

            return redirect()->route('admin.categories.index')->with('success', trans('success.categoryupd'));
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
        $category = Category::findOrFail($id); //Find a user with a given id and delete
        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', trans('success.categorydel'));
    }
}
