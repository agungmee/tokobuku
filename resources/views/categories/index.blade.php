@extends("layouts.global")

@section("title") List Category @endsection

@section("content")

<h2>Category List</h2><br>

<a href="{{route('categories.create')}}"><button class="btn btn-success" style="margin-bottom: 20px">Add Category</button></a>

<form action="{{route('categories.index')}}">
    <div class="row col-md-6">
        <input type="text" name="keyword" class="form-control col-md-10" placeholder="Filter Berdasarkan Nama" value="{{Request::get('keyword')}}">
        <input type="submit" class="btn btn-primary" value="Filter">
    </div>
</form>
<br>

<table class="table">

    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Slug</th>
        <th scope="col">Image</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($categories as $category)
      <tr class="">
            <td><a href="{{route('categories.show', [$category->id])}}">{{ $category->name }}</a></td>
            <td>{{ $category->slug }}</td>
            <td>
                @if ($category->image)
                    <img src="{{asset('storage/'.$category->image)}}" width="70px" alt="" srcset="">
                @else
                    Belum Ada Gambar
                @endif
            </td>
            <td>
                <div class="row">
                <a href="{{route('categories.edit', [$category->id])}}" class="btn btn-sm btn-primary">Edit</a>
                <form onsubmit="return confirm('Move Category to Trash?')" action="" method="POST">
                    @csrf
    
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
                </div>
            </td>  
      </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10">
                {{$categories->appends(Request::all())->links()}}
            </td>
        </tr>
    </tfoot>
  </table>

@endsection