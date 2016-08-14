@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel-body">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @section('panelHeading')
                    Messages
                @endsection

                <div class="panel-body">
                    @foreach($messages as $messages)
                     {!!Form::model($messages, [
                            'method'=>'patch',
                            'route'=>['messages.update', $messages->id]
                            ])!!}
                            <div class="panel panel-default col-md-12" style="padding-right: 0px; padding-left: 0px; !important">
                            @if($messages->isReadOwner == 0)
                                <div class="panel-heading col-md-12 btn-group" role="group">
                            @else
                                <div class="panel-heading col-md-12 btn-group" role="group" style="background-color: white !important;">
                            @endif
                                <a href="{{ url('product', $messages->ProductID) }}" class="btn btn-secondary">Someone booked your post: <b>{{$messages->Title}}</b></a>    
                            <div>
                                {!!Form::submit('View', array('class' => 'btn btn-primary '))!!}
                            </div>           
                            </div>
                            <input id="product_code" name="product_code" type="hidden" value="{{$messages->id}}">
                            <input id="product_id" name="product_id" type="hidden" value="{{$messages->ProductID}}">                     
                    {!!Form::close()!!}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
