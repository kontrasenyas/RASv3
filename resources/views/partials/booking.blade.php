<div>
    <button class="btn btn-primary" href="" data-toggle="modal" data-target="#BookCar">Book this Car!</button>
</div>
<div id="BookCar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Book this Car</h4>
                </div>
                <div class="modal-body">
                    {!!Form::open(['route' => 'booking.store'])!!}
                        <div class="form-group">       
                            {!!Form::label('ContactName', 'Contact Name', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('ContactName') ? ' has-error' : '' }}">
                                {!!Form::text('ContactName', null, ['class' => "form-control", 'placeholder' => "Input your Full Name"])!!}
                                @if ($errors->has('ContactName'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ContactName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group"> 
                            {!!Form::label('ContactNo', 'Contact Number', array('class' => 'control-label'))!!}
                            <div class="{{ $errors->has('ContactNo') ? ' has-error' : '' }}">
                                {!!Form::text('ContactNo', null, ['class' => "form-control", 'placeholder' => "Input your Contact Number"])!!}
                                @if ($errors->has('ContactNo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ContactNo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="{{$product->id}}" />
                        <input type="hidden" name="user_email" value="{{$user->email}}" />
                        <input type="hidden" name="product_email" value="{{$product->EmailAddress}}" />
                </div>
                <div class="modal-footer">
                    {!!Form::submit('Send', ['class' => "btn btn-primary"])!!}
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                    {!!Form::close()!!} 
        </div>
     </div>
</div>