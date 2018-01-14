<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImagesRequest;
use App\Repositories\PhotosRepository;

class PhotoController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('photo');
    }

    public function store(ImagesRequest $request, PhotosRepository $photosRepository)
    {
        $photosRepository->save($request->image);

        return view('photo_ok');
    }
}
