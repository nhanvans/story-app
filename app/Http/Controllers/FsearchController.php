<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\FsearchRepository;
use Illuminate\Http\Request;

class FsearchController extends Controller
{
    use Indexable;

    public function __construct(FsearchRepository $repository)
    {
        $this->repository = $repository;
        $this->table = 'searchStories';
    }

    public function index(Request $request)
    {
        $categories = Category::all();
        
        $parameters = $this->getParameters($request);
        // Get records and generate links for pagination
        $records = $this->repository->getAll(config("app.nbrPages.front.".$this->table), $parameters);
        $links = $records->appends($parameters)->links('front-ends.components.pagination');
        
        // Ajax response
        if ($request->ajax ()) {

            if ($parameters['listType'] === 'grid_layout'){
                return response ()->json ([
                    'table' => view ("front-ends.components.search-list-grid-layout", ["stories" => $records])->render (),
                    'pagination' => $links->toHtml (),
                ]);
            }

            if ($parameters['listType'] === 'list_layout'){
                return response ()->json ([
                    'table' => view ("front-ends.components.search-list-list-layout", ["stories" => $records])->render (),
                    'pagination' => $links->toHtml (),
                ]);
            }

            return response ()->json ([
                'table' => view ("front-ends.components.search-list-grid-layout", ["stories" => $records])->render (),
                'pagination' => $links->toHtml (),
            ]);
            
        }
        return view('front-ends.search', ['stories' => $records, 'categories' => $categories, 'links' => $links]);
    }
}
