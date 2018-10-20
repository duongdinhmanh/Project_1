<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AboutUsFormRequest;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = About::all();
        $serial = 1;
        return view('admin.about_us.index', compact('aboutUs', 'serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about_us.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AboutUsFormRequest $request)
    {
        $about = new About([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'content' => $request->get('content'),
            'awards' => $request->get('awards'),
            'happy_clients' => $request->get('happy_clients'),
            'winning_awards' => $request->get('winning_awards'),
            'line_of_code' => $request->get('line_of_code'),
            'status' => $request->get('status')
        ]);
        $about->save();

        return redirect('admin/about_us/create')->with('success', trans('about_us.create_about_us_success'));
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
        $aboutUs = About::findOrFail($id);
        return view('admin.about_us.show', compact('aboutUs'));
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
        $aboutUs = About::findOrFail($id);
        return view('admin.about_us.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AboutUsFormRequest $request, $id)
    {
        $aboutUs = About::findOrFail($id);
        $aboutUs->title = $request->get('title');
        $aboutUs->slug = $request->get('slug');
        $aboutUs->content = $request->get('content');
        $aboutUs->awards = $request->get('awards');
        $aboutUs->happy_clients = $request->get('happy_clients');
        $aboutUs->winning_awards = $request->get('winning_awards');
        $aboutUs->line_of_code = $request->get('line_of_code');
        $aboutUs->status = $request->get('status');
        $aboutUs->save();

        return back()->with('success', trans('about_us.update_about_us_success'));
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
        $aboutUs = About::findOrFail($id);
        $aboutUs->delete();

        return redirect('admin/about_us')->with('success',
            trans('about_us.delete_post_success', ['name' => $aboutUs->title]));
    }

    public function hiddenStatusAboutUs(Request $request, $id)
    {
        $aboutUs = About::findOrFail($id);
        $aboutUs->status = 0;
        $aboutUs->save();

        return response()->json(['flag' => 'success', 'message' => trans('about_us.update_status')]);
    }

    public function showStatusAboutUs(Request $request, $id)
    {
        $aboutUs = About::findOrFail($id);
        $aboutUs->status = 1;
        $aboutUs->save();

        return response()->json(['flag' => 'success', 'message' => trans('about_us.update_status')]);
    }
}
