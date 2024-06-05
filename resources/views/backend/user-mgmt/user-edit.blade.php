@extends('backend.layouts.master')
@section('head','Add User')
@section('title','Add User')

@section('main-content')
<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="my-3">
                        <a href="{{ route('admin-show') }}" class="btn btn-success float-end">All User</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="py-3">
                        <form action="{{ route('admin-upd',$data->id) }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" placeholder="Enter user Name" autofocus>
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ $data->email }}" placeholder="Enter email address" autofocus>
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" value="{{ $data->password }}" id="password" name="password" placeholder="Enter password" autofocus>
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password:</label>
                                <input type="password" class="form-control" value="{{ old('confirm_password') }}" id="confirm_password" name="confirm_password" placeholder="Enter confirm_password" autofocus>
                                @error('confirm_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div> --}}

                            <div class="row">
                                <h4 for="User Roles" class="form-label">User Roles:</h4>

                                <div class="col-md-6">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" name="admin" @if($data->admin == 1) checked @endif value="1" id="admin">
                                        <label class="form-check-label" for="admin">
                                          Admin
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" @if($data->aqua == 1) checked @endif name="aqua" value="1" id="Aqua">
                                        <label class="form-check-label" for="Aqua">
                                          Aqua
                                        </label>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" @if($data->frhphm == 1) checked @endif name="frhphm" value="1" id="frhphm">
                                        <label class="form-check-label" for="FRHPH">
                                          Frhphm
                                        </label>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" @if($data->fnbp == 1) checked @endif name="fnbp" value="1" id="fnbp">
                                        <label class="form-check-label" for="fnbp">
                                          fnbp
                                        </label>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" @if($data->fgb == 1) checked @endif name="fgb" value="1" id="fgb">
                                        <label class="form-check-label" for="fgb">
                                          fgb
                                        </label>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" @if($data->aehm == 1) checked @endif name="aehm" value="1" id="aehm">
                                        <label class="form-check-label" for="aehm">
                                          aehm
                                        </label>
                                    </div>

                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="checkbox" @if($data->academic == 1) checked @endif name="academic" value="1" id="academic">
                                        <label class="form-check-label" for="academic">
                                          academic
                                        </label>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($data->fees == 1) checked @endif name="fees" value="1" id="fees">
                                        <label class="form-check-label" for="fees">
                                            fees
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($data->kolkata == 1) checked @endif name="kolkata" value="1" id="kolkata">
                                        <label class="form-check-label" for="kolkata">
                                          kolkata
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($data->kakinada == 1) checked @endif name="kakinada" value="1" id="kakinada">
                                        <label class="form-check-label" for="kakinada">
                                          kakinada
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($data->rohtak == 1) checked @endif name="rohtak" value="1" id="rohatak">
                                        <label class="form-check-label" for="rohatak">
                                          rohatak
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($data->powerkheda == 1) checked @endif value="1" name="powerkheda" id="powerkheda">
                                        <label class="form-check-label" for="powerkheda">
                                          powerkheda
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($data->motipur == 1) checked @endif value="1" name="motipur" id="motipur">
                                        <label class="form-check-label" for="motipur">
                                          motipur
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" @if($data->special == 1) checked @endif value="1" name="special" id="special">
                                        <label class="form-check-label" for="special">
                                          special
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="" disabled readonly>Select Option</option>
                                    <option value="hide" @if($data->status == 'hide') selected @endif>Hide</option>
                                    <option value="active" @if($data->status == 'active') selected @endif>Active</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="division">Division</label>
                                <select name="division_id" class="form-select" id="division">
                                    <option value="" disabled readonly selected>Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}" @if($division->id == $data->division_id) selected @endif>{{ $division->division_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('division_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

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
