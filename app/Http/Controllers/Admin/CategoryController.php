<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryFormRequest;
use App\Http\Requests\CategoryFormUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::parentCategory()->get();
        $allCategories = Category::pluck('name', 'id')->all();
        $serial = config('default_zero');
        $serial_child = config('default_one');

        return view('admin.category.index', compact('categories', 'serial', 'serial_child'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::parentCategory()->pluck('name', 'id');

        return view('admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Category::create($input);

        return redirect('admin/categories/create')->with('success', trans('category.create_category_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
//        $categories = DB::table('categories')->where('parent_id', '=', 0)->pluck('name', 'id')->all();
        $categories = Category::parentCategory()->pluck('name', 'id');

        return view('admin.category.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormUpdateRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());

        return back()->with('success', trans('category.update_category_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('admin/categories')->with('success',
            trans('category.delete_category_success', ['name' => $category->name]));
    }

    public function hiddenStatusCategories(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->status = config('common.default_zero');
        $category->save();

        return response()->json(['flag' => 'success', 'message' => trans('category.update_status')]);
    }

    public function showStatusCategories(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->status = config('common.default_one');
        $category->save();

        return response()->json(['flag' => 'success', 'message' => trans('category.update_status')]);
    }
}
