<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\ReferenceTypesDataTable;
use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\ReferenceType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReferenceTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ReferenceTypesDataTable $referenceTypesDataTable)
    {
        return $referenceTypesDataTable->render('admin.components.reference_type.datatable');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $reference_type = new ReferenceType();
        return view('admin.components.reference_type.create', compact('reference_type'));
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
        $validator = Validator::make($input, ReferenceType::$cast);
        if ($validator->fails()) {
            return redirect()->route('reference-types.create')->withErrors($validator)->withInput();
        }
        ReferenceType::create($input);
        return redirect()->route('reference-types.index')->with(['success' => 'Reference Type ' . __("messages.add")]);
    }

    /**
     * Display the specified resource.
     *
     * @param ReferenceType $referenceType
     * @return \Illuminate\Http\Response
     */
    public function show(ReferenceType $referenceType)
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
        $reference_type = ReferenceType::find($id);
        return view('admin.components.reference_type.edit', compact('reference_type'));
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
        $referenceType = ReferenceType::find($id);
        $referenceType->update($input);
        return redirect()->route('reference-types.index')->with(['success' => 'Reference Type ' . __("messages.update")]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $course = ReferenceType::findOrFail($id);
        $course->delete();
        return redirect()->back()->with(['success' => 'Reference Type ' . __("messages.delete")]);
    }
}
