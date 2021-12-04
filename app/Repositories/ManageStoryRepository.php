<?php
namespace App\Repositories;

use App\Models\Category;
use App\Models\Story;
use App\Services\uploadFile;
use Illuminate\Support\Facades\File;

class ManageStoryRepository {

    public function getAll($nbrPages, $parameters)
    {
        return Story::orderBy($parameters['order'], 'desc')
//         ->where('is_active',false)
        ->when (($parameters['search'] !== ''), function ($query) use ($parameters) {
            $query->where('name', 'like', "%".$parameters['search']."%");
        })
        // ->when(($parameters['status'] !== ''), function($query) use ($parameters){
        //     $query->where(function($q) use ($parameters){
        //         $q->where('status','=',$parameters['status']);
        //     });
        // })
        ->paginate($nbrPages);
    }

    public function getAllCategories()
    {
        return Category::all();
    }
    
    public function createAndUpdateStory($request, $storyId)
    {
        $data = $request->all();
        
        if($request->hasFile('avatar')){
            $dirIcon = "upload/images/stories/";
            !File::exists($dirIcon) ? mkdir($dirIcon, 777, true) : null;
            $data["avatar"] = uploadFile::uploadImage($request->file('avatar'), $dirIcon, 0);
        }
        $story = Story::find($storyId);
        if($story){
            if($request->hasFile('avatar')){
                $story->avatar ? @unlink($story->avatar) : null;
            }
            $story->update($data);

            // dd($story->categories());
            // update tag
            $tagChoosed = $story->categories()->get(['category_id'])->toArray();
            //  dd($tagChoosed);
            $arrayTagChoosed = [];
            foreach($tagChoosed as $key => $value){
                $arrayTagChoosed[] = $value['category_id'];
            }
            $arrayNewTag = $request->categories;
            $attach = array_diff($arrayNewTag, $arrayTagChoosed);
            $detach = array_diff($arrayTagChoosed, $arrayNewTag);
            
            $story->categories()->attach($attach);
            $story->categories()->detach($detach);    
        }else{
            $story = Story::create($data);
            $story->categories()->attach($request->categories);
        }

        
        return $story;
    }

    public function getStoryById($storyId)
    {
        return Story::find($storyId);
    }

    public function deleteStoryById($storyId)
    {
        $story = Story::find($storyId);
        if($story){
            $story->avatar ? @unlink($story->avatar) : null;
            $story->delete();
        }
        return $story;
    }

}