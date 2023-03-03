@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('authors') }}">>Authors</a>
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
            <div class="container-fluid">
                <div class="row heading">
                    <div class="col-lg-9 ps-0">
                        <div class="card card-heading">
                            <h1>Authors List</h1>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex justify-content-end align-items-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Author</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{ route('authors.store') }}"  enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="surname" class="col-md-4 col-form-label text-md-end">Surname</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" required autocomplete="surname">

                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary custom-login-btn">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <!-- <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div> -->
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>

            @foreach ($authors as $author)

                <div class="card list-card">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-10 d-flex align-items-center">
                                <img src="/storage/images/{{ $author->image }}" alt="" style="width: 50px">
                                <p>{{ $author->name . ' ' . $author->surname }}</p>
                            </div>
                            <div class="col-lg-2 d-flex align-items-center justify-content-end">
                                                        <!-- Modal -->
                        <div class="modal fade" id="updateAuthor{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Author</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{ route('authors.update', $author->id) }}"  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{ $author->id }}">
                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                                    <div class="col-md-6">
                                        <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $author->name }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="surname" class="col-md-4 col-form-label text-md-end">Surname</label>

                                    <div class="col-md-6">
                                        <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" required autocomplete="surname" value="{{ $author->surname }}">

                                        @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image" class="col-md-4 col-form-label text-md-right">Image</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">

                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary custom-login-btn">
                                            Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>

                            </div>
                        </div>
                        </div>
                                <button type="button" class="btn btn-warning me-2" data-bs-toggle="modal" data-bs-target="#updateAuthor{{ $author->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>


                                                                                  <!-- Modal -->
                        <div class="modal fade" id="deleteAuthor{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete this author?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form method="POST" action="{{ route('authors.update', $author->id) }}"  enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')


                                <div class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary custom-login-btn">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </form>
                            </div>

                            </div>
                        </div>
                        </div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAuthor{{ $author->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>
</div>




@endsection
