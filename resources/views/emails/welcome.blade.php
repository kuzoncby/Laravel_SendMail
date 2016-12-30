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
            <p>Python开发员</p>
            <p>有限公司</p>
            <p>中华人民共和国 上海市</p>
            <p>E-mail：homestead@example.com</p>
        </div>
    </div>
@endsection
