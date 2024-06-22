@extends('client.app')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('client.chat') }}"><i class="fa fa-home"></i> Chat</a>
                        <span>{{ $chat->title }}</span>
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
                            <source src="https://www.googleapis.com/drive/v3/files/{{ $chat->video }}?key={{env('KEY_DRIVER')}}&alt=media" type="video/mp4">
                        </video>
                    </div>
                    <div class="title-detail-movie">
                        {{ $chat->title }}
                    </div>
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Thông tin cơ bản</h5>
                        </div>
                        <div class="">
                            <table class="table table-striped table-dark">
                                <tbody>
                                <tr>
                                    <th scope="row">Giá</th>
                                    <td>{{ $chat->price }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Mô tả</th>
                                    <td>{!! nl2br($chat->content) !!}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Thể loại</th>
                                    <td>{{ $chat->category }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Thanh toán</th>
                                    <td>{{ $chat->pay }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Zalo</th>
                                    <td>{{ $chat->zalo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Telegram</th>
                                    <td>{{ $chat->telegram }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Năm sinh</th>
                                    <td>{{ $chat->birthday }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Chiều cao</th>
                                    <td>{{ $chat->height }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Cân nặng</th>
                                    <td>{{ $chat->weight }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Làm việc</th>
                                    <td>{{ $chat->work }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

@endsection
