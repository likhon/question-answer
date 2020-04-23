<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\CommonMarkConverter;

class Answer extends Model
{
    public function question(){
        return $this->belongsTo(Question::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function boot()
    {
        parent::boot();
        static::created(function ($answer){
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
    }

    public function getBodyHtmlAttribute(){
        $converter = new CommonMarkConverter();
        return $converter->convertToHtml($this->body);
    }
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
}
