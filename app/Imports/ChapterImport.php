<?php

namespace App\Imports;

use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ChapterImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        if($collection->isNotEmpty())
        {
            foreach ($collection as $row)
            {
                $story = Story::where('name', $row['name_story'])->first();
                if(isset($story)){
                    $chapter = Chapter::where('name', $row['name'])->where('story_id', $story->id)->first();

                    if(isset($chapter)){
                        $chapter->update([
                            'name' => $row['name'], 
                            'content' => $row['content'],
                        ]);
                    }else{
                        Chapter::create([
                            'story_id' => $story->id,
                            'name' => $row['name'], 
                            'content' => $row['content'],
                        ]);
                    }
                }
            }
        }
    }
}
