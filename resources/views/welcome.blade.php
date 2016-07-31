@extends('layouts.app')

@section('content')

<div class="row">
    <div class="panel-body">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                @section('panelHeading')
                    Post your Car Now
                @endsection

                <div class="panel-body">
                    Share your Car to others! <br/>
                    <a href="{{ url('/product/create')}}"><span class="glyphicon glyphicon-plus"></span> Post your Car</a>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
