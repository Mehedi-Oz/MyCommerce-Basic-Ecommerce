@extends('admin.master')

@section('title')
    Manage Orders
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Orders Information</h4>

                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Order Date</th>
                                    <th>Order No</th>
                                    <th>Customer Info</th>
                                    <th>Order Total</th>
                                    <th>Order Status</th>
                                    <th>Payment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            @foreach ($orders as $order)
                                <tbody>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->customer->name . ' (' . $order->customer->mobile . ')' }}</td>
                                        <td>{{ $order->order_total }} Tk</td>
                                        <td>{{ $order->order_status }}</td>
                                        <td>{{ $order->payment_status }}</td>
                                        <td>
                                            <a href="{{ route('admin.order-detail', ['id' => $order->id]) }}"
                                                class="btn btn-info btn-sm" title="Order Details">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </a>

                                            <a href="{{ route('admin.order-edit', ['id' => $order->id]) }}"
                                                class="btn btn-primary btn-sm" title="Edit Order">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <a href="{{ route('admin.order-invoice', ['id' => $order->id]) }}"
                                                class="btn btn-success btn-sm" title="View Order Invoice">
                                                <i class="bi bi-receipt"></i>
                                            </a>

                                            <a href="{{ route('admin.print-invoice', ['id' => $order->id]) }}"
                                                target="_blank" class="btn btn-info btn-sm" title="Print Order Invoice">
                                                <i class="fa-solid fa-print"></i>
                                            </a>

                                            <form action="{{ route('admin.order-delete') }}" method="post"
                                                style="display: inline;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Product? Action Cannot be Undone!')"
                                                    title="Delete Order">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
