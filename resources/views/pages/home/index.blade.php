@extends('layouts.layout')
@section('content')

{{-- Feature articles --}}
<x-public.feature-articles />

{{-- Category articles --}}
<div class="container-fluid pt-3">
    @foreach ($categories as $categoryId => $articles)
        <x-public.slide key="{{ $categoryId }}" :items="$articles"/>
    @endforeach
</div>
@endsection