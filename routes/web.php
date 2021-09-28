<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RepoController;

Route::get('/',[RepoController::class, 'getRepos']);

Route::get('/repo-details/{id}',[RepoController::class, 'getRepoDetails']);

Route::get('/reset-repos/',[RepoController::class, 'resetRepos']);

?>