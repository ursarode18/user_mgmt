@extends('backend.layouts.master')
@section('head','Add Division')
@section('title','Add Division')

@section('main-content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="my-3">
                        <a href="{{ route('division-show') }}" class="btn btn-success float-end">All Division</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="py-3">
                        <form action="{{ route('division-store') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="division_name" class="form-label">Division Name</label>
                                <input type="text" class="form-control" id="division_name" name="division_name" placeholder="Enter Division Name" autofocus>
                                @error('division_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Submit" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
