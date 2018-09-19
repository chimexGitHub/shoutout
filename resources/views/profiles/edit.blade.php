@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Your Profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}

                     <div class="form-group">
                        <label for="avatar">Upload avatar</label>
                        <input type="file" name="avatar" class="form-control" accept="image/*">
                    </div>

                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" value="{{$info->location}}" class="form-control" required >
                    </div>

                     <div class="form-group">
                        <label for="about">About me</label>
                        <textarea name="about" row="30" cols="10" class="form-control" required >{{$info->about}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <p class="text-center">
                            <button class="btn btn-primary btn-lg" type="submit">
                            Save profile
                        </p>
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
