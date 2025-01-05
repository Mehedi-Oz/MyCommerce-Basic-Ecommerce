@extends('admin.master')

@section('title')
    Manage SubCategory
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All SubCategories</h4>
                    <h5 class="text-success">{{ session('message') }}</h5>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                                <tr>
                                    <td>Sl No</td>
                                    <td>Date</td>
                                    <td>Category Name</td>
                                    <td>SubCategory Name</td>
                                    <td>CaSubCategorytegory Description</td>
                                    <td>SubCategory Image</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subcategory->created_at }}</td>
                                        <td>{{ $subcategory->category->name }}</td>
                                        <td>{{ $subcategory->name }}</td>
                                        <td style="text-align: justify; width: 500px">
                                            {{ $subcategory->description }}</td>
                                        <td><img src="{{ asset($subcategory->image) }}" alt="{{ $subcategory->name }}"
                                                style="height: 60px; width: 60px">
                                        </td>
                                        <td>{{ $subcategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('subcategory.edit', ['id' => $subcategory->id]) }}"
                                                title="Edit SubCategory" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if ($subcategory->status == 1)
                                                <a href="{{ route('subcategory.status', ['id' => $subcategory->id]) }}"
                                                    title="Unpublish SubCategory" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('subcategory.status', ['id' => $subcategory->id]) }}"
                                                    title="Publish SubCategory" class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif


                                            <form action="{{ route('subcategory.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $subcategory->id }}">
                                                <button type="submit" title="Delete SubCategory"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This SubCategory? Action Cannot be Undone!')">
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
