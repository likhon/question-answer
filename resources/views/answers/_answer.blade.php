<div class="media post">
    @include('shared._vote',[
        'model' => $answer
    ])
    <div class="media-body">
        {{ $answer->body }}
        <div class="row">
            <div class="col-4">
                <div class="ml-auto">
                    @can('update', $answer)
                        <a href="{{route('questions.answers.edit', [$question->id, $answer->id])}}" class="btn btn-sm btn-outline-info">EDIT</a>
                    @endcan
                    @can('delete', $answer)
                        <form method="post" action="{{route('questions.answers.destroy', [$question->id, $answer->id])}}" class="form-delete">
                            @method('DELETE');
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger"  onclick="return confirm('Are you sure?')">DELETE</button>
                        </form>
                    @endcan
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                @include('shared._author',[
                    'model' => $answer,
                    'label' => 'answered'
                ])
            </div>
        </div>

    </div>
</div>
