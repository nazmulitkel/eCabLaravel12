@extends('admin.layouts.app')

@section('content')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header"></div>
            <div class="card-footer"></div>
        </div>
    </div>
        <div class="col-md-5">
            <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Add New Categories</h5>
                    </div>
                <div class="card-footer">
                     <form action="{{ route('category.store') }}" method="post" enctyep=multipart/form-data>
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name"name" id="categoryName" class="form-control" placeholder="Category Name">
                            @error('name')
                            <span class="text-damger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                        <label for="" class="form-label">Category Slug</label>
                            <input type="text" name"slug" id="categorySlug " class="form-control" placeholder="Category Slug">
                            @error('slug')
                            <span class="text-damger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                        <label for="categoryImage" class="form-label">Category Image</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="file" name"image" id="categoryImage" class="form-control" onchange="document.getElementById('categoryImagePrv').src=window.URL.createObjectURL(this.files[0])">
                            @error('image')
                            <span class="text-damger">{{$message}}</span>
                             @enderror
                        </div>
                            <div class="col-6">
                                <img src="{{ asset('default.webp') }}" width="80" class="mb-2" alt="" id="categoryImagePrv">
                            </div>
                        </div>
                        </div>
                        <div class="mb-4 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
         </div>
</div>







@endsection