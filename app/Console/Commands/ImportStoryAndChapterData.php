<?php

namespace App\Console\Commands;

use App\Imports\ChapterImport;
use App\Imports\StoryImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ImportStoryAndChapterData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:StoryAndChapter';

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
        // Excel::import(new StoryImport, config('app.data_folder'). 'stories/stories.csv');

        // $dir = config('app.data_folder') . 'stories/chapters/';
        // foreach (scandir($dir) as $file) {
        //     if ( $file != '.'  &&  $file != '..' && strpos($file, 'chapter_') !== false && strpos($file, 'csv') !== false)
        //     {
        //         Excel::import(new ChapterImport, $dir.$file);
        //     }
        // }
        return Command::SUCCESS;
    }
}
