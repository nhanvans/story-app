<?php

namespace App\Console\Commands;

use App\Exports\ChapterExport;
use App\Exports\StoryExport;
use App\Models\Story;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ExportStoryData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:story';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        set_time_limit(0);
        // $stories = Story::all();
        // $dataStories = $stories->toArray();

        // foreach($stories as $story)
        // {
        //     $chapterForStories = $story->chapters->toArray();
        //     $dataChapterForStories = [];
        //     foreach($chapterForStories as $chapterForStory){
        //         $chapterForStory['name_story'] = $story->name;
        //         $dataChapterForStories[] = $chapterForStory;
        //     }

        //     $fileNameChapter = 'stories/chapters/chapter_'.$story->name.'.csv';
        //     Excel::store(new ChapterExport($dataChapterForStories), $fileNameChapter,'external',\Maatwebsite\Excel\Excel::CSV);

        //     $key = array_search($story->id, array_column($dataStories, 'id'));
        //     $dataStories[$key]['folder_chapter'] = '/stories/chapters/';
        // }

        // $fileNameStory = 'stories/stories.csv';
        // Excel::store(new StoryExport($dataStories), $fileNameStory,'external',\Maatwebsite\Excel\Excel::CSV, [
        //     'Content-Type' => 'text/csv',
        // ]);
        print_r('OK');
        return Command::SUCCESS;
    }
}
