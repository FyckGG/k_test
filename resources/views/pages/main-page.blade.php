@extends('layouts.main-layout')
@section('main.content')
<a class="" href="{{route('users.create')}}">{{__('Create a new user')}}</a>
@endsection