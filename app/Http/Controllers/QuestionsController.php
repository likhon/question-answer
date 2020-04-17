<?php

namespace App\Http\Controllers;


use App\Question;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AskQuestionRequest;

class QuestionsController extends Controller
{

    public function index()
    {
        $questions = Question::with('user')->latest()->paginate(5);
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
        return redirect()->route('questions.index')->with('success', 'Your question hss been submitted');

//        $check = Question::create($data);
//        return Redirect::to("form")->withSuccess('Great! Form successfully submit with validation.');


    }

    public function show(Question $question)
    {
        //
    }


    public function edit(Question $question)
    {
        //
    }


    public function update(Request $request, Question $question)
    {
        //
    }


    public function destroy(Question $question)
    {
        //
    }
}
