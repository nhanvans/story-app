<?php
namespace App\Repositories;

use App\Models\Story;

class FsearchRepository {

    public function getAll($nbrPages, $parameters)
    {
        return Story::orderBy($parameters['order'], 'desc')
//         ->where('is_active',false)
        ->when (($parameters['search'] !== ''), function ($query) use ($parameters) {
            $query->where('name', 'like', "%".$parameters['search']."%");
        })
        ->when(($parameters['categories'] !== [] && $parameters['categories'] !== ''), function ($query) use ($parameters) {
            $query->whereHas('categories', function($q) use($parameters){

                $q->whereIn('categories.id', $parameters['categories']); //this refers id field from categories table

            });
        })
        // ->when(($parameters['status'] !== ''), function($query) use ($parameters){
        //     $query->where(function($q) use ($parameters){
        //         $q->where('status','=',$parameters['status']);
        //     });
        // })
        ->paginate($nbrPages);
    }
    

}