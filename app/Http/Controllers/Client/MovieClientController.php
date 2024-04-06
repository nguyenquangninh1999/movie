<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Movie;

class MovieClientController extends Controller
{
    public function index()
    {
        $movies = Movie::query()->get();

        return view("client.index", compact('movies'));
    }

    public function show(string $id)
    {
        $movie = Movie::query()->findOrFail($id);

        return view("client.show", compact('movie'));
    }
}
