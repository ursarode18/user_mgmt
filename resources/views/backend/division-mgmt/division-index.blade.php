@extends('backend.layouts.master')
@section('head','All Division')
@section('title','All Division')

@section('main-content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('division-create') }}" class="btn btn-primary float-end">Add Division</a>
                </div>
                <div class="card-body">
                    <div class="py-3">
                        <div class="table-responsive">
                            <table  id="all-division" class="table table-bordered table-striped table-hover" id="table-1">
                                <thead>
                                    <tr class="bg-success text-white">
                                        <th>SL</th>
                                        <th>Division Name</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->division_name }}</td>
                                            <td><span class="badge text-bg-primary">
                                                @if ($data->status == 0)
                                                    Hide
                                                @else
                                                    Active
                                                @endif
                                            </span></td>
                                            <td>{{ $data->created_at }}</td>
                                            <td>
                                                <a href="{{ route('division-edit',$data->id) }}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i> </a>
                                                <a href="{{ route('division-del',$data->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
    </div>
</section>
@endsection

@push('script')
<script>

        $(document).ready( function () {
            $('#all-division').DataTable();
        } );

</script>
@endpush
