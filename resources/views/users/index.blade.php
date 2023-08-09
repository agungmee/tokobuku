@extends("layouts.global")

@section("title") List User @endsection

@section("content")

        <form action="{{route('users.index')}}">
            <div class="row">
            <div class="col-md-6">
                <input type="text" name="keyword" class="form-control col-md-10" placeholder="Filter Berdasarkan Email" value="{{Request::get('keyword')}}">
            </div>
            <div class="col-md-6">
                <input {{Request::get('status') == "ACTIVE" ? "checked" : ""}} value="ACTIVE" name="status" type="radio" class="form-control" id="active">
                <label for="active">Active</label>
                <input {{Request::get('status') == "INACTIVE" ? "checked" : ""}} value="INACTIVE" name="status" type="radio" class="form-control" id="inactive">
                <label for="inactive">Inactive</label>
                
                <input type="submit" class="btn btn-primary" value="Filter">
            </div>
            </div>
        </form>
        <br>
<table class="table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Avatar</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr class="">
            <td><a href="{{route('users.show', [$user->id])}}"><u>{{ $user->name }}</u></a></td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->avatar)
                    <img src="{{asset('storage/'.$user->avatar)}}" width="70px" alt="" srcset="">
                @else
                    Belum Ada Avatar
                @endif
            </td>
            <td>
                @if($user->status == "ACTIVE")
                    <span class="badge badge-success">
                    {{$user->status}}
                    </span>
                @else
                    <span class="badge badge-danger">
                        {{$user->status}}
                    </span>
                @endif</td>
            <td>
                <a href="{{route('users.edit', [$user->id])}}" class="btn btn-sm btn-primary">Edit</a>
                <form onsubmit="return confirm('Delete This Permanently?')" action="{{route('users.destroy', [$user->id])}}" method="POST">
                    @csrf
    
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
            </td>  
      </tr>
    @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10">
                {{$users->appends(Request::all())->links()}}
            </td>
        </tr>
    </tfoot>
  </table>

@endsection