@extends('admin.layouts.app')

@section('content')
<div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <h5 class="">All Categories</h5>
                </div>
                <div class="card-footer">
                    <table class="table table-hover display" id="categoryTable">
                        <thead>
                            <tr>
                                <th class="">Sl</th>
                                <th class="">Category Name</th>
                                <th class="">Category Slug</th>
                                <th class="text-center">Category Image</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories ?? [] as $key => $category)
                                <tr>
                                    <td>{{ $key + 1  }}</td>
                                    <td>{{ $category?->name }}</td>
                                    <td>{{ $category?->slug }}</td>
                                    <td class="text-center">
                                        <img src="{{ $category?->thumbnail }}" alt="">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('category.edit', $category?->id) }}"
                                            class="btn btn-danger btn-icon btn-md">
                                            <i data-lucide="edit"></i>
                                        </a>
                                        {{-- <a href="#" class="btn btn-danger btn-icon btn-md"> Edit</a>
                                        <a href="#" class="btn btn-danger btn-icon btn-md"> Delete</a> --}}

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-danger">No Category Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h5 class="">Add New Category</h5>
                </div>
                <div class="card-footer">
                    <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="" class="form-label">Category Name</label>
                            <input type="text" name="name" id="categoryName" class="form-control"
                                placeholder="Category Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="" class="form-label">Category Slug</label>
                            <input type="text" name="slug" id="categorySlug" class="form-control"
                                placeholder="Category Slug">
                            @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="categoryImage" class="form-label">Category Image</label> <br>
                            <img src="{{ asset('default.webp') }}" width="120" class="mb-2" alt=""
                                id="categoryImagePrv">
                            <input type="file" name="image" id="categoryImage" class="form-control"
                                onchange="validateImage(this)">
                            <span class="text-danger" id="imageError"></span>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

            {{-- <div class="row">
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
                                            <img src="{{ asset('default.wepb') }}" width="80" class="mb-2" alt="" id="categoryImagePrv">
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
            </div> --}}





@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#categoryTable').DataTable();
        });

        function validateImage(input) {
            const file = input.files[0];
            const errorMessage = document.getElementById('imageError');
            const ImagePrv = document.getElementById('categoryImagePrv');
            const submit = document.getElementById('submit');
            errorMessage.textContent = '';

            if (file) {
                const imgSize = file.size / (1024 * 1024);
                if (imgSize > 2) {
                    errorMessage.textContent = 'Image size must be less than 2MB';
                    ImagePrv.src = URL.createObjectURL(file);
                    submit.disabled = true;
                } else {
                    ImagePrv.src = URL.createObjectURL(file);
                    submit.disabled = false;
                }
            }
        }
    </script>
@endpush
