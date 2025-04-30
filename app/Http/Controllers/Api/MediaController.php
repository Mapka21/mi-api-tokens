<?php

// app/Http/Controllers/Api/MediaController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function index()
    {
        return Media::with('characters')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string',
            'classification' => 'required|string',
            'release_date'   => 'required|date',
            'review'         => 'required|string',
            'season'         => 'nullable|integer',
            'character_ids'  => 'array',
            'character_ids.*'=> 'exists:characters,id',
        ]);

        $media = Media::create($data);
        if (isset($data['character_ids'])) {
            $media->characters()->sync($data['character_ids']);
        }

        return response()->json($media->load('characters'), 201);
    }

    public function show(Media $media)
    {
        return $media->load('characters');
    }

    public function update(Request $request, Media $media)
    {
        $data = $request->validate([
            'title'          => 'sometimes|required|string',
            'classification' => 'sometimes|required|string',
            'release_date'   => 'sometimes|required|date',
            'review'         => 'sometimes|required|string',
            'season'         => 'nullable|integer',
            'character_ids'  => 'array',
            'character_ids.*'=> 'exists:characters,id',
        ]);

        $media->update($data);
        if (isset($data['character_ids'])) {
            $media->characters()->sync($data['character_ids']);
        }

        return $media->load('characters');
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return response()->noContent();
    }
}
