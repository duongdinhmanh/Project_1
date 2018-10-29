<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('role:admin')->only(['create', 'destroy']);
    }

    public function index(Request $request)
    {
        $users = User::paginate(10);
        $allRoles = Role::all();

        return view('admin.user.index', compact('users', 'allRoles'))->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'address' => $request->get('address'),
            'password' => Hash::make($request->get('123456')),
            'status' => $request->get('status')
        ]);

        $user->attachRole(Role::where('name', 'manager')->firstOrFail());

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
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
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();

        return back()->with('success', 'User updated!');
    }

    public function update_img(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->images = $request->image;
        $user->save();

        return back()->with('success', 'Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hiddenStatusUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = config('common.default_zero');
        $user->save();

        return response()->json(['flag' => 'success', 'message' => trans('user.update_status')]);
    }

    public function showStatusUsers(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->status = config('common.default_one');
        $user->save();

        return response()->json(['flag' => 'success', 'message' => trans('user.update_status')]);
    }
}
