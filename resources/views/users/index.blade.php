@extends("layouts.global")

@section("title") List User @endsection

@section("content")

<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">User Name</th>
        <th scope="col">Email</th>
        <th scope="col">Avatar</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
      <tr class="">
            <td>{{ $user->name }}</td>
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
                <a href="{{route('users.edit', [$user->id])}}" class="btn btn-sm btn-primary">Edit</a>
            </td>
      </tr>
    @endforeach
    </tbody>
  </table>

@endsection