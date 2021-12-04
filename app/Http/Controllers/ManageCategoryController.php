<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Indexable;
use App\Repositories\ManageCategoryRepository;

class ManageCategoryController extends Controller
{
    use Indexable;

    public function __construct(ManageCategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->table = 'categories';
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
                'table' => view ("managers.categories.table", ["categories" => $records])->render (),
                'pagination' => $links->toHtml (),
            ]);
        }
        
        return view ("managers.categories.index", ["categories" => $records, 'links' => $links]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managers.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $story = $this->repository->createAndUpdateCategory($request, null);
        return redirect()->route('manage-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->repository->getCategoryById($id);
        return view('managers.categories.edit',['category'=>$category]);
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
        $category = $this->repository->createAndUpdateCategory($request, $id);
        return redirect()->route('manage-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->deleteCategoryById($id);
    }
}
