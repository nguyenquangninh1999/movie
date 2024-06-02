@extends('client.app')

@section('content')
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ route('client.index') }}"><i class="fa fa-home"></i> Trang chủ</a>
                        <span>Chat</span>
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
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Chat</h5>
                        </div>
                        <div class="content-detail-movie">
                            Hiển thị chat
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
