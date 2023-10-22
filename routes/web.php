<?php

use App\Http\Controllers\Email\EmailConfigController;
use App\Http\Controllers\Email\SendEmailController;
use Illuminate\Support\Facades\Route;


Route::get('/',[SendEmailController::class,'showSendMail'])->name('main');
Route::get('/config',[EmailConfigController::class,'showEmailConfig'])->name('setting');
Route::post('/config',[EmailConfigController::class,'setEmailConfig']);
Route::post('/',[SendEmailController::class,'sendEmail']);

