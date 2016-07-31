@extends('layouts.app')

@section('content')
<div class="row">    
    <div class="panel-body">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @section('panelHeading')
                    Post your Car
                @endsection

                <div class="panel-body">
                    {!!Form::open(['route' => 'product.store', 'files'=>"true"])!!}
                        <div class="form-group">
                            {!!Form::label('photo1', 'Upload a photo of your Car', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('Photo1') ? ' has-error' : '' }}">
                                {!!Form::file('Photo1')!!}
                                @if ($errors->has('Photo1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Photo1') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group"> 
                            {!!Form::label('title', 'Title of your Post', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('Title') ? ' has-error' : '' }}">
                                {!!Form::text('Title', null, 
                            				['class' => "form-control",
                            				'placeholder' => "Input title"])!!}
                            
                                @if ($errors->has('Title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">                            
                            {!!Form::label('CarType', 'Type of your Car', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('CarType') ? ' has-error' : '' }}">
                                {{ Form::select('CarType', $CarType, null,
                                                ['class' => "form-control"]) }}
                                    @if ($errors->has('CarType'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('CarType') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group"> 
                            {!!Form::label('capacity', 'Capacity of your Car', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('Title') ? ' has-error' : '' }}">
                                {!!Form::number('Capacity', 1,
                                                ['class' => "form-control",
                                                'min' => '1',
                                                'max' => '1000',
                                                'style' => 'width: 100px;'
                                                ])!!}
                                    @if ($errors->has('Capacity'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Capacity') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('brand', 'Brand of your Car', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('Brand') ? ' has-error' : '' }}">
                                {!!Form::text('Brand', null,
                                                ['class' => "form-control",
                                                'placeholder' => "Input brand"])!!}
                                    @if ($errors->has('Brand'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Brand') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('price', 'Price of your service', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('Price') ? ' has-error' : '' }}">
                                {!!Form::text('Price', null,
                                                ['class' => "form-control",
                                                'placeholder' => "Input Price"])!!}
                                    @if ($errors->has('Price'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Price') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="form-group">
                            {!!Form::label('details', 'Additional Details of your post', array('class' => 'control-label'))!!}
                            {!!Form::textarea('Details', null,
                                            ['class' => "form-control",
                                            'placeholder' => "Input some details"])!!}
                        </div>                   
                        {!!Form::submit('Create',
                        ['class' => "btn btn-primary"])!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection