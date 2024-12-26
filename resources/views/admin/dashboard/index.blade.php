@extends('admin.layouts.body', ['title' => 'Admin Dashboard', 'page' => 'admin_dashboard'])
@section('content')

    <h3 style="text-align:center">Vaxx Admin Dashboard</h3>
    <hr>
    <div style="padding:6%;font-size:1.5rem;">
        <a href="{{ route('admin.centers.index') }}">Centers</a> <br>
    </div>

@endsection