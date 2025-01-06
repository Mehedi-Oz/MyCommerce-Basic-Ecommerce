@extends('admin.master')

@section('title')
    Product Details
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Product Details</h4>
                    <div class="table-responsive m-t-40">
                        <table class="table table-striped border table-hover">
                            <tr>
                                <th>Product Id: </th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Product Name: </th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th>Product Code: </th>
                                <td>{{ $product->code }}</td>
                            </tr>
                            <tr>
                                <th>Product Model: </th>
                                <td>{{ $product->model }}</td>
                            </tr>
                            <tr>
                                <th>Product Category: </th>
                                <td>{{ $product->category->name }}</td>
                            </tr>
                            <tr>
                                <th>Product Sub Category: </th>
                                <td>{{ $product->subcategory->name }}</td>
                            </tr>
                            <tr>
                                <th>Product Brand: </th>
                                <td>{{ $product->brand->name }}</td>
                            </tr>
                            <tr>
                                <th>Product Unit: </th>
                                <td>{{ $product->unit->name }}</td>
                            </tr>
                            <tr>
                                <th>Product Stock Amount: </th>
                                <td>{{ $product->stock_amount }}</td>
                            </tr>
                            <tr>
                                <th>Product Regular Price: </th>
                                <td>{{ $product->regular_price }} Tk</td>
                            </tr>
                            <tr>
                                <th>Product Selling Price: </th>
                                <td>{{ $product->selling_price }} Tk</td>
                            </tr>
                            <tr>
                                <th>Product Short Description: </th>
                                <td>{{ $product->short_description }}</td>
                            </tr>
                            <tr>
                                <th>Product Long Description: </th>
                                <td>{!! $product->long_description !!}</td>
                            </tr>
                            <tr>
                                <th>Product Featured Image: </th>
                                <td>
                                    <img src="{{ asset($product->image) }}" style="height: 60px; width: 60px"
                                        alt="{{ $product->name }}">
                                </td>
                            </tr>
                            <tr>
                                <th>Product Other Images: </th>
                                <td>
                                    @foreach ($product->otherImages as $otherImage)
                                        <img src="{{ asset($otherImage->image) }}" style="height: 60px; width: 60px"
                                            alt="{{ $otherImage->name }}">
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Product Hit Count: </th>
                                <td>{{ $product->hit_count }}</td>
                            </tr>
                            <tr>
                                <th>Product Sales Count: </th>
                                <td>{{ $product->sales_count }}</td>
                            </tr>
                            <tr>
                                <th>Product Featured Status: </th>
                                <td>{{ $product->featured_status == 1 ? 'Featured' : 'Not Featured' }}</td>
                            </tr>
                            <tr>
                                <th>Product Publication Status: </th>
                                <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                            </tr>

                            <tr>
                                <th>Action: </th>
                                <td>
                                    <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-edit"> Edit </i>
                                    </a>

                                    @if ($product->status == 1)
                                        <a href="{{ route('product.status', ['id' => $product->id]) }}"
                                            class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-eye-slash"> Unpublish </i></a>
                                    @else
                                        <a href="{{ route('product.status', ['id' => $product->id]) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-eye"> Publish </i></a>
                                    @endif

                                    <form action="{{ route('product.delete') }}" method="post" style="display: inline;">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Delete This Product? Action Cannot be Undone!')">
                                            <i class="fa fa-trash"> Delete </i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
