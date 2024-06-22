@extends('client.app')

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>Chat Sex</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            @foreach($chats as $chat)
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div onclick="redirectShow('{{ $chat->id }}')" id="productItem-{{$chat->id}}" class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="">
                                            <img style="object-fit: cover; height: 100%;width: 100%;border-radius: 10px" src="{{ \Illuminate\Support\Facades\Storage::url($chat->image) }}">
                                        </div>
                                        <div class="product__item__text">
                                            <h5><a href="{{ route('client.chat-detail', $chat->id) }}">{{ $chat->title }}</a></h5>
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
                        {!! $chats->links('vendor.pagination.bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function redirectShow(id) {
            window.location.href = `{{ route('client.chat-detail', ':id') }}`.replace(':id', id);
        }
    </script>
    <!-- Product Section End -->

@endsection
