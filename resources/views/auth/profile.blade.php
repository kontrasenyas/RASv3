@extends('layouts.app')

@section('content')
    <div class="row">
        @section('panelHeading')
            Profile Information
        @endsection
        <div class="col-md-10 col-md-offset-1 panel-heading">
            <img src="/uploads/avatars/{{ $user->Photo }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="Photo">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>             
        </div>        
    </div>
    <div class="panel-body">
         <div class="panel panel-default">
            <div class="panel-heading">Basic Information</div>  
                    <div class="col-md-12">                        
                        <div class="text-center control-label">
                            <i>Email Address: </i> {{$user->email}}
                        </div>
                        <div class="text-center">
                            <i>Location: </i> {{$user->StreetNo}}, {{$user->Municipality}}, {{$user->Province}}
                        </div>
                        <div class="text-center">                
                            <i>Member Type: </i> {{$user->MemberType}}
                        </div>
                        <div class="text-center">                
                            <i>Contact No: </i> {{$user->MobileNo}}
                        </div>
                        <div class="text-center">                
                            <i>Reputation: </i>
                        </div>      
                        <div class="text-center">                
                            <i>Profile Views: </i>100
                        </div>
                        <div class="text-center">                
                            <i>Date Joined: </i>100 {{$user->created_at}}
                        </div>          
                    </div>
                    <div class="text-center">
                            <a href="{{route('profile.edit', $user->id)}}" class="btn">Edit your Profile</a>
                    </div>
        </div>
    </div>
@endsection
