@extends('backend.layouts.master')
@section('head','All User')
@section('title','All User')

@section('main-content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin-create') }}" class="btn btn-primary float-end">Add User</a>
                </div>
                <div class="card-body">
                    <div class="py-3">
                        <div class="table-responsive">
                            <table  id="all-users" class="table table-bordered table-striped table-hover" id="table-1">
                                <thead>
                                    <tr class="bg-success text-white">
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>email</th>
                                        <th>Division</th>
                                        <th>Status</th>
                                        <th>Role</th>
                                        <th>Created At</th>
                                        {{-- <th>Admin</th>
                                        <th>Aqua</th>
                                        <th>Frhphm</th>
                                        <th>Fnbp</th>
                                        <th>Fgb</th>
                                        <th>Aehm</th>
                                        <th>Fees</th>
                                        <th>Kolkata</th>
                                        <th>Kakinada</th>
                                        <th>Rohatak</th>
                                        <th>Powerkheda</th>
                                        <th>Motipur</th>
                                        <th>Special</th> --}}

                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data )
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                            <td>
                                                {{ $data->division_name }}
                                            </td>
                                            <td>
                                                <span class="badge text-bg-primary">
                                                @if ($data->status == "hide")
                                                    Hide
                                                @else
                                                    Show
                                                @endif
                                                </span>
                                            </td>
                                            <td>
                                                @if($data->admin == 1)
                                                    <span class="badge bg-success">Admin</span>
                                                @endif
                                                @if($data->aqua == 1)
                                                    <span class="badge bg-danger">Aqua</span>
                                                @endif
                                                @if($data->frhphm == 1)
                                                    <span class="badge bg-warning">FRHPHM</span>
                                                @endif
                                                @if($data->fnbp == 1)
                                                    <span class="badge bg-info">fnbp</span>
                                                @endif
                                                @if($data->fgb == 1)
                                                    <span class="badge bg-danger">fgb</span>
                                                @endif
                                                @if($data->fees == 1)
                                                    <span class="badge bg-warning">Fees</span>
                                                @endif
                                                @if($data->aehm == 1)
                                                    <span class="badge bg-success">Aehm</span>
                                                @endif
                                                @if($data->academic == 1)
                                                    <span class="badge bg-info">Academic</span>
                                                @endif
                                                @if($data->kolkata == 1)
                                                    <span class="badge bg-success">Kolkata</span>
                                                @endif
                                                @if($data->kakinada == 1)
                                                    <span class="badge bg-danger">Kakinada</span>
                                                @endif
                                                @if($data->rohtak == 1)
                                                    <span class="badge bg-warning">Rohtak</span>
                                                @endif

                                                @if($data->powerkheda == 1)
                                                    <span class="badge bg-info">Powerkheda</span>
                                                @endif

                                                @if($data->motipur == 1)
                                                    <span class="badge bg-success">Motipur</span>
                                                @endif

                                                @if($data->special == 1)
                                                    <span class="badge bg-danger">Special</span>
                                                @endif
                                            </td>
                                            <td>{{ $data->created_at }}</td>

                                            {{-- <td>{{ $data->admin }}</td>
                                            <td>{{ $data->aqua }}</td>
                                            <td>{{ $data->frhphm }}</td>
                                            <td>{{ $data->fnbp }}</td>
                                            <td>{{ $data->fgb }}</td>
                                            <td>{{ $data->aehm }}</td>
                                            <td>{{ $data->fees }}</td>
                                            <td>{{ $data->kolkata }}</td>
                                            <td>{{ $data->kakinada }}</td>
                                            <td>{{ $data->rohatak }}</td>
                                            <td>{{ $data->powerkheda }}</td>
                                            <td>{{ $data->motipur }}</td>
                                            <td>{{ $data->special }}</td> --}}
                                            <td>
                                                <a href="{{ route('admin-edit',$data->id) }}" class="btn btn-warning btn-sm"> <i class="bi bi-pencil-square"></i> </a>
                                                <a href="{{ route('admin-del',$data->id) }}" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
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
            $('#all-users').DataTable();
        } );

    </script>
@endpush
