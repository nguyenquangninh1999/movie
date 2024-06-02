@extends('client.app')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('client.index') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>{{ $movie->title }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__video__player">
                        <video id="player" playsinline controls data-poster="./videos/anime-watch.jpg">
                            <source src="https://www.googleapis.com/drive/v3/files/{{ $movie->url_video }}?key={{env('KEY_DRIVER')}}&alt=media" type="video/mp4">
                        </video>
                    </div>
                    <div class="title-detail-movie">
                        {{ $movie->title }}
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Mô tả</h5>
                        </div>
                        <div class="content-detail-movie">
                            {!! $movie->content !!}
                        </div>
                    </div>
                    <div class="">
                        @include('client.list-category')
                    </div>
                    <div class="">
                        <div class="section-title">
                            <h5>Phim liên quan</h5>
                        </div>
                        <div class="trending__product">
                            <div class="row">
                                @foreach($movies as $movie)
                                    <div class="col-lg-3 col-md-6 col-sm-6">
                                        <div onclick="redirectShow('{{ $movie->id }}')" id="productItem-{{$movie->id}}" class="product__item">
                                            <div class="product__item__pic set-bg" data-setbg="{{ \Illuminate\Support\Facades\Storage::url($movie->image) }}">
                                                <div class="view"><i class="fa fa-eye"></i> {{ $movie->number_view }}</div>
                                            </div>
                                            <div class="product__item__text">
                                                <h5><a href="{{ route('client.show', $movie->id) }}">{{ $movie->title }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <style>
                                        .product__item {
                                            cursor: pointer;
                                        }
                                    </style>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
