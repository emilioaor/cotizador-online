@extends('layouts.app')

@section('content')
    <register-budget
        user = "{{ Auth::user() }}"
        next = "{{ \App\Budget::nextPublicId() }}"
    ></register-budget>
@endsection