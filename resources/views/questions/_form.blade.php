@csrf

<div class="form-group">
    <label for="question-title">Question Title</label>
    <input class="form-control {{ $errors->has('title') ? 'invalid-input' : ''  }}" type="text"  value="{{ old('title', $question->title) }}" name="title" id="question-title">

    @if($errors->has('title'))
        <div class="invalid-input-message">
            <strong>{{$errors->first('title')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <label for="question-body">Explain your question</label>
    <textarea rows="10" class="form-control {{ $errors->has('body')? 'invalid-input' : ''  }}"  name="body" id="question-body">{{ old('body', $question->body) }}</textarea>

    @if($errors->has('body'))
        <div class="invalid-input-message">
            <strong>{{$errors->first('body')}}</strong>
        </div>
    @endif
</div>
<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>
