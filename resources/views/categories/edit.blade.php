@extends("layouts.global")

@section("title") Category Edit @endsection

@section("content")

<div class="col-md-8 bg-white shadow-sm p-3">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form class="form-group" enctype="multipart/form-data" action="{{route('categories.update', [$category_to_update->id])}}" method="POST">
            @csrf

            <input type="hidden" value="PUT" name="_method"> {{-- Ini agar Laravel bisa handle method PUT --}}

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" placeholder="Category Name" name="name" id="name" value="{{$category_to_update->name}}">
            </div>
            <div class="form-group">
                <label for="name">Slug</label>
                <input type="text" class="form-control" placeholder="Slug" name="slug" id="name" value="{{$category_to_update->slug}}" disabled>
            </div>
            <div class="form-group">
            <label for="avatar">Category Image</label>
                <br>
                @if ($category_to_update->image)
                    <img src="{{asset('storage/'.$category_to_update->image)}}" width="70px" alt="" srcset=""><br>
                @else
                    Belum Ada Gambar
                @endif
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