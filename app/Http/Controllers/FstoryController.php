<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Story;
use App\Models\StoryComment;
use App\Repositories\FstoryRepository;
use Illuminate\Http\Request;

class FstoryController extends Controller
{
    use Indexable;

    public function __construct(FstoryRepository $repository)
    {
        $this->repository = $repository;
        $this->table = 'FstoryChapters';
    }

    public function storyDetail(Request $request, $storyId)
    {
        $story = Story::find($storyId);

        $otherStories = $this->repository->getOtherStoriesByStoryId($story);

        // Get chapters for story and pagination
        // $parameters = $this->getParameters($request);
        // Get records and generate links for pagination
        $chapters = $this->repository->getChapters(config("app.nbrPages.front.".$this->table), $storyId);
        $links = $chapters
        // ->appends($parameters)
        ->links('front-ends.components.pagination');

        // Ajax response
        if ($request->ajax ()) {
            if(!$request->type){
                return response ()->json ([
                    'table' => view ("front-ends.components.list-chapters", ["chapters" => $chapters, 'story' => $story])->render (),
                    'pagination' => $links->toHtml (),
                ]);
            }
            if($request->type == 'list-chapters'){
                return response ()->json ([
                    'table' => view ("front-ends.components.list-chapters", ["chapters" => $chapters, 'story' => $story])->render (),
                    'pagination' => $links->toHtml (),
                ]);
            }
        }
        

        return view('front-ends.story',['story' => $story, 'chapters' => $chapters, 'links' => $links, 'otherStories' => $otherStories]);
    }
    
}
