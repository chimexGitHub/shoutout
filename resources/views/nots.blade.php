@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-md-offset-1">
            <div class="card">
                <div class="card-header text-center">Notifications</div>

                <div class="card-body">
                   
                    <ul class="list-group">

                        @foreach($nots as $not)

                            <li class="list-group-item">
                                {{$not->data['name']}} &nbsp; {{$not->data['message']}} <span class="pull-right">{{$not->created_at->diffforHumans}}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
