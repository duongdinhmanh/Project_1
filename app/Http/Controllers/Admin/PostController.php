<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostFormUpdateRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $serial = config('default_one');

        return view('admin.post.index', compact('posts', 'serial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $categories = DB::table('categories')->pluck('name', 'id')->all();
        $categories = Category::all()->pluck('name', 'id');

        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request)
    {
        $input = $request->all();
        $image = $input['image'];
//        dd($image);
//        $input['image'] = substr_replace($this->cutLinkImage($image), '', -1);
//        dd($input['image']);
        Post::create($input);

        return redirect('admin/posts/create')->with('success', trans('post.create_post_success'));
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
        $post = Post::findOrFail($id);

        return view('admin.post.show', compact('post'));
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
        $post = Post::findOrFail($id);
//        $categories = DB::table('categories')->pluck('name', 'id')->all();
        $categories = Category::all()->pluck('name', 'id');
        $selectedCategories = $post->category->id;

        return view('admin.post.edit', compact('post', 'categories', 'selectedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();
//        $image = $input['image'];
//        $input['image'] = substr_replace($this->cutLinkImage($image), '', -1);
        $post->update($input);

        return back()->with('success', trans('post.update_post_success'));
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
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('admin/posts')->with('success', trans('post.delete_post_success', ['name' => $post->title]));
    }

    public function hiddenStatusPosts(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->status = config('common.default_zero');
        $post->save();

        return response()->json(['flag' => 'success', 'message' => trans('post.update_status')]);
    }

    public function showStatusPosts(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->status = config('common.default_one');
        $post->save();

        return response()->json(['flag' => 'success', 'message' => trans('post.update_status')]);
    }

    public function cutLinkImage($image)
    {
        $link_image = '';
//        cut link save database
        $trimmed = explode('/', $image);
        for ($i = 5; $i < count($trimmed); $i++) {
            $link_image = $link_image . $trimmed[$i] . '/';
        }

        return $link_image;
    }
}
