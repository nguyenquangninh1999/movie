@extends('client.app')

@section('content')

<!-- Hero Section Begin -->
<section class="hero">
    <div class="container">
        @include('client.list-category')
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
                    {!! $movies->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function redirectShow(id) {
        window.location.href = `{{ route('client.show', ':id') }}`.replace(':id', id);
    }
</script>
<!-- Product Section End -->

@endsection
