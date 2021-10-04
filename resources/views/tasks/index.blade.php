@extends('layouts.app')

@section('content')
<div class="container">
    @include('tasks.partials.task-form')
    <br>
    @include('tasks.partials.task-list')
</div>
@endsection