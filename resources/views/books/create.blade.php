@extends('commons.layouts.dashboard')

@section('content')

    <h2>Add a book</h2>

    <form method="post" action="/books" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group row">
            <label for="titleid" class="col-sm-3 col-form-label">Book Title</label>
            <div class="col-sm-9">
                <input name="title" type="text" class="form-control" id="titleid" placeholder="Book Title">
            </div>
        </div>
        <div class="form-group row">
            <label for="publisherid" class="col-sm-3 col-form-label">Book Publisher</label>
            <div class="col-sm-9">
                <input name="publisher" type="text" class="form-control" id="publisherid"
                       placeholder="Book Publisher">
            </div>
        </div>
        <div class="form-group row">
            <label for="releasedateid" class="col-sm-3 col-form-label">Release Date</label>
            <div class="col-sm-9">
                <input name="releasedate" type="text" class="form-control" id="releasedateid"
                       placeholder="Release Date">
            </div>
        </div>
        <div class="form-group row">
            <label for="Bookimageid" class="col-sm-3 col-form-label">Book Image</label>
            <div class="col-sm-9">
                <input name="image" type="file" id="Bookimageid" class="custom-file-input">
                <span style="margin-left: 15px; width: 480px;" class="custom-file-control"></span>
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit Book</button>
            </div>
        </div>
    </form>

@endsection