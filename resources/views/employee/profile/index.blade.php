@extends('employee.layout.template')
@section('content')


<div class="panel panel-default">
    <div class="panel-heading">Profile</div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="post" action="{{ route('employee.profile.update', $profile['id']) }}">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">First Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="first_name" value="{{ $profile['first_name']?? old('first_name') }}" autofocus>

                    @if ($errors->has('first_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="middle_name" class="col-md-4 control-label">Middle Name</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="middle_name" value="{{ $profile['first_name']??  old('first_name') }}" autofocus>

                    @if ($errors->has('middle_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('middle_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="last_name" value="{{  $profile['last_name']?? old('last_name') }}" autofocus>

                    @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $profile['email']?? old('email') }}">

                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('primary_phone') ? ' has-error' : '' }}">
                <label for="primary_phone" class="col-md-4 control-label">Primary Phone</label>
                <div class="col-md-6">
                    <input id="primary_phone" type="text" class="form-control" name="primary_phone" value="{{ $profile['primary_phone']?? old('primary_phone') }}">
                    @if ($errors->has('primary_phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('primary_phone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('secondary_phone') ? ' has-error' : '' }}">
                <label for="secondary_phone" class="col-md-4 control-label">Secondary Phone</label>
                <div class="col-md-6">
                    <input id="secondary_phone" type="text" class="form-control" name="secondary_phone" value="{{  $profile['secondary_phone']??  old('secondary_phone') }}">
                    @if ($errors->has('secondary_phone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('secondary_phone') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Update
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection