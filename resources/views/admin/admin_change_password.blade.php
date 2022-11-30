@extends('admin.admin_master')
@section('admin')

<!-- Jquery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<div class="container-full">

		<!-- Main content -->
		

        <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Change Admin Password</h4>
     
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
     <form Action="{{route('update.change.password')}}" method="post" enctype="multipart/form-data">
        @csrf

             <div class="row">
               <div class="col-12">	



<div class="row">
   <div class="col-md-6">

            <div class="form-group">
                <h5>Current Password<span class="text-danger">*</span></h5>
             <div class="controls">
                <input id="current_password" type="password" name="oldpassword" class="form-control"  > 
            </div></div>

            <div class="form-group">
                <h5>New Password<span class="text-danger">*</span></h5>
             <div class="controls">
                <input id="password" type="password" name="password" class="form-control"  > 
            </div></div>

            <div class="form-group">
                <h5>Confirm Password<span class="text-danger">*</span></h5>
             <div class="controls">
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control"  > 
            </div></div>


            </div><!-- end col md 6 -->
</div><!-- end row -->
 


           
               
                                
               <div class="text-xs-right">
                   <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "update">
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


      @endsection