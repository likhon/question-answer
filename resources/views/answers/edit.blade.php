@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Answer</h2>
                    </div>
                    <div class="card-body">


                        <form action="{{ route('questions.answers.update',[$question->id, $answer->id]) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <textarea class="form-control {{ $errors->has('body')? 'invalid-input' : ''  }}" rows="7" name="body">{{ old('body', $answer->body) }}</textarea>
                                @if($errors->has('body'))
                                    <div class="invalid-input-message">
                                        <strong>{{$errors->first('body')}}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-lg">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
