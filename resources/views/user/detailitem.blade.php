@extends('user.subindex') @section('content')
    @php
        function readMoreHelper1($story_desc, $chars = 75)
        {
            $story_desc = substr($story_desc, 0, $chars);
            $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
            $story_desc = $story_desc . '...';
            return $story_desc;
        }
        function headreadMoreHelper1($story_desc, $chars = 75)
        {
            $story_desc = substr($story_desc, 0, $chars);
            $story_desc = substr($story_desc, 0, strrpos($story_desc, ' '));
            $story_desc = $story_desc;
            return $story_desc;
        }
    @endphp
    <div class="container detail-section-2" style="margin-top:120px;">
        <div class="row">
            @if (Session::has('message'))
                <div class="col-sm-12">
                    <div class="alert  {{ Session::get('alert-class', 'alert-info') }} alert-dismissible fade show"
                        role="alert">{{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif
            <div class="col-lg-5 col-md-5  col-12">
                <div class="single_img text-center">
                    <img src="{{ asset('public/upload/images/menu_item_icon/' . $itemdetails->menu_image) }}"
                        class="img-fluid detail-product-img" alt="{{ __('messages.res_image') }}">
                </div>
            </div>
            <input type="hidden" name="item_id" id="item_id" value="{{ $itemdetails->id }}" />
            <div class="col-lg-7 col-md-7 col-12">
                <div class="detail-product-box">
                    <div class="detail-descri">
                        <div class="detail-product-head">
                            <h4>{{ $itemdetails->menu_name }}</h4>
                            <input type="hidden" name="menu_name" id="menu_name" value="{{ $itemdetails->menu_name }}" />
                            <p>{{ Session::get('usercurrency') }}<span id="price">{{ $itemdetails->price }}</span></p>
                            <input type="hidden" id="origin_price" name="origin_price" value="{{ $itemdetails->price }}" />
                        </div>
                        <div class="detail-product-content">
                            <p>{{ $itemdetails->description }}</p>
                        </div>
                        <div class="detail-share-buttons">
                            <div class="detail-facebook">
                                <a href="javascript:shareonsoical(1,'{{ $itemdetails->id }}')">
                                    <i class="fa fa-facebook-square" aria-hidden="true"></i>
                                    <span>{{ __('messages.share') }}</span>
                                    <span id="facebook_share_id">{{ $itemdetails->facebook_share }}</span>
                                </a>
                            </div>
                            <div class="detail-tweet">
                                <a href="javascript:shareonsoical(2,'{{ $itemdetails->id }}')">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                    <span>{{ __('messages.tweet') }}</span>
                                    <span id="twitter_share_id">{{ $itemdetails->twitter_share }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($menu_interdientfi->count() > 0 || $menu_interdientpi->count() > 0)
                        <div class="detail-ingredients">
                            <div class="detail-ingredients-heading">
                                <h2>{{ __('messages.ingredients') }}</h2>
                            </div>
                            <div class="row">
                                @if ($menu_interdientfi->count() > 0)
                                    <div class="col-lg-5 col-md-6">
                                        <div class="detail-ingredients-head detail-ingredients-head-1">
                                            <h3>{{ __('messages.FI') }}</h3>
                                            <form>
                                                <?php $i = 0; ?>
                                                @foreach ($menu_interdientfi as $mifi)
                                                    <p>
                                                        <input type="checkbox" id="checkbox-{{ $i }}"
                                                            class="checkbox-custom" name="interdient"
                                                            value="{{ $mifi->id }}">
                                                        <label for="checkbox-{{ $i }}"
                                                            class="checkbox-custom-label">
                                                            {{ $mifi->item_name }}
                                                        </label>
                                                    </p>
                                                    <?php $i++; ?>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                @endif
                                @if ($menu_interdientpi->count() > 0)
                                    <div class="col-lg-7 col-md-6">
                                        <div class="detail-ingredients-head">
                                            <h3>{{ __('messages.PI') }}</h3>
                                            <form>
                                                @foreach ($menu_interdientpi as $mipi)
                                                    <p>
                                                        <input type="checkbox" id="checkbox-{{ $i }}"
                                                            class="checkbox-custom" name="interdient"
                                                            value="{{ $mipi->id }}"
                                                            onclick="addprice('{{ $mipi->price }}','{{ $i }}')">
                                                        <label for="checkbox-{{ $i }}"
                                                            class="checkbox-custom-label">
                                                            {{ $mipi->item_name }} - ( $ {{ round($mipi->price, 0) }} )
                                                        </label>
                                                    </p>
                                                    <?php $i++; ?>
                                                @endforeach
                                            </form>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="detail-plus-button min-add-button">
                        <div class="input-group">
                            <a data-decrease>
                                <i class="fa fa-minus" aria-hidden="true" onclick="decreaseValue()"></i>
                            </a>
                            <input type="text" id="number" name="qty" value="{{ __('messages.qty_pl') }}" />
                            <a data-increase>
                                <i class="fa fa-plus" aria-hidden="true" onclick="increaseValue()"></i>
                            </a>
                        </div>
                    </div>
                    <a href="javascript:addtocart()">
                        <div class="detail-plus-add-cart">
                            <span>{{ __('messages.addcart') }}</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="review_section">
        <div class="container">
            <div class="user_reviews">
                <div class="header mb-4">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3>Reviews</h3>
                        </div>
                        <div class="col-6">
                            <a href="javascript:void(0)" id="clickReview" class="float-right">Write a Review</a>
                        </div>
                    </div>
                </div>
                @if ($reviews->count() > 0)
                    <div class="review_wrap">
                        <div class="total_review mb-3">
                            <h5>{{ $reviews->count() }} Reviews</h5>
                        </div>
                        @foreach ($reviews as $review)
                            <div class="review_item">
                                <div class="d-flex position-relative">
                                    <div class="user_img">
                                        <img style="width: 100px; height: 110px;" src="@if ($review->user->profile_pic) {{ asset('public/upload/profile'.'/'.$review->user->profile_pic) }} @else {{ asset('public/upload/profile'.'/'.'my-account-pro.png') }} @endif"
                                            class="flex-shrink-0 mr-3" alt="">
                                    </div>
                                    <div class="review_article">
                                        <h3>
                                            {{ $review->user->name }}
                                            ( <span> Verified Buyer </span>)
                                            <span class="float-right">
                                                {{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}
                                            </span>
                                        </h3>
                                        <div class="star mb-3">
                                            @if($review->stars == 1)
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="star">
                                            @elseif ($review->stars == 2)
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="star">
                                            @elseif ($review->stars == 3)
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                            @elseif ($review->stars == 4)
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/nostar.svg') }}" alt="nostar">
                                            @else
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                                <img src="{{ asset('public/upload/web/icon/star.svg') }}" alt="star">
                                            @endif
                                        </div>
                                        <h4>{{ $review->title }}</h4>
                                        <p>
                                            {{ $review->comment }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- post review  --}}
                <div class="review_form pt-5 mb-5" id="review_form">
                    <form action="{{ route('item.review') }}" method="post">
                        @csrf
                        <input type="hidden" name="item_id" value="{{ $itemdetails->id }}">
                        <input type="hidden" name="stars" id="rating" value="3">
                        <div class="title mb-3">
                            <h3>Write a Review</h3>
                        </div>
                        <div class="mb-3">
                            <label for="score" class="form-label">Rating</label>
                            <div id="rateYo" class="jq-ry-container"></div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Comment</label>
                            <textarea name="comment" cols="30" rows="5" class="form-control" style="height: 120px !important;" required onkeyup="countChars(this);">{{ old('comment') }}</textarea>
                            <p id="charNum"></p>
                        </div>
                        <div class="mb-3">
                            @if (Session::get('login_user'))
                                <button type="submit" class="btn btn-primary">Submit</button>
                            @else
                                <button type="button" data-toggle="modal" data-target="#myModal1"
                                    class="btn btn-primary">Submit</button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end review section  --}}
    <div class="detail-related-box">
        <div class="container">
            <div class="detail-related-head">
                <h3>{{ __('messages.realted_pro') }}</h3>
            </div>
            @for ($i = 0; $i < count($related_item); $i++)
                <div class="row">
                    @if (!empty($related_item[$i]))
                        <div class="col-lg-6 col-md-6">
                            <div class="bor detail-related-tab">
                                <div class="items">
                                    <div class="b-img">
                                        <a href="{{ url('detailitem/' . $related_item[$i]->id) }}">
                                            <img src="{{ asset('public/upload/images/menu_item_icon/' . $related_item[$i]->menu_image) }}"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="bor">
                                        <div class="b-text">
                                            <a href="{{ url('detailitem/' . $related_item[$i]->id) }}">
                                                <h1>{{ $related_item[$i]->menu_name }}</h1>
                                            </a>
                                            <p>{{ $related_item[$i]->description }}</p>
                                        </div>
                                        <div class="price">
                                            <h1>{{ Session::get('usercurrency') }}{{ $related_item[$i]->price }}</h1>
                                            <div class="cart">
                                                <a
                                                    href="{{ url('detailitem/' . $related_item[$i]->id) }}">{{ __('messages.addcart') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $i++; ?>
                    @endif
                    @if (!empty($related_item[$i]))
                        <div class="col-lg-6 col-md-6">
                            <div class="bor detail-related-tab">
                                <div class="items">
                                    <div class="b-img">
                                        <a href="{{ url('detailitem/' . $related_item[$i]->id) }}">
                                            <img src="{{ asset('public/upload/images/menu_item_icon/' . $related_item[$i]->menu_image) }}"
                                                class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="bor">
                                        <div class="b-text">
                                            <a href="{{ url('detailitem/' . $related_item[$i]->id) }}">
                                                <h1>{{ $related_item[$i]->menu_name }}</h1>
                                            </a>
                                            <p>{{ $related_item[$i]->description }}</p>
                                        </div>
                                        <div class="price">
                                            <h1>{{ Session::get('usercurrency') }}{{ $related_item[$i]->price }}</h1>
                                            <div class="cart">
                                                <a
                                                    href="{{ url('detailitem/' . $related_item[$i]->id) }}">{{ __('messages.addcart') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endfor
        </div>
    @stop
