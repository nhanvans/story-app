<?php
namespace App\Repositories;

use App\Models\Chapter;
use App\Models\Story;

class FstoryRepository {

    public function getChapters($nbrPages, $storyId)
    {
        return Chapter::where('story_id', $storyId)->orderBy('id', 'asc')
//         ->where('is_active',false)
        // ->when (($parameters['search'] !== ''), function ($query) use ($parameters) {
        //     $query->where('name', 'like', "%".$parameters['search']."%");
        // })
        ->paginate($nbrPages);
    }

    public function getOtherStoriesByStoryId($story)
    {
        $categoryIdOfStory = $story->categories->map(function ($category) {
            return $category->id;
        });
        
        return Story::whereHas('categories', function($q) use($categoryIdOfStory){

            $q->whereIn('categories.id', $categoryIdOfStory); 

        })->paginate(config("app.nbrPages.front.otherStories"))->reject(function ($otherStory) use ($story) {
            return $otherStory->id === $story->id;
        });
    }
    

}