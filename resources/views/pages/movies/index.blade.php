@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tables'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-6 d-flex align-items-center">
                                <h6 class="mb-0">Movies</h6>
                            </div>
                            <div class="col-6 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('movies.create') }}"><i
                                        class="fas fa-plus"></i>&nbsp;&nbsp;Add Movies</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Image</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Title</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Categories</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Number view</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($movies as $movie)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $movie->id }}</p>
                                        </td>
                                        <td>
                                            <img src="{{ \Illuminate\Support\Facades\Storage::url($movie->image) }}" class="avatar me-3" alt="image">

                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">{{ $movie->title }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">
                                                @foreach($movie->movieCategories as $value)
                                                    {{ $value->category->name . ', ' }}
                                                @endforeach
                                            </p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{ $movie->number_view }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-end">
                                            <div class="d-flex px-3 py-1 justify-content-center align-items-center">
                                                <a class="btn btn-link text-dark mb-0" href="#"><i class="fa fa-edit"></i></a>
                                                <form method="post" action="{{ route('movies.destroy', $movie->id) }}">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                                            class="fas fa-trash-alt text-danger me-2" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth.footer')
    </div>
@endsection
