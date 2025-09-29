<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perpage = $request->perpage ?? 5;
        $page = $request->page ?? 0;
        return response(Tag::limit($perpage)->offset($perpage * $page)->get());
    }

    public function total()
    {
        return response(Tag::all()->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Tag::all()->where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
