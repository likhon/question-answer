@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <div class="d-flex align-items-center">
                                <h1>{{$question->title}}</h1>
                                <div class="ml-auto">
                                    <a href="{{route('questions.index')}}" class="btn btn-outline-primary">Back to all Question</a>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a class="vote-up" title="This question is useful"><i class="fas fa-caret-up fa-3x"></i></a>
                                <span class="votes-count">1230</span>
                                <a class="vote-down off" title="This question is not useful"><i class="fas fa-caret-down fa-3x"></i></a>
                                <a title="Click to mark as favorite question (Click again to undo)" class="favorite mt-2 favorited">
                                    <i class="fas fa-star fa-2x"></i>
                                <span class="favorites-count">123</span>
                                </a>

                            </div>
                            <div class="media-body">
                                {!!$question->body_html!!}
                                <div class="float-right">
                                    <span class="text-muted">{{ $question->created_date }}</span>
                                    <div class="media">
                                        <a href="{{ $question->user->url }}" class="pr-2">
                                            <img src="{{ $question->user->avatar }}">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{ $question->user->url }}">{{ $question->user->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('answers._index',[
            'answers'=> $question->answers,
            'answersCount' => $question->answers_count])
        @include('answers._create')
    </div>
@endsection
