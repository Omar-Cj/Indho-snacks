<div class="tab-pane fade" id="about_us" role="tabpanel" aria-labelledby="about_us-tab">
    <div class="tabdiv">
        <form action="{{ route('savewebpage') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="page_title" class=" form-control-label">{{ __('messages.page_title') }}<span
                        class="">*</span></label>
                <input type="text" name="page_title" placeholder="{{ __('messages.page_title') }}"
                    class="form-control" required>{{ $data->page_title }}</textarea>
            </div>
            <div class="form-group">
                <label for="page_desc" class=" form-control-label">{{ __('messages.page_desc') }}<span
                        class="">*</span></label>
                <textarea id="page_desc" name="page_desc" placeholder="{{ __('messages.page_desc') }}"class="form-control" required>{{ $data->page_desc }}</textarea>
                <div id="summernote"></div>
            </div>

            <div class="form-group">
                <label for="image" class=" form-control-label">{{ __('messages.page_img') }}<span
                        class="">*</span></label>
                <input type="file" name="page_img" placeholder="{{ __('messages.page_img') }}" class="form-control"
                    required>{{ $data->page_img }}</textarea>
            </div>
            <div class="form-group col-md-12">

                @if (Session::get('demo') == 0)
                    <button id="payment-button" type="button" class="btn btn-lg btn-info btn-block"
                        onclick="disablebtn()">
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
