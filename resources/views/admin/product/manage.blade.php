@extends('admin.master')

@section('title')
    Manage Product
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
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Stock Amount</th>
                                    <th>Featured Image</th>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->stock_amount }}x</td>
                                        <td><img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                                                style="height: 60px; width: 60px">
                                        </td>
                                        <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td class="d-flex gap-2 ">
                                            <a href="{{ route('product.details', ['id' => $product->id]) }}"
                                                title="Product Details" class="btn btn-info btn-sm">
                                                <i class="fa fa-magnifying-glass"></i>
                                            </a>

                                            <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                                title="Edit Product" class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if ($product->status == 1)
                                                <a href="{{ route('product.status', ['id' => $product->id]) }}"
                                                    title="Unpublish Product" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('product.status', ['id' => $product->id]) }}"
                                                    title="Publish Product" class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif


                                            <form action="{{ route('product.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" title="Delete Product"
                                                    class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Product? Action Cannot be Undone!')">
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
