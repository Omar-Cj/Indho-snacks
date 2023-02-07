@extends('admin.index')
@section('content')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>



    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <div class="breadcrumbs breadsetting" style="margin-top: 5px">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>{{ __('messages.setting') }}</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">{{ __('messages.setting') }}</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="row rowkey">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                            <li class="nav-item">
                                <a class="nav-link <?= $tab == 1 ? 'active show ' : '' ?>" id="step1-tab" data-toggle="tab"
                                    href="#step1" role="tab" aria-controls="step1"
                                    aria-selected="true">{{ __('messages.res_detail') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= $tab == 2 ? 'active show ' : '' ?>" id="step3-tab" data-toggle="tab"
                                    href="#step3" role="tab" aria-controls="step3"
                                    aria-selected="true">{{ __('messages.payment') }}</a>
                            </li>
                            @if ($data->is_web != '0')
                                <li class="nav-item">
                                    <a class="nav-link <?= $tab == 3 ? 'active show ' : '' ?>" id="step2-tab"
                                        data-toggle="tab" href="#step2" role="tab" aria-controls="step2"
                                        aria-selected="true">{{ __('messages.soical_media') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link <?= $tab == 4 ? 'active show ' : '' ?>" id="step4-tab"
                                        data-toggle="tab" href="#step4" role="tab" aria-controls="step4"
                                        aria-selected="true">{{ __('messages.web images') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" id="about_us-tab" data-toggle="tab" href="#about_us" role="tab"
                                    aria-controls="about_us" aria-selected="true">{{ __('messages.about_us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="privacy_page-tab" data-toggle="tab" href="#privacy_page"
                                    role="tab" aria-controls="privacy_page"
                                    aria-selected="true">{{ __('Terms of Use') }}</a>
                            </li>
                        </ul>
                        <div class="tab-content pl-3 p-1" id="myTabContent">
                            <div class="tab-pane fade <?= $tab == 1 ? 'active show ' : '' ?>" id="step1" role="tabpanel"
                                aria-labelledby="step1-tab">
                                <div class="tabdiv">
                                    <form action="{{ url('saveresdetail') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.order_status') }}:-</label>
                                            @if ($data->order_status == '1')
                                                @if (Session::get('demo') == 0)
                                                    <input type="button" name="add_menu_cat"
                                                        class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn"
                                                        value="{{ __('messages.online') }}" onclick="disablebtn()">
                                                @else
                                                    <button class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn"
                                                        onclick="changeordersetting('0')">{{ __('messages.online') }}</button>
                                                @endif

                                            @endif
                                            @if ($data->order_status == '0')
                                                @if (Session::get('demo') == 0)
                                                    <input type="button" name="add_menu_cat"
                                                        class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn"
                                                        value="{{ __('messages.offline') }}" onclick="disablebtn()">
                                                @else
                                                    <button class="btn btn-primary btn-flat m-b-30 m-t-30 orderbtn"
                                                        onclick="changeordersetting('1')">{{ __('messages.offline') }}</button>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="address"
                                                class=" form-control-label">{{ __('messages.address') }}<span
                                                    class="reqfield">*</span></label>
                                            <textarea id="address" name="address" placeholder="{{ __('messages.address') }}" class="form-control" required>{{ $data->address }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.email') }}<span
                                                    class="reqfield">*</span></label>
                                            <input type="text" id="email" name="email"
                                                placeholder="{{ __('messages.email') }}" class="form-control"
                                                value="{{ $data->email }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_no"
                                                class=" form-control-label">{{ __('messages.phone_no') }}<span
                                                    class="reqfield">*</span></label>
                                            <input type="text" id="phone_no" name="phone_no"
                                                placeholder="{{ __('messages.phone_no') }}" class="form-control"
                                                value="{{ $data->phone }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_no"
                                                class=" form-control-label">{{ __('messages.delivery_charges') }}<span
                                                    class="reqfield">*</span></label>
                                            <input type="text" id="delivery" name="delivery"
                                                placeholder="{{ __('messages.delivery_charges') }}" class="form-control"
                                                value="{{ $data->delivery_charges }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class=" form-control-label">
                                                {{ __('messages.default_timezone') }}
                                                <span class="reqfield">*</span>
                                            </label>
                                            <select class="form-control" name="timezone" id="timezone" required="">
                                                <option value="">{{ __('messages.select_timezone') }}</option>
                                                @foreach ($timezone as $tz => $value)
                                                    <option value="{{ $tz }}"
                                                        <?= $data->timezone == $tz ? ' selected="selected"' : '' ?>>
                                                        {{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_no" class=" form-control-label">
                                                Footer Section <span class="reqfield">*</span>
                                            </label>
                                            <textarea name="footer_section" id="summernote3" cols="30" rows="10">{{ $data->footer_section }}</textarea>
                                        </div>
                                        <div class="col-md-12">
                                            @if (Session::get('demo') == 0)
                                                <button id="payment-button" type="button"
                                                    class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                                                    {{ __('messages.update') }}
                                                </button>
                                            @else
                                                <button class="btn btn-primary btnright" type="submit">
                                                    {{ __('messages.update') }}</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade <?= $tab == 2 ? 'active show ' : '' ?>" id="step3"
                                role="tabpanel" aria-labelledby="step3-tab">
                                <div class="tabdiv">
                                    <form action="{{ url('savepaymentdata') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="stripe_key"
                                                class=" form-control-label">{{ __('messages.stripe_key') }}<span
                                                    class="reqfield">*</span></label>
                                            <input type="password" id="stripe_key" name="stripe_key"
                                                placeholder="{{ __('messages.stripe_key') }}" class="form-control"
                                                required value="{{ $data->stripe_key }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="stripe_secret"
                                                class=" form-control-label">{{ __('messages.stripe_secert') }}<span
                                                    class="reqfield">*</span></label>
                                            <input type="password" id="stripe_secret" name="stripe_secret"
                                                placeholder="{{ __('messages.stripe_secert') }}" class="form-control"
                                                required value="{{ $data->stripe_secret }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="paypal_client_id"
                                                class=" form-control-label">{{ __('messages.paypal_client_id') }}<span
                                                    class="reqfield">*</span></label>
                                            <input type="password" id="paypal_client_id" name="paypal_client_id"
                                                placeholder="{{ __('messages.paypal_client_id') }}" class="form-control"
                                                required value="{{ $data->paypal_client_id }}">

                                        </div>
                                        <div class="form-group">
                                            <label for="paypal_client_secret"
                                                class=" form-control-label">{{ __('messages.paypal_client_secert') }}<span
                                                    class="reqfield">*</span></label>
                                            <input type="password" id="paypal_client_secret" name="paypal_client_secret"
                                                placeholder="{{ __('messages.paypal_client_secert') }}"
                                                class="form-control" required value="{{ $data->paypal_client_secret }}">

                                        </div>
                                        <div class="form-group paycheckbox">
                                            <div class="col col-md-12">
                                                <div class="form-check">
                                                    <div class="status">
                                                        <label for="checkbox1" class="form-check-label ">
                                                            <input type="checkbox" id="paypal_mode" name="paypal_mode"
                                                                value="0" class="form-check-input"
                                                                <?= $data->paypal_mode == '0' ? ' checked="checked"' : '' ?>>
                                                            {{ __('messages.paypal_test_pay') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group paycheckbox">
                                            <div class="col col-md-12">
                                                <div class="form-check">
                                                    <div class="status">
                                                        <label for="checkbox1" class="form-check-label ">
                                                            <input type="checkbox" id="stripe_active"
                                                                name="stripe_active" value="1"
                                                                class="form-check-input"
                                                                <?= $data->stripe_active == '1' ? ' checked="checked"' : '' ?>>
                                                            {{ __('messages.stripe_enable') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group paycheckbox">
                                            <div class="col col-md-12">
                                                <div class="form-check">
                                                    <div class="status">
                                                        <label for="checkbox1" class="form-check-label ">
                                                            <input type="checkbox" id="paypal_active"
                                                                name="paypal_active" value="1"
                                                                class="form-check-input"
                                                                <?= $data->paypal_active == '1' ? ' checked="checked"' : '' ?>>
                                                            {{ __('messages.paypal_enable') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">

                                            @if (Session::get('demo') == 0)
                                                <button id="payment-button" type="button"
                                                    class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                                                    {{ __('messages.update') }}
                                                </button>
                                            @else
                                                <button class="btn btn-primary btnright" type="submit">
                                                    {{ __('messages.update') }}</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade <?= $tab == 3 ? 'active show ' : '' ?>" id="step2"
                                role="tabpanel" aria-labelledby="step2-tab">
                                <div class="tabdiv">
                                    <form action="{{ url('savesoicalsetting') }}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.google_play_store') }}</label>
                                            <input type="text" id="playstore" name="playstore"
                                                placeholder="{{ __('messages.google_play_store') }}" class="form-control"
                                                value="{{ $data->play_store_url }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.app_store') }}</label>
                                            <input type="text" id="appstore" name="appstore"
                                                placeholder="{{ __('messages.app_store') }}" class="form-control"
                                                value="{{ $data->app_store_url }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.facebook_url') }}</label>
                                            <input type="text" id="facebook_id" name="facebook_id"
                                                placeholder="{{ __('messages.facebook_url') }} " class="form-control"
                                                value="{{ $data->facebook_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.twitter_url') }}</label>
                                            <input type="text" id="twitter_id" name="twitter_id"
                                                placeholder="{{ __('messages.twitter_url') }}" class="form-control"
                                                value="{{ $data->twitter_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.linkedin_id') }}</label>
                                            <input type="text" id="linkedin_id" name="linkedin_id"
                                                placeholder="{{ __('messages.linkedin_id') }}" class="form-control"
                                                value="{{ $data->linkedin_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.instragram_id') }}</label>
                                            <input type="text" id="instragram_id" name="instragram_id"
                                                placeholder="{{ __('messages.instragram_id') }}" class="form-control"
                                                value="{{ $data->instragram_id }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.tiktok_id') }}</label>
                                            <input type="text" id="tiktok_id" name="tiktok_id"
                                                placeholder="{{ __('messages.tiktok_id') }}" class="form-control"
                                                value="{{ $data->tiktok_id }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="email"
                                                class=" form-control-label">{{ __('messages.whatsapp') }}</label>
                                            <input type="text" id="whatsapp" name="whatsapp"
                                                placeholder="{{ __('messages.whatsapp') }}" class="form-control"
                                                value="{{ $data->whatsapp }}">
                                        </div>
                                        <div class="form-group paycheckbox">
                                            <div class="col col-md-12">
                                                <div class="form-check">
                                                    <div class="status">
                                                        <label for="checkbox1" class="form-check-label ">
                                                            <input type="checkbox" id="have_playstore"
                                                                name="have_playstore" value="1"
                                                                class="form-check-input"
                                                                <?= $data->have_playstore == '1' ? ' checked="checked"' : '' ?>>
                                                            {{ __('messages.Android Applciation Link') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group paycheckbox">
                                            <div class="col col-md-12">
                                                <div class="form-check">
                                                    <div class="status">
                                                        <label for="checkbox1" class="form-check-label ">
                                                            <input type="checkbox" id="have_appstore"
                                                                name="have_appstore" value="1"
                                                                class="form-check-input"
                                                                <?= $data->have_appstore == '1' ? ' checked="checked"' : '' ?>>
                                                            {{ __('messages.Ios Application Link') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            @if (Session::get('demo') == 0)
                                                <button id="payment-button" type="button"
                                                    class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                                                    {{ __('messages.update') }}
                                                </button>
                                            @else
                                                <button class="btn btn-primary btnright" type="submit">
                                                    {{ __('messages.update') }}</button>
                                            @endif
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade <?= $tab == 4 ? 'active show ' : '' ?>" id="step4" role="tabpanel"
                            aria-labelledby="step4-tab">
                            <div class="tabdiv">
                                <form action="{{ url('savewebimage') }}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <img src="{{ asset('public/upload/web') . '/' . $data->logo }}"
                                                class="webimage" />
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="stripe_key" class=" form-control-label">{{ __('messages.Logo') }}
                                                (100X100)<span class="reqfield">*</span></label>
                                            <input type="file" name="logo" id="logo" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <img src="{{ asset('public/upload/web') . '/' . $data->main_banner }}"
                                                class="webimage" />
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="stripe_key"
                                                class=" form-control-label">{{ __('messages.Main Banner') }}(1920X840)<span
                                                    class="reqfield">*</span></label>
                                            <input type="file" name="main_banner" id="main_banner"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <img src="{{ asset('public/upload/web') . '/' . $data->second_sec_img }}"
                                                class="webimage" />
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="stripe_key"
                                                class=" form-control-label">{{ __('messages.Second Section Image') }}(480X318)<span
                                                    class="reqfield">*</span></label>
                                            <input type="file" name="second_sec_img" id="second_sec_img"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <img src="{{ asset('public/upload/web') . '/' . $data->secong_icon_img }}"
                                                class="webimage" />
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="stripe_key"
                                                class=" form-control-label">{{ __('messages.Second Section Icon') }}
                                                (57X51)<span class="reqfield">*</span></label>
                                            <input type="file" name="secong_icon_img" id="secong_icon_img"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <img src="{{ asset('public/upload/web') . '/' . $data->footer_up_img }}"
                                                class="webimage" />
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="stripe_key"
                                                class=" form-control-label">{{ __('messages.Footer Up Image') }}(356X303)<span
                                                    class="reqfield">*</span></label>
                                            <input type="file" name="footer_up_img" id="footer_up_img"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <img src="{{ asset('public/upload/web') . '/' . $data->footer_img }}"
                                                class="webimage" />
                                        </div>
                                        <div class="form-group col-md-9">
                                            <label for="stripe_key"
                                                class=" form-control-label">{{ __('messages.Footer Image') }}(1920X840)<span
                                                    class="reqfield">*</span></label>
                                            <input type="file" name="footer_img" id="footer_img" class="form-control"
                                                onchange="Upload('footer_up_img',1920,840)">
                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">

                                        @if (Session::get('demo') == 0)
                                            <button id="payment-button" type="button"
                                                class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                                                {{ __('messages.update') }}
                                            </button>
                                        @else
                                            <button class="btn btn-primary btnright" type="submit">
                                                {{ __('messages.update') }}</button>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="about_us" role="tabpanel" aria-labelledby="about_us-tab">
                            <div class="tabdiv">
                                <form action="{{ route('savewebpage', $aboutpage->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="page_title"
                                            class=" form-control-label">{{ __('messages.page_title') }}<span
                                                class="">*</span></label>
                                        <input type="text" name="page_title" value="{{ $aboutpage->page_title }}"
                                            placeholder="{{ __('messages.page_title') }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="page_desc"
                                            class=" form-control-label">{{ __('messages.page_desc') }}<span
                                                class="">*</span></label>
                                        <textarea id="page_desc" name="page_desc" placeholder="{{ __('messages.page_desc') }}"class="form-control"
                                            required>{{ $aboutpage->page_desc }}</textarea>
                                        {{-- <div id="summernote"></div> --}}
                                    </div>

                                    <div class="form-group">
                                        <label for="image"
                                            class=" form-control-label">{{ __('messages.page_img') }}<span
                                                class="">*</span></label>
                                        <input type="file" name="page_img"
                                            placeholder="{{ __('messages.page_img') }}" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <button class="btn btn-primary btnright" type="submit">
                                            {{ __('messages.update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="privacy_page" role="tabpanel" aria-labelledby="privacy_page-tab">
                            @if($privacy)
                            <div class="tabdiv">
                                <form action="{{ route('savewebpage', $privacy->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group">

                                        <label for="page_title"
                                            class=" form-control-label">{{ __('messages.page_title') }}<span
                                                class="">*</span></label>
                                        <input type="text" name="page_title" value="{{ $privacy->page_title }}"
                                            placeholder="{{ __('messages.page_title') }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description"
                                            class=" form-control-label">{{ __('messages.page_desc') }}<span
                                                class="">*</span></label>
                                        <textarea id="summernote1" name="page_desc" placeholder="{{ __('messages.page_desc') }}" class="form-control"
                                            required>{{ $privacy->page_desc }}</textarea>
                                    </div>

                                    <div class="form-group col-md-12">

                                        @if (Session::get('demo') == 0)
                                            <button id="payment-button" type="button"
                                                class="btn btn-lg btn-info btn-block" onclick="disablebtn()">
                                                {{ __('messages.update') }}
                                            </button>
                                        @else
                                            <button class="btn btn-primary btnright" type="submit">
                                                {{ __('messages.update') }}</button>
                                        @endif
                                    </div>

                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="req_msg" value="{{ __('successerr.req_fields') }}">
    <input type="hidden" id="datasave" value="{{ __('successerr.data_save') }}">
@stop
@section('footer')
    <script>
        $('#page_desc').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
    </script>
    <script>
        $('#summernote1').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
        $('#summernote3').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
    </script>
    <script>
    @endsection
