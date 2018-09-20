@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-lg-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                     <p class="text-center">
                                    {{ $user->name }}'s Profile.
                    </p>
                </div>
                <div class="panel-body">
                 <center>
                   <img src="{{ $user->avatar }}" alt="profile default img" style="height: 100px; width: 100px">
                   </center>
                   <br>
                   <p class="text-center">
                         {{ $user->profile->location }}
                   </p>

                   <p class="text-center">
                        @if(Auth::id() == $user->id)
                            <a href="{{route('profile.edit')}}" class="btn btn-lg btn-info">Edit Profile</a>
                        @endif
                   </p>
                </div>
            </div>

           @if(Auth::id() !== $user->id)
                 <div class="panel panel-default">
                <div class="body">
                     <friend :profile_user_id="{{ $user->id }}"></friend>
                </div>
            </div<
           @endif

             <div class="panel panel-default">
                <div class="panel-heading">
                     <p class="text-center">
                                  About me
                    </p>
                </div>
                <div class="panel-body">
                    <p class="text-center">
                        {{ $user->profile->about }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop