<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perpage = $request->perpage ?? 2;
        return view('questions', [
            'questions' => Question::paginate($perpage)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('question_create', [
            'users' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'string'
        ]);
        $question = new Question($validated);
        $question->save();
        return redirect('/question');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('question', [
            'question' => Question::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('question_edit', [
            'question' => Question::all()->where('id', $id)->first(),
            'users' => User::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string',
            'content' => 'required'
        ]);
        $question = Question::all()->where('id', $id)->first();
        $question->user_id = $validated['user_id'];
        $question->title = $validated['title'];
        $question->content = $validated['content'];
        $question->save();
        return redirect('/question');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Question::destroy($id);
        return redirect('/question');
    }
}
