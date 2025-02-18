@extends('layouts.no_layout')
@push('css')
<style>
    body{
        padding:0 !important;
        margin:0 !important;
    }
</style>
@endpush
@section('content')
<div class="d-flex justify-content-center">
    <h1 class="widget20">404</h1>
</div>
<div class="text-center mt-5">
    <h2>Anda tidak memiliki izin untuk mengakses halaman ini</h2>
    <h5>{{ $message ?? 'silakan meminta akses pada administrator sistem anda'}}</h5>
</div>
@endsection
