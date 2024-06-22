<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        $category = $request->get('category');

        $movies = Movie::query()
            ->with(['movieCategories'])
            ->when($search, function ($q, $search) {
                $q->where('title', 'like', '%' . $search . '%');
            })
            ->when($category, function ($q, $category) {
                $q->whereHas('movieCategories', function ($q) use ($category) {
                    $q->where('category_id', $category);
                });
            })
            ->orderByDesc('id')
            ->paginate(20)->withQueryString();
        $categories = Category::query()->orderByDesc('id')->get();

        return view("client.index", [
            'movies' => $movies,
            'categories' => $categories,
            'category' => $category,
        ]);
    }

    public function show(string $id)
    {
        $movie = Movie::query()->findOrFail($id);
        $movie->update(['number_view' => $movie->number_view + 1]);
        $categories = Category::query()->orderByDesc('id')->get();
        $categoryId = [];
        foreach ($movie->movieCategories as $movieCategory) {
            $categoryId[] = $movieCategory->category_id;
        }
        $movies = Movie::query()
            ->whereHas('movieCategories', function ($q) use ($categoryId) {
                $q->whereIn('category_id', $categoryId);
            })
            ->orderByDesc('id')
            ->limit(20)->get();

        return view("client.show", [
            'movie' => $movie,
            'categories' => $categories,
            'movies' => $movies,
        ]);
    }

    public function chat(Request $request)
    {
        $search = $request->get('search');

        $chats = Chat::query()
            ->when($search, function ($q, $search) {
                $q->where('title', 'like', '%' . $search . '%');
            })
            ->orderByDesc('id')
            ->paginate(20)->withQueryString();

        return view("client.chat-index", [
            'chats' => $chats,
        ]);
    }

    public function chatDetail(string $id)
    {
        $chat = Chat::query()->findOrFail($id);

        return view("client.chat-show", [
            'chat' => $chat,
        ]);
    }
}
