@extends('admin.admin_master')
@section('admin')

 
	  <div class="container-full">
		<!-- Content Header (Page header) -->
	

		<!-- Main content -->
		<section class="content">
		  <div class="row">

          <!-- View category table -->
			  
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Pending Orders List <span class="badge badge-pill badge-danger">{{count($orders)}}</span></h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Date</th>
								<th>Invoice</th>
								<th>Amount </th>
                                <th>Payment </th>
								<th>Status </th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
@foreach($orders as $item)
<tr>
    <td> <span> <i class="{{$item -> category_icon}}"></i></span>{{$item -> order_date}}</td>
    <td>{{$item -> invoice_number}}</td>
    <td>{{$item -> amount}}</td>
    <td>{{$item -> payment_method}}</td>
    <td> <span class="badge badge-pill badge-primary">{{$item -> status}}</span></td>

    <td width="25%">    
<a href="{{route('pending.orders.details',$item->id)}}"class="btn btn-info"> <i class= "fa fa-eye"></i> </a>


    </td>
</tr>
@endforeach
							
						</tbody>
						

					  </table>
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