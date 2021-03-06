<?php

namespace App\Http\Controllers;


use App\Question;
use App\User;
//use Illuminate\Auth\Access\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;


class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }

    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(10);
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $question = new Question();
        return view('questions.create',compact('question'));
    }


    public function store(AskQuestionRequest $request)
    {

        $request->user()->questions()->create($request->only('title','body'));
        return redirect()->route('questions.index')->with('success', 'Your question has been submitted');

//        $check = Question::create($data);
//        return Redirect::to("form")->withSuccess('Great! Form successfully submit with validation.');


    }

    public function show(Question $question)
    {
        $question->increment('views');
        return view('questions.show', compact('question'));
    }


    public function edit(Question $question)
    {
        if (Gate::denies('update-question', $question)){
            abort(403, "Access denied");
        }
        return view('questions.edit', compact('question'));
    }


    public function update(AskQuestionRequest $request, Question $question)
    {
        $question->update($request->only('title','body'));
        return redirect()->route('questions.index')->with('success', 'Your question has been updated successfully');
    }


    public function destroy(Question $question)
    {
        if (Gate::denies('delete-question', $question)){
            abort(403, "Access denied");
        }
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Your question has been deleted successfully');
    }
}
