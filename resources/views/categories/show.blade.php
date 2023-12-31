@extends("layouts.global")

@section("title") Details Category @endsection

@section("content")

<div class="col-md-8 bg-white shadow-sm p-3">

    <div class="col-md-8">
        <div class="card">
        <div class="card-body">
            <label><b>Category name</b></label><br>
            {{$category->name}}
            <br><br>
            <label><b>Category slug</b></label><br>
            {{$category->slug}}
            <br><br>
            <label><b>Category image</b></label><br>
            @if($category->image)
            <img src="{{asset('storage/' . $category->image)}}"
            width="120px">
            @endif
        </div>
        </div>
    </div>
    
</div>

@endsection