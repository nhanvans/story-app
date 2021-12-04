<?php

namespace App\Http\Controllers;

use App\Repositories\ManageChapterRepository;
use Illuminate\Http\Request;

class ManageChapterController extends Controller
{
    use Indexable;

    public function __construct(ManageChapterRepository $repository)
    {
        $this->repository = $repository;
        $this->table = 'chapters';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $storyId = $request->cookie('story_id');

        $story = $this->repository->getStoryById($storyId);
        
        if(!isset($story))
        {
            return redirect()->route('manage-stories.index');
        }

        $parameters = $this->getParameters ($request);
        // Get records and generate links for pagination
        $records = $this->repository->getAll(config ("app.nbrPages.back.".$this->table), $parameters, $storyId);
        $links = $records->appends ($parameters)->links ('pagination');
        
        // Ajax response
        if ($request->ajax ()) {
            return response ()->json ([
                'table' => view("managers.chapters.components.lists", ["chapters" => $records])->render (),
                'pagination' => $links->toHtml (),
            ]);
        }
        
        return view("managers.chapters.index", ["chapters" => $records, 'links' => $links, 'story' => $story]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $storyId = $request->cookie('story_id');
        if(!isset($storyId))
        {
            return redirect()->route('manage-stories.index');
        }

        return view('managers.chapters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storyId = $request->cookie('story_id');
        if(!isset($storyId))
        {
            return redirect()->route('manage-stories.index');
        }

        $story = $this->repository->createAndUpdateChapter($request, null, $storyId);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chapter = $this->repository->getChapterById($id);
        return view('managers.chapters.show', compact('chapter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chapter = $this->repository->getChapterById($id);
        return view('managers.chapters.edit', compact('chapter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $story = $this->repository->createAndUpdateChapter($request, $id, null);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->deleteChapterById($id);
    }
}
