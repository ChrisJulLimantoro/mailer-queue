@extends('emails.template')

@section('content')
    <p>{{ $data['message'] }}</p>
@endsection