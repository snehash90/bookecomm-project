@extends('frontend.main_master')
@section('content')

<div class="body-container">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
                    {{-- {{ dd($user->profile_image); }} --}}
                    
                <img src="{{ (!empty(Auth::user()->profile_image))? url('upload/user_images/'. Auth::user()->profile_image): url('upload/no_img.jpeg') }}" alt="" class="card-img-top" style="border-radius: 50%" height="100%" width="100%"><br><br>

                <ul class="list-group list-group-flush">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm btn-block">Home</a>

                    <a href="{{ route ('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>

                    <a href="{{ route('user.change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>

                    <a href="{{ route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>

            </div> <!-- end col-md-2 -->

            <div class="col-md-2">

            </div> <!-- end col-md-2 -->

            <div class="col-md-6">

                <div class="card">
                    <h3 class="text-center"><span class="text-danger"> Hi...</span><strong>
                    {{Auth::user()->name }}   
                    </strong>
                    Welcome to Book Store.
                </h3>
                </div>

            </div><!-- end col-md-6 -->


        </div>  {{--  // end row --}}
    </div>
</div>
@endsection
