<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SubTagsDataTable;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubTagsDataTable $dataTable, Tag $tag)
    {
        return $dataTable->with('tag', $tag)->render('admin.subtags.index', ['tag' => $tag]);
    }

    public function indexTwo(Tag $tag)
    {
        return view('admin.subtags.indextwo', ['subtags' => $tag->subTags()->get(), 'tag' => $tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tag $tag)
    {
        return view('admin.subtags.add', ['tag' => $tag]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Tag $tag)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            toastr()->error('Check Errors In Add Tag Form');

            return redirect()->back()->withErrors($validator);
        }

        $request->merge(['restaurant_id' => $tag->restaurant_id]);

        $tag->subTags()->create($request->all());

        toastr()->success('Sub Tag Added Successfully');

        return redirect()->route('subtags.index', $tag)->with('status', 'Sub Tag Created Successfully');
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
    public function edit(Tag $tag, tag $subtag)
    {
        return view('admin.subtags.edit',['tag' => $tag, 'subtag' => $subtag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag, Tag $subtag)
    {
        $validator = Validator::make($request->all(), ['name' => 'required']);

        if($validator->fails()){
            toastr()->error('Check Errors In Edit Tag Form');

            return redirect()->back()->withErrors($validator);
        }

        $request->merge(['restaurant_id' => $tag->restaurant_id]);

        $subtag->update($request->all());

        toastr()->success('Tag Updated Successfully');

        return redirect()->route('subtags.index', $tag)->with('status', 'Tag Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag, Tag $subtag)
    {
        $subtag->delete();

        toastr()->success('Sub Tag Deleted Successfully');

        return redirect()->back()->with('status', 'Category Deleted Successfully');
    }

    /**
     *  List SubTags
     *
     * @param \App\Models\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function list($id)
    {
        return Tag::whereParentId($id)->get();
    }
}
