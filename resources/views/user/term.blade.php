@extends('user.subindex')
@section('content')
    <div class="container a-con">
        <div class="pizzaro-about-features">
            <div class="feature-head">
                <h2 class="section-title">{{ $termofuse->page_title }}</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="terms-head">
            {!! $termofuse->page_desc !!}
        </div>
    </div>
@stop
