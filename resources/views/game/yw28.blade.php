@extends('layouts.game')

@section('game')
<betting :bettype="1" :qihao="{{$qihao}}"></betting>
<!-- 投注区域结束 -->

@endsection