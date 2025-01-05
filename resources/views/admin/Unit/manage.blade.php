@extends('admin.master')

@section('title')
    Manage Unit
@endsection

@section('body')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Units</h4>
                    <h5 class="text-success">{{ session('message') }}</h5>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                                <tr>
                                    <td>Sl No</td>
                                    <td>Date</td>
                                    <td>Unit Name</td>
                                    <td>Unit Code</td>
                                    <td>Unit Description</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $unit->created_at }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->code }}</td>
                                        <td style="text-align: justify; width: 500px">
                                            {{ $unit->description }}</td>
                                        <td>{{ $unit->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                        <td>
                                            <a href="{{ route('unit.edit', ['id' => $unit->id]) }}" title="Edit Unit"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            @if ($unit->status == 1)
                                                <a href="{{ route('unit.status', ['id' => $unit->id]) }}"
                                                    title="Unpublish Unit" class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('unit.status', ['id' => $unit->id]) }}"
                                                    title="Publish Unit" class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif


                                            <form action="{{ route('unit.delete') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $unit->id }}">
                                                <button type="submit" title="Delete Unit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Delete This Unit? Action Cannot be Undone!')">
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
