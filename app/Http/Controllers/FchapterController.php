<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Story;
use App\Repositories\FchapterRepository;
use Illuminate\Http\Request;

class FchapterController extends Controller
{
    public function __construct(FchapterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function storyDetailChapter($storyId, $chapterId)
    {
        $chapter = Chapter::with('story')->where(function ($query) use ($storyId, $chapterId) {
            $query->where('story_id', $storyId)
            ->where('id', $chapterId);
        })->first();
        $story = $chapter->story;

        $chapterNext = $chapter->next()->first(['id', 'name', 'story_id']);
        $chapterPrevious = $chapter->previous()->first(['id', 'name', 'story_id']);

        $otherStories = $this->repository->getOtherStoriesByStoryId($story);
        return view('front-ends.chapter',['story' => $story, 'chapter' => $chapter, 'otherStories' => $otherStories, 'chapterNext' =>$chapterNext, 'chapterPrevious' => $chapterPrevious]);
    }
}
