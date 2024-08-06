<?php

use App\Http\Resources\VerificationCodeResource;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Route;
use App\Models\VerificationCode;

Route::get('/', function () {
    Mail::to('5dQpK@example.com')->send(new TestMail());
});

Route::get('/api/verification_code/{email}', function ($email) {
    return new VerificationCodeResource(VerificationCode::where('email', $email)->firstOrFail());
});
