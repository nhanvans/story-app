<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::resource('/categories', App\Http\Controllers\ManageCategoryController::class)->names([
        'index' => 'manage-categories.index',
        'create' => 'manage-categories.create',
        'store' => 'manage-categories.store',
        'show' => 'manage-categories.show',
        'edit' => 'manage-categories.edit',
        'update' => 'manage-categories.update',
        'destroy' => 'manage-categories.destroy'
    ]);
    
    Route::resource('/stories', App\Http\Controllers\ManageStoryController::class)->names([
        'index' => 'manage-stories.index',
        'create' => 'manage-stories.create',
        'store' => 'manage-stories.store',
        'show' => 'manage-stories.show',
        'edit' => 'manage-stories.edit',
        'update' => 'manage-stories.update',
        'destroy' => 'manage-stories.destroy'
    ]);
    
    Route::resource('/chapters', App\Http\Controllers\ManageChapterController::class)->names([
        'index' => 'manage-chapters.index',
        'create' => 'manage-chapters.create',
        'store' => 'manage-chapters.store',
        'show' => 'manage-chapters.show',
        'edit' => 'manage-chapters.edit',
        'update' => 'manage-chapters.update',
        'destroy' => 'manage-chapters.destroy'
    ]);


});

Route::get('/', [App\Http\Controllers\FhomeController::class, 'home'])->name('home_story');
Route::get('/story-details/{storyId}', [App\Http\Controllers\FstoryController::class, 'storyDetail'])->name('story_detail');
Route::get('/story-details/{storyId}/{chapterId}', [App\Http\Controllers\FchapterController::class, 'storyDetailChapter'])->name('story_detail_chapter');

Route::get('/search', [App\Http\Controllers\FsearchController::class, 'index'])->name('search_stories');

Route::get('/comments/{storyId}', [App\Http\Controllers\StoryCommentController::class, 'getCommentByStory'])->name('comment.list');
Route::post('/comments/{storyId}', [App\Http\Controllers\StoryCommentController::class, 'comment'])->name('comment')->middleware(['auth', 'verified']);
Route::post('/comments/replies/{commentId}', [App\Http\Controllers\StoryCommentController::class, 'replyComment'])->name('reply')->middleware(['auth', 'verified']);


Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
    ->name('ckfinder_connector');

Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
    ->name('ckfinder_browser');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
