@extends("layouts.global")

@section("title") Create Category @endsection

@section("content")

<div class="col-md-8 bg-white shadow-sm p-3">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form class="form-group" enctype="multipart/form-data" action="{{route('categories.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" placeholder="Category Name" name="name" id="name">
            </div>
            <div class="form-group">
            <label for="avatar">Category Image</label>
                <br>
                <input type="file" name="image" id="image" class="form-controll">
                <hr class="my-3">
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" value="Save" style="color: white">
            </div>
    </form>
</div>

@endsection