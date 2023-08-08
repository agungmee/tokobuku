@extends("layouts.global")

@section("title") Create User @endsection

@section("content")

<div class="col-md-8 bg-white shadow-sm p-3">

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form class="form-group" enctype="multipart/form-data" action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" placeholder="Full Name" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="username">User Name</label>
                <input type="text" class="form-control" placeholder="User Name" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="role">Roles</label>
                <br>
                <input type="checkbox" name="roles[]" id="ADMIN" value="ADMIN">
                <label for="ADMIN">Administrator</label>

                <input type="checkbox" name="roles[]" id="STAFF" value="STAFF">
                <label for="STAFF">Staff</label>

                <input type="checkbox" name="roles[]" id="CUSTOMER" value="CUSTOMER">
                <label for="CUSTOMER">Customer</label>
                <br>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <br>
                <input type="text" name="phone" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control" cols="30" rows="10"></textarea>
                <br>
            </div>
            <div class="form-group">
            <label for="avatar">Avatar Image</label>
                <br>
                <input type="file" name="avatar" id="avatar" class="form-controll">

                <hr class="my-3">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="name@email.com">
                <br>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" placeholder="password" id="password">
                <br>
            </div>
            <div class="form-group">
                <label for="password-confirmation">Password Confirmation</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Password Confirmation">
                <br>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control btn btn-primary" value="Save" style="color: white">
            </div>
    </form>
</div>

@endsection