@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel-body">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @section('panelHeading')
                    Edit Profile
                @endsection
                <div class="panel-body">
                    {!!Form::model($product, [
                        'method'=>'patch',
                        'route'=>['product.update', $product->id], 'files'=>"true"
                        ])!!}

                        <div class="form-group">
                            {!!Form::label('photo1', 'Update a photo of your Car', array('class' => 'control-label'))!!}                            
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
                            {!!Form::label('capacity', 'Capacity of your Car', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('Title') ? ' has-error' : '' }}">
                                {!!Form::number('Capacity', null,
                                                ['class' => "form-control",
                                                'min' => '0',
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
                            {!!Form::textarea('Details', $product->Details,
                                            ['class' => "form-control",
                                            'placeholder' => "Add some details of your post."])!!}
                        </div>

                        {!!Form::submit('Save', array('class' => 'btn btn-primary'))!!}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection