@extends('backend.layouts.master')
@section('head','Edit Division')
@section('title','Edit Division')

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
                        <form action="{{ route('division-upd',$data->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="division_name" class="form-label">Division Name</label>
                                <input type="text" class="form-control" id="division_name" name="division_name" placeholder="Enter Division Name" value="{{ $data->division_name }}" autofocus>
                                @error('division_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="" disabled readonly>Select Option</option>
                                    <option value="0" @if($data->status == 0) selected @endif>Hide</option>
                                    <option value="1" @if($data->status == 1) selected @endif>Show</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="div_email" class="form-label">Division Email</label>
                                <input type="email" class="form-control" id="div_email" value="{{ $data->div_email }}" name="div_email" placeholder="Enter Division Email" autofocus>
                                @error('div_email')
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
