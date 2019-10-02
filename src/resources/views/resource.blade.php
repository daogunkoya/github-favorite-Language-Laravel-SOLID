@extends('layout')
@section('content')

<div class="container">
    <div class = "header">
        <h1>Get User Favorite Language</h1><hr>
    </div>
    <div class="form-control">
        <h3>Enter User's Name</h3>
        <form class="form-horizontal" method = "post" action="{{route('resource.search')}}">
                 @csrf
            <input class="form-group" type = "text"  name ="user">
            <input class="form-group" type = "submit" name = "submit" value="submit">
        </form>
    </div>
  
    <div class="form-group">
         @if(isset($languages))
         <h3 style="text-align:center">Languages Used</h3>
        <table class="table table-stripped table-bordered">
        <thead>
            <tr class="row">
                <th>No</th>
                <th>Language</th>
                <th>Appearance</th>
            </tr>
        </thead>
        <tbody>

        @foreach($languages as $language=>$appearance)
           <tr class="row">
            <td>{{$row +=1}}</td>
            <td>{{$language===""?'No-type':$language}}</td>
            <td>{{$appearance}}</td>
            <td></td>
           </tr>
        @endforeach

        </tbody>
        </table>
        @endif
        <p>
        @if(isset($favorites))
            <strong style = "margin-left:60px;;">favorite Language =
                @foreach($favorites as $favorite)
             {{$favorite??'unavailable'}} </strong>
             @endforeach
        @endif
        <p>
    </div>
</div>
@endsection