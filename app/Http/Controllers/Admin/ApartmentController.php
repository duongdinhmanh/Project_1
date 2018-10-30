<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\ApartmentCategory;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Features;
use App\Models\Post;
use App\Repositories\EloquentRepository\ApartmentRepository;
use App\Repositories\InterfaceRepository\ApartmentInterfaceRepository;
use DataTables;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{

    protected $apartmentRepository;

    public function __construct(ApartmentInterfaceRepository $apartmentRepository)
    {
        $this->apartmentRepository = $apartmentRepository;
    }

    public function index()
    {
        return view('admin.apartments.list');
    }

    public function getData()
    {
        $list = Apartment::select('id', 'image', 'name', 'price', 'address', 'status', 'created_at')->getApartments()->get();
        return DataTables::of($list)->addColumn('action', function ($list) {
            return '<a href= "' . route("apartments.edit", $list->id) . '" class= "btn btn-xs btn-primary" title="apartment_detail" >
                                <i class="glyphicon glyphicon-edit"></i> ' . __('config.edit') . '</a>
                            <form class = "del_item" action="' . route("apartments.destroy", $list->id) . '" method="POST">
                            ' . method_field('delete') . '
                            ' . csrf_field() . '
                              <button type="submit" class="btn btn-xs btn-danger" onclick="return del(" Bạn chắc chắn muốn xóa.. ")">
                                <i class="fa fa-trash" style="padding: 3px"></i>
                              </button>
                            </form>';
        })->addColumn('category', function ($list) {
            $id = $list->id;
            $val = $this->apartmentRepository->find($id)->apartmentCategory;

            return $val;
        })->addColumn('created_at', function ($list) {
            $time = $list->created_at;
            if ($time) {
                return $time->format('d.m.Y H:i:t');
            }
        })->rawColumns(['category', 'created_at', 'status', 'action'])->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::getCategory()->get();
        $posts = Post::where('status', 1)->get();
        $conditions = Condition::where('status', 1)->get();
        $features = Features::where('status', 1)->get();
        return view('admin.apartments.add', compact('categories', 'posts', 'conditions', 'features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $check = serialize($request->post_id);
        $request->merge(['post_id' => $check]);

        if ($request->img_detail) {
            $file = serialize($request->img_detail);
            $request->merge(['img_detail' => $file]);
        }
        $condition = $request->conditions;
        $request->merge(['conditions' => serialize($condition)]);
        $feature = $request->features;
        $request->merge(['features' => serialize($feature)]);
        $detail_apartment = $this->apartmentRepository->create($request->all());

        if ($request->category_id) {
            $check = rtrim($request->category_id, ',');
            $check2 = explode(',', $check);
            foreach ($check2 as $value) {
                $apartment_category = new ApartmentCategory();
                $apartment_category->apartment_id = $detail_apartment->id;
                $apartment_category->category_id = $value;
                $apartment_category->save();
            }
        }

        return redirect()->route('apartments.index')->with('info_add', 'Add new Products .. ! ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartmentEdit = $this->apartmentRepository->find($id);
        $apartmentCategory = $apartmentEdit->apartmentCategory;
        $categories = Category::getCategory()->get();
        $post = Post::where('status', 1)->get();
        $conditions = Condition::where('status', 1)->get();
        $features = Features::where('status', 1)->get();
        return view('admin.apartments.edit', compact('categories', 'apartmentEdit', 'apartmentCategory', 'post', 'conditions', 'features'));
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
        $apartmentUpdate = $this->apartmentRepository->find($id);
        $check_post = serialize($request->post_id);
        $request->merge(['post_id' => $check_post]);
        if ($request->img_detail) {
            $file = serialize($request->img_detail);
            $request->merge(['img_detail' => $file]);
        }
        $condition = $request->conditions;
        $request->merge(['conditions' => serialize($condition)]);
        $feature = $request->features;
        $request->merge(['features' => serialize($feature)]);
        $detail_apartment = $this->apartmentRepository->update($apartmentUpdate->id, $request->all());

        if ($request->category_id) {
            $array_category = rtrim($request->category_id, ',');
            $check = explode(',', $array_category);
            $apartmentUpdate->apartmentCategory()->sync($check);
        }

        return redirect()->route('apartments.index')->with('info_edit', 'Edit new Products .. ! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->apartmentRepository->delete($id);
        return redirect()->route('apartments.index')->with('info_del', 'Deleted Products .. ! ');
    }
}
