<?php

namespace App\Console\Commands;

use App\Exports\ChapterExport;
use App\Models\Chapter;
use App\Models\Story;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;

class ExportChapterData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:chapter';

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
        // $data = [];
        // $count = Chapter::count();
        // $n = 1;
        // $i = 1;
        // $from = 1;
        // for ($x = 1; $x <= $count; $x++) {
        //     if($i % 10000 == 0 || $i == $count)
        //     {
        //         $chapters = Chapter::offset($from)->limit(10000)->get()->toArray();
        //         foreach($chapters as $chapter)
        //         {
        //             $chapter['name_story'] = Story::find($chapter['story_id'])->name;
        //             $data[] = $chapter;
        //         }
                
        //         $fileName = 'stories/chapter_'.$n.'.csv';
        //         Excel::store(new ChapterExport($data), $fileName,'external',\Maatwebsite\Excel\Excel::CSV);
        //         print(count($data)."===");
        //         $n++;
        //         $from = $x;
        //         $data=[];
        //     }
        //     $i++;
        // }
        return Command::SUCCESS;
    }
}
