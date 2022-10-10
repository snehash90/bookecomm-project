@extends('frontend.main_master')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>

                <img src="{{ (!empty($user->profile_image))? url('upload/user_images/'.$user->profile_image): url('upload/no_img.jpeg') }}" alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%"><br><br>

                <ul class="list-group list-group-flush">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route ('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>

            </div> <!-- end col-md-2 -->

            <div class="col-md-2">

            </div> <!-- end col-md-2 -->

            <div class="col-md-6">
                <div class="card"><br><br>
                    <h3 class="text-center"><span class="text-danger"> Hi...</span><strong>
                    {{Auth::user()->name }}   
                    </strong>
                    Update Profile
                    </h3>
                </div><br><br>

                <div class="card-body">

                    <form method="post" action="{{ route('user.profile.store')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="from-group mb-5">
                            <label for="Name" class="info-title">Name</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control text-input">
                        </div><br><br>

                        <div class="from-group mb-5">
                            <label for="Email" class="info-title">Email</label>
                            <input type="email" name="email" value="{{ $user->email}}" class="form-control text-input">
                        </div><br><br>

                        <div class="from-group mb-5">
                            <label for="Phone" class="info-title">Phone</label>
                            <input type="text" name="phone" value="{{ $user->phone}}" class="form-control text-input">
                        </div><br><br>

                        <div class="from-group mb-5">
                            <label for="Image" class="info-title">User Image</label>
                            <input type="file" name="profile_image"  class="form-control text-input">
                        </div><br><br>

                        <div class="from-group mb-5">
                            <button type="submit" class="btn btn-danger">Update</button>
                        </div><br><br><br><br>



                    </form>

                </div>

            </div><!-- end col-md-6 -->


        </div>  {{--  // end row --}}
    </div>
</div>
@endsection
