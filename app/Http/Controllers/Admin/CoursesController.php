<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\CoursesDataTable;
use App\Http\Controllers\Controller;

use App\Models\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CoursesDataTable $coursesDataTable
     * @return Application|Factory|View
     */
    public function index(CoursesDataTable $coursesDataTable)
    {
        return $coursesDataTable->render('admin.components.course.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $course = new Course();
        return view('admin.components.course.create', compact('course'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, Course::$cast);
        if ($validator->fails()) {
            return redirect()->route('courses.create')->withErrors($validator)->withInput();
        }
        Course::create($input);
        return redirect()->route('courses.index')->with(['success' => 'Course ' . __("messages.add")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.components.course.edit', compact('course'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $course = Course::find($id);
        $course->update($input);
        return redirect()->route('courses.index')->with(['success' => 'Course ' . __("messages.update")]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->back()->with(['success' => 'Course ' . __("messages.delete")]);

    }
}
