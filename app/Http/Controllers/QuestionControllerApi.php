<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Exception;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class QuestionControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 5;
        $page = $request->page ?? 0;
        return response(Question::limit($perpage)->offset($perpage * $page)->get());
    }

    public function total()
    {
        return response(Question::all()->count());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'array',
            'tags.*' => 'integer|exists:tags,id',
        ]);

        $user = $request->user();

        $fileUrl = "";

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            // Генерация уникального имени файла
            $fileName = rand(1, 100000). '_' . $file->getClientOriginalName();
            try {
                // Загрузка файла в S3
                $path = Storage::disk('s3')->putFileAs('question_pictures', $file, $fileName);
                // Получение URL загруженного файла
                $fileUrl = Storage::disk('s3')->url($path);
            }
            catch (Exception $e){
                return response()->json(['message' => 'Error uploading file to S3: ',
                    'error' => ['code' => $e->getCode(), 'message'=> $e->getMessage()]], 500);
            };
        }
        $question = new Question([
            'user_id' => $user->id,
            'title' => $validated['title'],
            'content' => $validated['content'],
            'picture_url' => $fileUrl,
        ]);
        $question->save();
        if ($request->has('tags')) {
            $question->tags()->attach($validated['tags']);
        }
        return response()->json([
            'code' => 0,
            'message' => 'Вопрос успешно добавлен',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response(Question::all()->where('id', $id)->first());
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
