<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TagsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Tag;
use App\Upload\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TagsDataTable $dataTable)
    {
        return $dataTable->render('admin.tags.index');
    }

    public function indexTwo()
    {
        return view('admin.tags.indextwo', ['tags' => Tag::whereNull('parent_id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.add', ['restaurants' => Restaurant::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            toastr()->error('Check Errors In Add Tag Form');

            return redirect()->back()->withErrors($validator);
        }

        Tag::create($request->all());

        toastr()->success('Tag Added Successfully');

        return redirect()->route('tags.index')->with('status', 'Tag Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', ['tag' => $tag, 'restaurants' => Restaurant::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            toastr()->error('Check Errors In Edit Tag Form');

            return redirect()->back()->withErrors($validator);
        }

        $tag->update($request->all());

        toastr()->success('Tag Updated Successfully');

        return redirect()->route('tags.index')->with('status', 'Tag Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        toastr()->success('Tag Deleted Successfully');

        $tag->delete();

        return redirect()->route('tags.index')->with('status', 'Tag Deleted Successfully');
    }
}
