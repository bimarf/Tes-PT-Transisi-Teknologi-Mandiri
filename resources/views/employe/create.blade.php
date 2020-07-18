@extends('layouts.backend')
@section('content')

<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
				    <div class="card-header card-header-border-bottom">
					<h2>Employees</h2>
                    </div>
				    <div class="card-body">
                    <form class="user" action="{{route('employe.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control form-control-user {{ $errors->has('name') ? ' is-invalid' : '' }}" id="exampleFirstName" placeholder="Name" value="{{ old('name') }}">
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
                                <label for="company">Company</label>
                                <select class="form-control {{ $errors->has('company') ? ' is-invalid' : '' }}" name="company">
                                    <option value="">-- Select Company --</option>
                                    @foreach ($companies as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('company'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:red">{{ $errors->first('company') }}</strong>
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