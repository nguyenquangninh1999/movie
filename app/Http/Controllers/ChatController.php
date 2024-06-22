<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Category;
use App\Models\Chat;
use App\Models\Movie;
use App\Models\MovieCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    public function index()
    {
        $chats = Chat::query()->orderByDesc('id')->paginate(10);

        return view("pages.chats.index", compact('chats'));
    }

    public function create()
    {
        return view("pages.chats.create");
    }

    public function store(CreateChatRequest $request)
    {
        $dataInfo = $this->getFileInfo($request->file('image'));
        $dataInfo['path'] = '';
        $dataInfo['name'] = $this->getFileName($request->file('image'), '') . '_' . Str::orderedUuid();
        $filePath = sprintf('%s/%s', $dataInfo['path'], $dataInfo['name']);

        $fileContent = file_get_contents($request->file('image'));
        if (!$fileContent) {
            abort(404);
        }

        Storage::put($filePath, $fileContent);

        Chat::query()->create([
            'image' => $filePath,
            'video' => $request->input('video'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'pay' => $request->input('pay'),
            'zalo' => $request->input('zalo'),
            'birthday' => $request->input('birthday'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'work' => $request->input('work'),
            'price' => $request->input('price'),
            'telegram' => $request->input('telegram'),
        ]);

        return redirect()->route('chats.index');
    }

    public function edit(string $id)
    {
        $chat = Chat::query()->findOrFail($id);

        return view("pages.chats.update", compact('chat'));
    }

    public function update(int $id, UpdateChatRequest $request)
    {
        $chat = Chat::query()->findOrFail($id);
        $image = $request->file('image');

        $data = [
            'video' => $request->input('video'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'pay' => $request->input('pay'),
            'zalo' => $request->input('zalo'),
            'birthday' => $request->input('birthday'),
            'height' => $request->input('height'),
            'weight' => $request->input('weight'),
            'work' => $request->input('work'),
            'price' => $request->input('price'),
            'telegram' => $request->input('telegram'),
        ];

        if ($image) {
            $this->deleteFile([$chat->image]);

            $dataInfo = $this->getFileInfo($request->file('image'));
            $dataInfo['path'] = '';
            $dataInfo['name'] = $this->getFileName($request->file('image'), '') . '_' . Str::orderedUuid();
            $filePath = sprintf('%s/%s', $dataInfo['path'], $dataInfo['name']);

            $fileContent = file_get_contents($request->file('image'));
            if (!$fileContent) {
                abort(404);
            }

            Storage::put($filePath, $fileContent);

            $data['image'] = $filePath;
        }

        $chat->update($data);

        return redirect()->route('chats.index');
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

    public function destroy(int $id)
    {
        $chat = Chat::query()->find($id);
        $this->deleteFile([$chat->image]);
        $chat->delete();

        return redirect()->route('chats.index');
    }

    public function deleteFile(array $fileName): bool
    {
        try {
            return Storage::delete($fileName);
        } catch (\Exception $e) {
            Log::error('[ERROR_DELETE_FILE] =>' . $e->getMessage());

            return false;
        }
    }
}
