@extends('layout.app')

@section('content')
    <form method="POST" action="{{ route('test.upload') }}" enctype="multipart/form-data">
        @csrf
        <input type="file" accept="image/*" name="image" />
        <button type="submit">Submit</button>
    </form>
@endsection
