<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index() 
    {
        return view('admin.category.index');
    }

    public function store(CategoryRequest $request)
    {
         dd($request-all());
            $category = (new CategoryRepository())->storeByRequest($request);

            if($category){
                return to_route('category.index')->whithSuccess('Category Created successfully');
            }else{
                return to_route('category.index')->whithError('Category not Created');
            }
    }
}
