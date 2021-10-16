<?php

namespace App\Http\Controllers;

use App\AttendanceGroup;
use Illuminate\Http\Request;

class AttendanceGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendanceGroup = AttendanceGroup::all();
        return view("attendance_group.index",['attendance_groups' => $attendanceGroup]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("attendance_group.create" );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendanceGroup = new AttendanceGroup;


        $attendanceGroup->name = $request->attendance_group_name;
        $attendanceGroup->description = $request->attendance_group_description;
        $attendanceGroup->difficulty = $request->attendance_group_difficulty;
        $attendanceGroup->school_id = $request->attendance_group_school_id;
        if($request->hasFile("attendance_group_school_logo")){

            $file = $request->file("attendance_group_school_logo");
            $extention=$file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move("uploads/group", $filename);
            $attendanceGroup->logo = $filename;
        }
        $attendanceGroup->save();

        return redirect()->route('attendance_group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceGroup $attendanceGroup)
    {
        return view("attendance_group.show",['attendance_group' => $attendanceGroup]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceGroup $attendanceGroup)
    {
        return view("attendance_group.edit",['attendance_group' => $attendanceGroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttendanceGroup $attendanceGroup)
    {

        $attendanceGroup->name = $request->attendance_group_name;
        $attendanceGroup->description = $request->attendance_group_description;
        $attendanceGroup->difficulty = $request->attendance_group_difficulty;
        $attendanceGroup->school_id = $request->attendance_group_school_id;

        $attendanceGroup->save();

        return redirect()->route('attendance_group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AttendanceGroup  $attendanceGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceGroup $attendanceGroup)
    {
        $attendanceGroup->delete();
        return redirect()->route('attendance_group.index');
    }
}
