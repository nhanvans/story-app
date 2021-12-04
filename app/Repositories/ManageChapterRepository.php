<?php
namespace App\Repositories;

use App\Models\Chapter;
use App\Models\Story;

class ManageChapterRepository {

    public function getAll($nbrPages, $parameters, $storyId)
    {
        return Chapter::orderBy($parameters['order'], 'asc')
//         ->where('is_active',false)
        ->when (($parameters['search'] !== ''), function ($query) use ($parameters) {
            $query->where('name', 'like', "%".$parameters['search']."%");
        })
        // ->when(($parameters['status'] !== ''), function($query) use ($parameters){
        //     $query->where(function($q) use ($parameters){
        //         $q->where('status','=',$parameters['status']);
        //     });
        // })
        ->where('story_id', $storyId)
        ->paginate($nbrPages);
    }
    public function getStoryById($storyId)
    {
        return Story::find($storyId);
    }
    
    public function createAndUpdateChapter($request, $chapterId, $storyId)
    {
        $data = $request->all();
        
        $chapter = Chapter::find($chapterId);
        if($chapter){
            $chapter->update($data);
        }else{
            $data['story_id'] = $storyId;
            $chapter = Chapter::create($data);
        }
        return $chapter;
    }

    public function getChapterById($chapterId)
    {
        return Chapter::find($chapterId);
    }

    public function deleteChapterById($chapterId)
    {
        $chapter = Chapter::find($chapterId);
        if($chapter){
            $chapter->delete();
        }
        return $chapter;
    }

}