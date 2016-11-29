@extends('layouts.app')

@section('title', '测试')

@section('content')
    <div class="container">
        <div class="jumbotron">
            {{--<a href="https://www.sinaobd.com/">--}}
            {{--<img class="logo img-responsive" src="{{$mail['logo']['href']}}"--}}
            {{--alt="{{$mail['logo']['alt']}}"></a>--}}
            <h1>{{$mail['name']}}：</h1>
            <hr/>
            <p>你们好</p>
            <br/>
            <p>{{$mail['content']}}</p>
            </br>
            <p>陈博洋</p>
            <p class="text-center">{{$mail['copyright']}}</p>
        </div>
    </div>
@endsection
