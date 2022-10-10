@extends('frontend.main_master')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>

                <img src="{{ (!empty($user->profile_image))? url('upload/user_images/'. $user->profile_image): url('upload/no_img.jpeg') }}" alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%"><br><br>

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
                    <h3 class="text-center"><span class="text-danger">
                    Update Password
                    </h3>
                </div><br><br>

                <div class="card-body">

                    <form method="post" action="{{ route('user.update.password')}}">
                        @csrf
                          <div class="row">
                            <div class="col-12"><br><br>
                    
                                <div class="form-group">
                                    <h5>New Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="password" name="password" class="form-control" required="">
                                    </div>
                                 </div>
                    
                    
                                <div class="form-group">
                                    <h5>Confirm Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required="">
                                    </div>
                                 </div>
                    
                    
                                <div class="form-group">
                                    <h5>Current Password <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="password" id="current_password" name="oldpassword" class="form-control" required="">
                                    </div>
                                 </div>
                    
                    
                            </div>
                    
                            <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            </div>
                        </form><br><br><br><br>

                </div>

            </div><!-- end col-md-6 -->


        </div>  {{--  // end row --}}
    </div>
</div>
@endsection
