
@extends('admin.admin_master')

@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">

    <!-- Main content -->
   
    <section class="content">

        <!-- Basic Forms -->
         <div class="box">
           <div class="box-header with-border">
             <h4 class="box-title">Edit Profile</h4>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
             <div class="row">
               <div class="col">
    <form method="post" action="{{ route('admin.profile.store') }}" enctype="multipart/form-data">
    @csrf
      <div class="row">
        <div class="col-12">						
            <div class="form-group">
                <h5>Basic Information <span class="text-danger">*</span></h5>
                
            </div>

            <div class="form-group">
            <h5>Name <span class="text-danger">*</span></h5>
            <div class="controls">
                <input type="text" name="name" class="form-control" required="" value="{{ $editData->name}}"> </div>
        </div>

            <div class="form-group">
                <h5>Email <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="email" name="email" class="form-control" required="" value="{{ $editData->email}}"></div>
            </div>

            <div class="form-group">
                <h5>Profile Image <span class="text-danger">*</span></h5>
                <div class="controls">
                    <input type="file" id="profile_image" name="profile_image" class="form-control" required=""> <div class="help-block"></div></div>
            </div>

            <div class="col-md-6 mb-5 pb-5">
            <img id="showImage" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images'. $adminData->profile_image): url('upload/no_img.jpeg') }}" style="width:100px; height:100px;" alt="">
            </div>

        </div>

        <div class="text-xs-right">
        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
        </div>
    </form>

               </div>
               <!-- /.col -->
             </div>
             <!-- /.row -->
           </div>
           <!-- /.box-body -->
         </div>
         <!-- /.box -->

       </section>

    <!-- /.content -->
  </div>

  <script type="text/javascript">

    $(document).ready(function(){

        $('#profile_image').change(function(e)
        {
        var reader = new FileReader();
        reader.onload = function(e){
            $('#showImage').attr('src',e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

  @endsection