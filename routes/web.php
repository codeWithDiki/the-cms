<?php

use Illuminate\Support\Facades\Route;

Route::livewire("/", "pages::home")->name("home");

Route::prefix("posts")
->name("posts.")
->group(function(){

    Route::livewire("/", "pages::post.index")->name("index");

    Route::livewire("{post:slug}", "pages::post.show")->name("show");

});
