<?php

namespace App\Imports;

use App\Models\Story;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StoryImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        if($collection->isNotEmpty())
        {
            // dd($collection[1]);
            foreach ($collection as $row)
            {
                $story = Story::where('name', $row['name'])->first();
                if(isset($story)){
                    $story->update([
                        'name' => $row['name'],
                        'avatar' => $row['avatar'],
                        'author' => $row['author'],
                        'source' => $row['source'],
                        'status' => $row['status'],
                        'total_chapter' => $row['total_chapter'] ? $row['total_chapter'] : 0,
                        'description' => $row['description'],
                        'status' => 0
                    ]);
                }else{
                    Story::create([
                        'name' => $row['name'],
                        'avatar' => $row['avatar'],
                        'author' => $row['author'],
                        'source' => $row['source'],
                        'status' => $row['status'],
                        'total_chapter' => $row['total_chapter'],
                        'description' => $row['description'],
                        'status' => 0
                    ]);
                }
            }
        }
    }
}
