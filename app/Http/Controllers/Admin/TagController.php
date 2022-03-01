<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Models\Tag;

class TagController extends Controller
{
    public function __construct(Tag $tag)
    {
        $this->tag =  $tag;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.tag.index', [
            'tags' => $this->tag->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        $input = $request->validated();

        try {
            $this->tag->create($input);

            return redirect()->route('admin.tags.index')->with('msg', 'Tag stored with success');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Something went wrong, try again')->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.pages.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTagRequest $request, Tag $tag)
    {
        $input = $request->validated();

        try {
            $tag->update($input);

            return redirect()->route('admin.tags.index')->with('msg', 'Tag updated with success');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Something went wrong, try again later')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->delete()) {
            return redirect()->route('admin.tags.index')->with('msg', 'Tag deleted with success');
        }
        return redirect()->back()->withErrors('Something went wron, try again later')->withInput();
    }
}
