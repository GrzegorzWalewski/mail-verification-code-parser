<?php

namespace App\Providers;

use App\Models\VerificationCode;
use Illuminate\Support\ServiceProvider;
use BeyondCode\Mailbox\InboundEmail;
use BeyondCode\Mailbox\Facades\Mailbox;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Mailbox::catchAll(function (InboundEmail $email) {
            VerificationCode::updateOrCreate(['email' => $email->to()[0]], ['code' => $email->subject()]);
        });
    }
}
