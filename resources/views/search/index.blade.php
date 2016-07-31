@extends('layouts.app')

@section('content')
            @section('panelHeading')
                <div><strong>{{count($results)}}</strong> Search results</div>
            @endsection
                <div class="panel-body">
                @if(count($results) > 0)                        
                    @foreach($results as $results)
                        <div class="panel panel-default col-md-4" style="padding-right: 0px; padding-left: 0px; !important">
                            <div class="panel-heading col-md-12 btn-group" role="group">
                                <a href="{{ url('product', $results->id) }}" class="btn btn-secondary">{{$results->Title}}</a>
                            </div>
                            <div class="panel-body">
                                <div class="form-group col-md-12 text-center">      
                                        <img src="/uploads/productPhoto/{{ $results->Photo1 }}" style="width:50px; height:50px; border-radius:50%" class="center-block"><br>
                                            Price: {{$results->Price}} <br>
                                            Max Capacity: {{$results->Capacity}}<br>
                                    <i>{{$results->DateCreated}}</i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    No result!
                @endif 
                </div>
@endsection
