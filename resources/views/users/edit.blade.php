@extends("layouts.global")

@section("title") List User @endsection

@section("content")

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif


<form class="form-group" enctype="multipart/form-data" action="{{route('users.update', [$user->id])}}" method="POST">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" placeholder="Full Name" name="name" value="{{$user->name}}" id="name">
    </div>

    <div class="form-group">
        <label for="">Status</label>
        <br/>
        <input {{$user->status == "ACTIVE" ? "checked" : ""}} value="ACTIVE" type="radio" class="form-control" id="active" name="status">
        <label for="active">Active</label>
        <input {{$user->status == "INACTIVE" ? "checked" : ""}} value="INACTIVE" type="radio" class="form-control" id="inactive" name="status">
        <label for="inactive">Inactive</label>
        <br><br>
    </div>
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" placeholder="User Name" id="username" value="{{$user->username}}" name="username" disabled>
    </div>
    <div class="form-group">
        <label for="role">Roles</label>
        <br>
        <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN" {{in_array("ADMIN", json_decode($user->roles)) ? "checked" : ""}}>
        <label for="ADMIN">Administrator</label>

        <input type="checkbox" name="roles[]" id="STAFF" value="STAFF" {{in_array("STAFF", json_decode($user->roles)) ? "checked" : ""}} >
        <label for="STAFF">Staff</label>

        <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER" {{in_array("CUSTOMER", json_decode($user->roles)) ? "checked" : ""}}>
        <label for="CUSTOMER">Customer</label>
        <br>
    </div>
    <div class="form-group">
        <label for="phone">Phone Number</label>
        <br>
        <input type="text" name="phone" class="form-control" value="{{$user->phone}}" disabled>
        <br>
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" cols="30" rows="10">{{$user->address}}</textarea>
        <br>
    </div>
    <div class="form-group">
    <label for="avatar">Avatar Image</label>
    <br>
        @if ($user->avatar)
            <img src="{{asset('storage/'.$user->avatar)}}" width="120px" alt="" srcset="">
        @else
            No Avatar
        @endif
            
    <br><br>
        <small class="text-muted">Kosongkan jika tidak ingin mengubah avatar atau update avatar dibawah</small><br>
        <input type="file" name="avatar" id="avatar" class="form-controll">

        <hr class="my-3">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="name@email.com" value="{{$user->email}}" disabled>
        <br>
    </div>
    <div class="form-group">
        <input type="submit" class="form-control btn btn-primary" value="Save" style="color: white">
    </div>
</form>
</div>


@endsection