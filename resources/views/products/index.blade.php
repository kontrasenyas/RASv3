@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel-body">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @section('panelHeading')
                    Your Active Post
                @endsection
                <div class="panel-body center-block text-center">
                    <a href="{{ url('product/create') }}">Post your Car</a>
                </div>
               
                    @foreach($product as $product)
                        {{-- <div class="form-group col-md-12">
                            <a href="{{ url('product', $product->id) }}">                   
                                <img src="/uploads/productPhoto/{{ $product->Photo1 }}" style="width:50px; height:50px; border-radius:50%">
                                    {{$product->Title}} - {{$product->Capacity}}
                            </a><br/>
                            <i>{{$product->DateCreated}}</i>
                        </div> --}}

                        <div class="panel panel-default col-md-4" style="padding-right: 0px; padding-left: 0px; !important">
                        <div class="panel-heading col-md-12 btn-group" role="group">
                            <a href="{{ url('product', $product->id) }}" class="btn btn-secondary">{{$product->Title}}</a>
                        </div>
                        <div class="panel-body">
                            <div class="form-group col-md-12 text-center">      
                                    <img src="/uploads/productPhoto/{{ $product->Photo1 }}" style="width:50px; height:50px; border-radius:50%" class="center-block"><br>
                                        Price: {{$product->Price}} <br>
                                        Max Capacity: {{$product->Capacity}}<br>
                                <i>{{$product->DateCreated}}</i>
                            </div>
                        </div>
                        </div>
                    @endforeach
                
            </div>
        </div>
    </div>
</div>
@endsection