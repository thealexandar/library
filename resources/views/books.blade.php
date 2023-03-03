@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors') }}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">Users</a>
                </li>
            </ul>
        </div>
        <div class="col-lg-10 main">
            <h1>Books</h1>
        </div>
    </div>
</div>




@endsection
