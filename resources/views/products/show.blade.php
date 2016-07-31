@extends('layouts.app')

@section('content')
<div class="row">
    <div class="panel-body">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @section('panelHeading')
                    Product
                @endsection

                <div class="panel-body">
                    <div class="col-md-12">
                    {{-- @if($product->EmailAddress != $user->email) --}}
                        @include('partials.booking')
                    {{-- @endif --}}
                        <div>
                            <img src="/uploads/productPhoto/{{ $product->Photo1 }}" style="width:150px; height:150px;" class="center-block">
                        </div>
                        <div class="text-center control-label">
                            <i>Title of your post: </i>{{$product->Title}}
                        </div>
                        <div class="text-center">
                            <i>Location: </i>{{$product->Province}}
                        </div>
                        <div class="text-center">
                            <i>Capacity: </i>{{$product->Capacity}}
                        </div>
                        <div class="text-center">                
                            <i>Car Type: </i>{{$product->ProductType}}
                        </div>
                        <div class="text-center">                
                            <i>Brand: </i>{{$product->Brand}}
                        </div>
                        <div class="text-center">                
                            <i>Price of your Service: </i>Php {{$product->Price}}
                        </div>
                        <div class="text-center">                
                            <i>Additional Details: </i>{{$product->Details}}
                        </div>      
                        <div class="text-center">                
                            <i>Views: </i>100
                        </div>              
                    </div>
                    @if (Auth::user())
                        <div class="panel-body">
                            <div class="text-center">
                                <a href="{{route('product.edit', $product->id)}}" class="btn">Edit your Post</a>
                            </div>
                            <div class="text-center">
                                {!!Form::open([
                                    'method'=>'delete',
                                    'route'=>['product.destroy', $product->id]
                                    ])!!}                
                                    {!!Form::submit('Delete')!!}
                                {!!Form::close()!!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection