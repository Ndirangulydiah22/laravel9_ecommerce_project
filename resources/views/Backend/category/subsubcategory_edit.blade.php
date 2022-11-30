@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

 
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

		<!-- Main content -->
		<section class="content">
		  <div class="row">

          <!-- View category table -->
			  

<!-- Update subsubCategory Page -->

<div class="col-8">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit Sub-SubCategory</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">


	   <form Action="{{route('subsubcategory.update')}}" method="post" >
        @csrf

		<input type="hidden" name="id" value="{{$subsubcategories -> id}}">

				<div class="form-group">
				<h5>Category Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="category_id"  class="form-control">
					<option value="" selected="" disabled="">Select Category</option>

				@foreach($categories as $category)

				<option value="{{$category -> id}}" {{$category ->id == $subsubcategories->category_id ? 'selected':''}} >{{$category ->category_name_en }} </option>
				@endforeach

				</select>
				@error('category_id') 
				<span class="text-danger">{{$message}}</span>
				@enderror
				</div>
				</div>

				<div class="form-group">
				<h5>SubCategory Select <span class="text-danger">*</span></h5>
				<div class="controls">
				<select name="subcategory_id"  class="form-control">
					<option value="" selected="" disabled="">Select SubCategory</option>
					@foreach($subcategories as $subsub)

				<option value="{{$subsub -> id}}" {{$subsub ->id == $subsubcategories->subcategory_id ? 'selected':''}} >{{$subsub ->subcategory_name_en }} </option>
				@endforeach

				</select>
				@error('subcategory_id') 
				<span class="text-danger">{{$message}}</span>
				@enderror
				</div>
				</div>



            <div class="form-group">
                <h5>Sub SubCategory English<span class="text-danger">*</span></h5>
             <div class="controls">
                <input type="text" name="subsubcategory_name_en" value="{{$subsubcategories -> subsubcategory_name_en}}"  class="form-control"  >
                @error('subsubcategory_name_en') 
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div></div>

            <div class="form-group">
                <h5>Sub SubCategory Kiswahili<span class="text-danger">*</span></h5>
             <div class="controls">
                <input type="text" name="subsubcategory_name_kis" value="{{$subsubcategories -> subsubcategory_name_kis}}" class="form-control"  >
                @error('subsubcategory_name_kis') 
                <span class="text-danger">{{$message}}</span>
                @enderror 
            </div></div>

                     
                                
               <div class="text-xs-right">
                   <input type="submit" class="btn btn-rounded btn-primary mb-5" value= "Update">
               </div>
           </form>

         
       </div>
   </div>
   <!-- /.box-body -->
 </div>
         
</div>
<!-- /.col -->



		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

	 

@endsection