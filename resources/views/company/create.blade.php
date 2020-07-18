@extends('layouts.backend')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
				    <div class="card-header card-header-border-bottom">
					<h2>Companies</h2>
                    </div>
				    <div class="card-body">
                    <form class="user" action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control form-control-user {{ $errors->has('name') ? ' is-invalid' : '' }}" id="exampleFirstName" placeholder="Company Name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" id="exampleInputEmail" placeholder="Email Address" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" name="website" class="form-control form-control-user {{ $errors->has('website') ? ' is-invalid' : '' }}" id="exampleInputEmail" placeholder="Company Website" value="{{ old('website') }}">
                            @if ($errors->has('website'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('website') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="logo">logo</label>
                            <input type="file" name="logo" class="form-control form-control-user {{ $errors->has('logo') ? ' is-invalid' : '' }}" id="exampleInputEmail" placeholder="Logo" value="{{ old('logo') }}">
                            @if ($errors->has('logo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color:red">{{ $errors->first('logo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary btn-user btn-block">Save</button>
                    </form>

                    </div>
                 </div>
        </div>
    </div>
</div>

@stop