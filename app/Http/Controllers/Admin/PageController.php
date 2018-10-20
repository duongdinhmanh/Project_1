<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PageFormRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        $serial = 1;
        return view('admin.page.index', compact('pages', 'serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $request)
    {
        $page = new Page([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'content' => $request->get('content'),
            'status' => $request->get('status')
        ]);
        $page->save();

        return redirect('admin/pages/create')->with('success', trans('page.create_page_success'));
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
        $page = Page::findOrFail($id);
        return view('admin.page.show', compact('page'));
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
        $page = Page::findOrFail($id);
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->title = $request->get('title');
        $page->slug = $request->get('slug');
        $page->content = $request->get('content');
        $page->status = $request->get('status');
        $page->save();

        return back()->with('success', trans('page.update_page_success'));
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
        $page = Page::findOrFail($id);
        $page->delete();
        return redirect('admin/pages')->with('success', trans('page.delete_page_success', ['name' => $page->title]));
    }

    public function hiddenStatusPages(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->status = 0;
        $page->save();

        return response()->json(['flag' => 'success', 'message' => trans('page.update_status')]);
    }

    public function showStatusPages(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        $page->status = 1;
        $page->save();

        return response()->json(['flag' => 'success', 'message' => trans('page.update_status')]);
    }
}
