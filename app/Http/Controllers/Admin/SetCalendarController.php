<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SetCalendar;
use App\Repositories\EloquentRepository\SetCalendarRepository;
use App\Repositories\InterfaceRepository\ApartmentInterfaceRepository;
use App\Repositories\InterfaceRepository\SetCalendarInterfaceRepository;
use Illuminate\Http\Request;

class SetCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $setCalendarRepository;

    protected $apartmentRepository;

    public function __construct(
        SetCalendarInterfaceRepository $setCalendarRepository,
        ApartmentInterfaceRepository $apartmentRepository
    ) {
        $this->setCalendarRepository = $setCalendarRepository;
        $this->apartmentRepository = $apartmentRepository;
    }
    public function index()
    {
        $listSetCalendar = SetCalendar::orderBy('id', 'DESC')->paginate(20);
        return view('admin.set_calendar.list', compact('listSetCalendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $checked = $this->setCalendarRepository->find($id);
        $apartment_checked = $this->apartmentRepository->find($checked->apartment_id);

        return view('admin.set_calendar.detail', compact('checked', 'apartment_checked'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function hiddenSetCalendar(Request $request, $id)
    {
        $check = SetCalendar::findOrFail($id);
        $check->status = 0;
        $check->save();
        return response()->json(['flag' => 'success', 'message' => trans('set_calendar.update_status')]);
    }

    public function showSetCalendar(Request $request, $id)
    {
        $check = SetCalendar::findOrFail($id);
        $check->status = 1;
        $check->save();
        return response()->json(['flag' => 'success', 'message' => trans('set_calendar.update_status')]);
    }
}
