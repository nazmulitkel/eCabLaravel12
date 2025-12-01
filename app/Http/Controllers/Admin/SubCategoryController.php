<?php

namespace App\Http\Controllers\Admin;

use App\Models\SubCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest('id')->get();
        $subCategories = SubCategory::latest('id')->paginate(10);
        return view('admin.subCategory.index', compact('categories', 'subCategories'));
    }

    public function store(SubCategoryRequest $request)
    {
        $media = null;
        if ($request->hasFile('image')) {
            $media = MediaRepository::storeByRequest($request->file('image'), 'subCategory', 'image');
        }
        $category = SubCategoryRepository::storeByRequest($request, $media);

        return to_route('subCategory.index')->withSuccess('SubCategory created successfully');
    }

    public function edit(SubCategory $subCategory){
        $categories = Category::latest('id')->get();
        return view('admin.subCategory.edit', compact('subCategory', 'categories'));
    }

    public function update(SubCategoryRequest $request, SubCategory $subCategory)
    {

        $media = $subCategory->media;
        if($request->hasFile('image')){
            if($media && Storage::exists($media->src)){
                $media = MediaRepository::updateByRequest($request->file('image'), 'subCategory', 'image', $media);
            }else{
                $media = MediaRepository::storeByRequest($request->file('image'), 'subCategory', 'image');
            }
        }

        $subCategory = SubCategoryRepository::updateByRequest($request, $subCategory, $media);

        return to_route('subCategory.index')->withSuccess('SubCategory updated successfully!');

    }

}
