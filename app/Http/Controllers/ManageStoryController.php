<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Indexable;
use App\Repositories\ManageStoryRepository;

class ManageStoryController extends Controller
{
    use Indexable;

    public function __construct(ManageStoryRepository $repository)
    {
        $this->repository = $repository;
        $this->table = 'stories';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $parameters = $this->getParameters ($request);
        // Get records and generate links for pagination
        $records = $this->repository->getAll(config ("app.nbrPages.back.".$this->table), $parameters);
        $links = $records->appends ($parameters)->links ('pagination');
        
        // Ajax response
        if ($request->ajax ()) {
            return response ()->json ([
                'table' => view ("managers.stories.table", ["stories" => $records])->render (),
                'pagination' => $links->toHtml (),
            ]);
        }
        
        return view ("managers.stories.index", ["stories" => $records, 'links' => $links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->repository->getAllCategories();
        return view('managers.stories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $story = $this->repository->createAndUpdateStory($request, null);
        return redirect()->route('manage-stories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = $this->repository->getStoryById($id);
        return redirect()->route('manage-chapters.index')->withCookie('story_id', $story->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $categories = $this->repository->getAllCategories();
        $story = $this->repository->getStoryById($id);
        
        $categoryChoosed = $story->categories()->get(['category_id'])->toArray();
        $arrayCategoryChoosed = [];
        foreach($categoryChoosed as $key => $value){
            $arrayCategoryChoosed[] = $value['category_id'];
        }
        return view('managers.stories.edit',['story'=>$story, 'categories' => $categories, 'categoryChoosed' => $arrayCategoryChoosed]);
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
        $story = $this->repository->createAndUpdateStory($request, $id);
        return redirect()->route('manage-stories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->deleteStoryById($id);
    }
}
