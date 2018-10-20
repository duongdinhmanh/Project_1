<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slide::all();
        $serial = 1;
        return view('admin.slide.index',compact('slides','serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'status' => $request->get('status')
        ]);
        $slide->save();

        return redirect('admin/slides/create')->with('success', trans('slide.create_slide_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.edit', compact('slide'));
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
        $slide = Slide::findOrFail($id);
        $slide->title = $request->get('title');
        $slide->content = $request->get('content');
        $slide->status = $request->get('status');
        $slide->save();

        return back()->with('success', trans('slide.update_slide_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return redirect('admin/slides')->with('success', trans('slide.delete_slide_success',['name' => $slide->title]));
    }

    public function hiddenStatusSlides(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $slide->status = 0;
        $slide->save();

        return response()->json(['flag' => 'success', 'message' => trans('slide.update_status')]);
    }

    public function showStatusSlides(Request $request, $id)
    {
        $slide = Slide::findOrFail($id);
        $slide->status = 1;
        $slide->save();

        return response()->json(['flag' => 'success', 'message' => trans('slide.update_status')]);
    }
}
