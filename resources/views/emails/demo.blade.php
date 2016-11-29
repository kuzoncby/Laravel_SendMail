@extends('layouts.app')

@section('title', '测试')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <a href="https://www.sinaobd.com/">
                <img class="logo img-responsive" src="{{$mail['logo']['href']}}"
                     alt="{{$mail['logo']['alt']}}"></a>

            <h1>邮件</h1>

            <p>陈博洋的测试邮件</p>
            <hr/>
            <p>{{$mail['name']}}：</p>
            <br/>
            <p>{{$mail['content']}}</p>

            <p class="text-center">Copyright</p>
        </div>
    </div>
@endsection