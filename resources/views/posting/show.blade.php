@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">

                        {{$posting->title}}
                        {{$posting->description}}
                        <img src="{{$posting->image}}" width="100px" height ="50px">
                        <p>Tk. {{$posting->price}}</p>
                        <form method="POST" action="book">
                            {{csrf_field()}}
                            <input type="hidden" name="title" value="{{$posting->title}}">
                            Date:
                            <input type="date" name="date"><br>
                            Name:
                            <input type="text" name="name"><br>
                            Contact Number:
                            <input type="text" name="contact_number">
                            <button type="submit">Booking</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
