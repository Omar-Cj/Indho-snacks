@extends('admin.index')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edit Item Review</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Edit Item Review</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>
                    <a href="{{ route('item.review') }}" class="btn btn-info float-right">Back</a>
                </h3>
            </div>
            <div class="card-body">
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
                <form action="{{ route('item.review.update', $reviews->id) }}" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" required value="{{ $reviews->title }}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Item Name</label>
                            <input type="text" readonly class="form-control" value="{{ $itemdetails->menu_name }}">
                        </div>
                        <div class="col-md-12">
                            <label for="">Comment</label>
                            <textarea name="comment" class="form-control" cols="30" rows="4" required onkeyup="countChars(this);">{{ $reviews->comment }}</textarea>
                            <p id="charNum"></p>
                        </div>
                        <div class="col-md-4">
                            <label for="">Review Stars</label>
                            <select name="stars" class="form-control">
                                <option value="1" @if($reviews->stars == 1) selected @endif>1 Star</option>
                                <option value="2" @if($reviews->stars == 2) selected @endif>2 Star</option>
                                <option value="3" @if($reviews->stars == 3) selected @endif>3 Star</option>
                                <option value="4" @if($reviews->stars == 4) selected @endif>4 Star</option>
                                <option value="5" @if($reviews->stars == 5) selected @endif>5 Star</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" @if($reviews->status == 1) selected @endif>Active</option>
                                <option value="0" @if($reviews->status == 0) selected @endif>Pending</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="">User Name</label>
                            <input type="text" readonly class="form-control" value="{{ $reviews->user->name }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center mt-2">
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
