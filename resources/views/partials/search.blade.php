
<div class="panel-heading">
    {!!Form::open(['route' => 'search.index', 'method' => 'GET', 'class' => '', 'role' => 'search'])!!}                        
        <div class="input-group form-group">
            {!!Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search...'])!!}
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">
                    <i class="glyphicon glyphicon-search"></i> Find a Car 
                </button>
                <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#aSearch">Advanced Search</button>
            </span>
        </div>
        <div class="">
            <div id="aSearch" class="collapse">
                <div class="form-group col-md-3">
                    Type of Car: {{ Form::select('CarType', $CarType, Request::get('CarType'),
                                                ['class' => "form-control"]) }}
                </div>
                <div class="form-group col-md-3">
                    Location: {!!Form::text('Location', Request::get('Location'), ['class' => 'form-control', 'placeholder' => 'What is your location?', 'id' => 'Location', ])!!}
                </div>
                <div class="form-group col-md-3">
                    Capacity: {!!Form::number('Capacity', Request::get('Capacity'), ['class' => 'form-control', 'placeholder' => 'How many are you?', 'min' => '0'])!!}
                </div>
                <div class="form-group col-md-3">
                    Price: {!!Form::number('Price', Request::get('Price'), ['class' => 'form-control', 'placeholder' => 'What is your budget?', 'min' => '0'])!!}
                </div>
            </div>
        </div>
    {!!Form::close()!!}
</div>