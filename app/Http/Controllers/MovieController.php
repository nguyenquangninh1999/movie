<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Models\Movie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::query()->get();

        return view("pages.movies.index", compact('movies'));
    }

    public function create()
    {
        return view("pages.movies.create");
    }

    public function store(CreateMovieRequest $request)
    {

//        $dataInfo = $this->getFileInfo($request->file('file'));
//        $dataInfo['path'] = '';
//        $dataInfo['name'] = $this->getFileName($request->file('file'), '') . '_' . Str::orderedUuid();
//        $filePath = sprintf('%s/%s', $dataInfo['path'], $dataInfo['name']);
//
//        /** @phpstan-ignore-next-line */
//        $fileContent = file_get_contents($request->file('file'));
//        if (!$fileContent) {
//            abort(404);
//        }
//
//        Storage::put($filePath, $fileContent);

        Movie::query()->create([
            'file_name' => $request->input('file_name'),
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);

        return redirect()->route('movies.index');
    }

    private function getFileInfo(object $file): array
    {
        /** @phpstan-ignore-next-line */
        $imageSize = getimagesize($file);
        $size = null;
        if ($imageSize) {
            $size = $imageSize[0] . 'x' . $imageSize[1];
        }

        return [
            'size' => $size,
            'type' => $file->getClientOriginalExtension()
        ];
    }

    private function getFileName(object $file, string $name = ''): string
    {
        if (!$name) {
            $extension = $file->getClientOriginalExtension();
            $name = Str::replace(".$extension", '', $file->getClientOriginalName());
        }

        return $name;
    }
}
