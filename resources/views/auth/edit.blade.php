@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="panel-body">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    @section('panelHeading')
                        {{$user->name}} - Edit Profile
                    @endsection
                                
                    <div class="panel-body">
                        {!!Form::model($user, [
                            'method'=>'patch',
                            'route'=>['profile.update', $user->id]
                            ])!!}
                            <div class="form-group">
                                {!!Form::label('email', 'Email Address', array('class' => 'control-label'))!!}
                                 <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                                    {!!Form::text('email', null, 
                                                ['class' => "form-control",
                                                'placeholder' => "Input Email Address"])!!}
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {!!Form::label('StreetNo', 'Street No', array('class' => 'control-label'))!!}
                                 <div class="{{ $errors->has('StreetNo') ? ' has-error' : '' }}">
                                    {!!Form::text('StreetNo', null, 
                                                ['class' => "form-control",
                                                'placeholder' => "Input Street No/House No"])!!}
                                    @if ($errors->has('StreetNo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('StreetNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {!!Form::label('Municipality', 'Municipality', array('class' => 'control-label'))!!}
                                 <div class="{{ $errors->has('Municipality') ? ' has-error' : '' }}">
                                    {!!Form::text('Municipality', null, 
                                                ['class' => "form-control",
                                                'placeholder' => "Input Municipality"])!!}
                                    @if ($errors->has('Municipality'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Municipality') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                {!!Form::label('Province', 'Province', array('class' => 'control-label'))!!}
                                 <div class="{{ $errors->has('Province') ? ' has-error' : '' }}">
                                    {!!Form::text('Province', null, 
                                                ['class' => "form-control",
                                                'placeholder' => "Input Province"])!!}
                                    @if ($errors->has('Province'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Province') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            {!!Form::submit('Save', array('class' => 'btn btn-primary'))!!}
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
