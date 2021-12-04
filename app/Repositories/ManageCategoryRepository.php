<?php
namespace App\Repositories;

use App\Models\Category;

class ManageCategoryRepository {

    public function getAll($nbrPages, $parameters)
    {
        return Category::orderBy($parameters['order'], 'desc')
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
    
    public function createAndUpdateCategory($request, $categoryId)
    {
        $data = $request->all();
        
        $category = Category::find($categoryId);
        if($category){
            $category->update($data);
        }else{
            Category::create($data);
        }
        return $category;
    }

    public function getCategoryById($categoryId)
    {
        return Category::find($categoryId);
    }

    public function deleteCategoryById($storyId)
    {
        $category = Category::find($storyId);
        if($category){
            $category->delete();
        }
        return $category;
    }

}