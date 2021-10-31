<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\LecturesDataTable;
use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Lecture;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class LecturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param LecturesDataTable $lecturesDataTable
     * @return Application|Factory|View
     */
    public function index(LecturesDataTable $lecturesDataTable)
    {
        return $lecturesDataTable->render('admin.components.lecture.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $lecture = new Lecture();
        $courses = Course::all()->pluck("title", "id");
        return view('admin.components.lecture.create', compact('lecture','courses'));
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
        $validator = Validator::make($input, Lecture::$cast);
        if ($validator->fails()) {
            return redirect()->route('lectures.create')->withErrors($validator)->withInput();
        }
        Lecture::create($input);
        return redirect()->route('lectures.index')->with(['success' => 'Lecture ' . __("messages.add")]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return Response
     */
    public function show(Lecture $lecture)
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
        $lecture = Lecture::find($id);
        $courses = Course::all()->pluck("title", "id");
        return view('admin.components.lecture.edit', compact('lecture','courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $lecture = Lecture::find($id);
        $lecture->update($input);
        return redirect()->route('lectures.index')->with(['success' => 'Lecture ' . __("messages.update")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $lecture = Lecture::findOrFail($id);
        $lecture->delete();
        return redirect()->back()->with(['success' => 'Lecture ' . __("messages.delete")]);
    }
}
