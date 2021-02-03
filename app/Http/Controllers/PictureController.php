<?php

namespace App\Http\Controllers;

use App\Helpers\PictureUploadHelper;
use App\Models\Deliveryman;
use App\Models\Picture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        //

        return Picture::with('user')->get();
    }

    public function get(Request $request)
    {
        //

        return Picture::where('id', $request->id)->with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Picture|\Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $picture = new Picture();
        $picture->user_id = \auth()->id();
        $picture->description = $request->get('description');
        $picture->title = $request->get('title');

        $picture_url = PictureUploadHelper::uploadPictureToDisk('public', 'pictures', $request->get('picture',));
        $picture->url = $picture_url;
        $picture->save();
        return $picture;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function show(Picture $picture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function edit(Picture $picture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Picture $picture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Picture $picture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Picture $picture)
    {
        //
    }
}
