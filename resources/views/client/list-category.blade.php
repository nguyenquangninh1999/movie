<div class="row">
    <div class="col-lg-12">
        <div class="anime__details__episodes">
            <div class="section-title">
                <h5>Thể loại</h5>
            </div>
            @foreach($categories as $value)
                <a href="{{ route('client.index', ['category' => $value->id]) }}" @if(isset($category) && $category == $value->id) style="color: #000000;background: #ffffff;" @endif>{{ $value->name }}</a>
            @endforeach
        </div>
    </div>
</div>
