@extends('layouts.game')

@section('game')
<!-- 走势图 -->
<gamezoushitu :game_id="{{$game_id}}"></gamezoushitu>	
@endsection