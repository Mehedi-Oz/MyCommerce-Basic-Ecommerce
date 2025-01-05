@extends('admin.master')

@section('title')
    Manage Brand
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Brands</h4>
                    <h5 class="text-success">{{ session('message') }}</h5>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                                <tr>
                                    <td>Sl No</td>
                                    <td>Date</td>
                                    <td>Brand Name</td>
                                    <td>Brand Description</td>
                                    <td>Brand Image</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->created_at }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td style="text-align: justify; width: 500px">
                                            {{ $brand->description }}</td>
                                        <td><img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}"
                                                style="height: 60px; width: 60px">
                                        </td>
                                        <td>{{ $brand->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('brand.edit', ['id' => $brand->id]) }}"
                                                title="Edit Brand" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if ($brand->status == 1)
                                                <a href="{{ route('brand.status', ['id' => $brand->id]) }}"
                                                    title="Unpublish Brand" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('brand.status', ['id' => $brand->id]) }}"
                                                    title="Publish Brand" class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif


                                            <form action="{{ route('brand.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $brand->id }}">
                                                <button type="submit" title="Delete Brand" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Brand? Action Cannot be Undone!')">
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
