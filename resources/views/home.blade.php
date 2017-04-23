@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div>
                @if(Auth::user()->profile_pic != '')
                    <img src="{{Auth::user()->profile_pic}}" width="200px" height="200px">
                @endif
                <form method="POST" action="upload" enctype='multipart/form-data'>
                    {{csrf_field()}}
                    <input type="file" name="image">
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if(Auth::user()->is_admin)
                        <a href="posting/create">Add Posting</a>
                    @endif
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
