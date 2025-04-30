<?php

// app/Http/Controllers/Api/CharacterController.php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Character;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function index()
    {
        return Character::with('media')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string',
            'image'       => 'required|string',
            'description' => 'required|string',
            'media_ids'   => 'array',
            'media_ids.*' => 'exists:media,id',
        ]);

        $character = Character::create($data);
        if (isset($data['media_ids'])) {
            $character->media()->sync($data['media_ids']);
        }

        return response()->json($character->load('media'), 201);
    }

    public function show(Character $character)
    {
        return $character->load('media');
    }

    public function update(Request $request, Character $character)
    {
        $data = $request->validate([
            'name'        => 'sometimes|required|string',
            'image'       => 'sometimes|required|string',
            'description' => 'sometimes|required|string',
            'media_ids'   => 'array',
            'media_ids.*' => 'exists:media,id',
        ]);

        $character->update($data);
        if (isset($data['media_ids'])) {
            $character->media()->sync($data['media_ids']);
        }

        return $character->load('media');
    }

    public function destroy(Character $character)
    {
        $character->delete();
        return response()->noContent();
    }
}