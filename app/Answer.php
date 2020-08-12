<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use League\CommonMark\CommonMarkConverter;

class Answer extends Model
{
    use VotableTrait;

    protected $fillable = ['body','user_id'];

    protected $appends = ['created_date', 'body_html', 'is_best'];

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
        });
        static::deleted(function ($answer){
           $answer->question->decrement('answers_count');

        });
    }


    public function getBodyHtmlAttribute(){
        $converter = new CommonMarkConverter();
        //dd($converter->convertToHtml($this->body));
        return $converter->convertToHtml($this->body);
    }
    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }
    public  function getStatusAttribute(){
      return $this->isBest()  ? 'vote-accepted' : '';
    }
    public function isBest(){
        return $this->id == $this->question->best_answer_id;
    }

    public function getIsBestAttribute(){
        return $this->isBest();
    }


}
