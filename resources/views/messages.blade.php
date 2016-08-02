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
                        <div class="panel panel-default col-md-12" style="padding-right: 0px; padding-left: 0px; !important">
                            <div class="panel-heading col-md-12 btn-group" role="group">
                                <a href="{{ url('product', $messages->ProductID) }}" class="btn btn-secondary">Someone booked your post: <b>{{$messages->Title}}</b></a>
                                <a href="{{route('messages.update', $messages->ProductID)}}" class="btn">View</a>
                            </div>
                        
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
