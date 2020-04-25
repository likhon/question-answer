<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Question;
use App\Policies\QuestionPolicy;
use App\Answer;
use App\Policies\AnswerPolicy;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Question::class => QuestionPolicy::class,
        Answer::class => AnswerPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();

    }
}
