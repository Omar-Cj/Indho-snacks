@extends('user.subindex')
@section('content')
    <div class="shop_section mb-5" style="margin-top:100px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        @foreach ($items as $it)
                            @php
                                $review = App\Review::where('item_id', $it->id)->where('status', 1)->sum('stars');
                            @endphp
                            <div class="col-md-6 col-lg-4  mb-3">
                                <div class="product_wrapper">
                                    <div class="product_img">
                                        <a href="{{ url('detailitem/' . $it->id) }}">
                                            <img src="{{ asset('public/upload/images/menu_item_icon/' . $it->menu_image) }}"
                                                class="card-img-top" alt="{{ $it->menu_name }}">
                                        </a>
                                    </div>
                                    <div class="product_content">
                                        <h1>
                                            <a href="{{ url('detailitem/' . $it->id) }}">{{ $it->menu_name }}</a>
                                            <span>
                                                <i class="fa fa-star"></i>
                                               {{ $review }}
                                            </span>
                                        </h1>
                                        <div class="shop_price">
                                            <p>
                                                <strong>{{ Session::get('usercurrency') }} {{ $it->price }}</strong>
                                                <a
                                                    href="{{ url('detailitem/' . $it->id) }}">{{ __('messages.addcart') }}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="pagination mt-5 text-center" style="margin:0 auto;">
                    {{ $items->links() }}
                </div>
            </div>
        </div>
    </div>
@stop
