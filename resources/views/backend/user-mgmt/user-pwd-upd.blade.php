@extends('backend.layouts.master')
@section('head','Change User Password')
@section('title','Change User Password')

@section('main-content')
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header mb-3">
                        <div class="my-3">
                            <a href="{{ route('user-pwd',$data->id) }}" class="btn btn-success float-end">User Setting</a>
                        </div>
                    </div>

                    <div class="card-body ">
                        <form action="{{ route('user-pwd-change',$data->id) }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="password" class="form-label">User Password:</label>
                                <input type="password"  name="password" placeholder="Password" class="form-control" id="password">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm_Password:</label>
                                <input type="password" name="confirm_password" placeholder="confirm_Password" class="form-control" id="confirm_password">
                                @error('confirm_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <input type="submit" value="Submit" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
    </section>
@endsection
