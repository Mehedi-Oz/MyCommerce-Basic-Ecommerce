@extends('admin.master')

@section('title')
    Manage Category
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Categories</h4>
                    <h5 class="text-success">{{ session('message') }}</h5>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                                <tr>
                                    <td>Sl No</td>
                                    <td>Date</td>
                                    <td>Category Name</td>
                                    <td>Category Description</td>
                                    <td>Category Image</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td style="text-align: justify; width: 500px">
                                            {{ $category->description }}</td>
                                        <td><img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                                style="height: 60px; width: 60px">
                                        </td>
                                        <td>{{ $category->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"
                                                title="Edit Category" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if ($category->status == 1)
                                                <a href="{{ route('category.status', ['id' => $category->id]) }}"
                                                    title="Unpublish Category" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('category.status', ['id' => $category->id]) }}"
                                                    title="Publish Category" class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif


                                            <form action="{{ route('category.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                <button type="submit" title="Delete Category" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Category? Action Cannot be Undone!')">
                                                    <i class="fa-solid fa-trash "></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
