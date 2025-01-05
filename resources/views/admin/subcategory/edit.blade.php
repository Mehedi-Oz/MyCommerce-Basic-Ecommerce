@extends('admin.master')

@section('title')
    Update SubCategory
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Update Product SubCategory</h4>
                    <p class="text-success">{{ session('message') }}</p>

                    <form class="form-horizontal p-t-20" action="{{ route('subcategory.update', ['id' => $subcategory->id]) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                Category Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select name="category_id" id="" class="form-control">
                                    <option value="" disabled selected>--select a category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $subcategory->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputuname3" class="col-sm-3 control-label">
                                SubCategory Name
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputuname3"
                                    placeholder="subcategory name" name="name" value="{{ $subcategory->name }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="exampleInputEmail3" class="col-sm-3 control-label">
                                SubCategory Description
                                <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleInputEmail3" rows="10" name="description" placeholder="description">{{ $subcategory->name }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="form-label col-sm-3 control-label" for="web">SubCategory Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="input-file-now" class="dropify" name="image" />
                                <img src="{{ asset($subcategory->image) }}" alt=""
                                    style="height: 100px; width: 100px; margin-top: 10px">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword4" class="col-sm-3 control-label">Publication Status</label>
                            <div class="col-sm-9">
                                <label class="me-3"><input type="radio" name="status" value="1"
                                        {{ $subcategory->status == 1 ? 'checked' : '' }}>Published</label>
                                <label class=""><input type="radio" name="status" value="2"
                                        {{ $subcategory->status == 2 ? 'checked' : '' }}>Unpublished</label>
                            </div>
                        </div>

                        <div class="form-group row m-b-0">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">Update
                                    SubCategory
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
