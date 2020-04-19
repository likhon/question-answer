<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Question;
use App\Policies\QuestionPolicy;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        Question::class => QuestionPolicy::class,
    ];


    public function boot()
    {
        $this->registerPolicies();

    }
}
