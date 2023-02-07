@extends('user.subindex')

@section('content')

<div class="container">
    <div class="about-heading">
        <h2>{{ $aboutpage->page_title }}</h2>
    </div>
    <div class="about-history-1">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="about-content-1">
                    <p>
                        {!!  $aboutpage->page_desc !!}
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <img src="{{ asset($aboutpage->page_img) }}" style="width: 100%;height: 300">
            </div>
        </div>
    </div>
</div>
@stop
