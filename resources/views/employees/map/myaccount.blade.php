
@extends('layouts.mastermap')

@section('content')


<div class="container">

<!-- Marketing Icons Section -->
<div class="row">
	<div class="col-lg-12">

			<div class="panel panel-default">
			<div class="panel-heading">
				<h4>  </h4>
			</div>
			<div class="panel-body">
			<div style="width:100%">


			<div class="row">
<div class="col-lg-8">
	<div class="panel panel-default">
		<div class="panel-heading">Oustanding Invoices / Adjustments: (All Values in $)</div>
		<div class="panel-body">
			<table class="table">
				<thead>
					<tr>
						<th>Member</th>
						<th>Inv ID</th>
						<th>Date</th>
						<th>Description</th>
						<th>$ Amount</th>
						<th>Payment</th>
					</tr>
						<?php
						$id = Auth::user()->student_id;
						// echo $id;
						$invoices1 = DB::table('invoices')->where('student_id','=',$id)->get();
						?>
						@foreach($invoices1 as $invoice)
					<tbody>
					<?php $totInvoice=$invoice->amount+$totInvoice ?>

						<td>{{Auth::user()->student_id}}</td>
						<td>{{ $invoice->id}}</td>
						<td>{{ $invoice->created_at}}</td>
						<td>{{ $invoice->description}}</td>
						<td>$ {{$invoice->amount}}</td>
						<td>
							<?php $invoices2 = DB::table('invoices')->where('id','=',$invoice->id)->first();?>
							@if( $invoices2->paied==0)
							Paied
							<!--
							<form action="/payinvoice" method="post">
								@csrf

								<input type="hidden" name="id" value="{{$invoices2->id}}" >
								<input type="submit" class="btn btn-success" value="Pay">
							</form>-->
							@else
							Not Paied
						<!--	<form action="/undopayinvoice" method="post">
								@csrf
								<input type="hidden" name="id" value="{{$invoices2->id}}" >
								<input type="submit" class="btn btn-warning" value="Undo">
							</form>	-->						
							@endif							
						</td>
					</tbody>
						@endforeach
				</thead>
			</table>

		</div>
	</div>
</div>
<?php
$id = Auth::user()->student_id;
// echo $id;
$payments1 = DB::table('payments')->where('user_id','=',$id)->get();
?>
	@foreach($payments1 as $payment)
	<?php $NetBalance=$payment->payment+$NetBalance ?>
	@endforeach


<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading"><!--Total Required: {{$totInvoice}} $ <br/>Total Payments :{{$NetBalance}}  $
		<br>--------------------------------------> 
		<?php $net_balance = $NetBalance;?>
		<br>Net Balance : <!--{{$NetBalance}} - {{$totInvoice}} =--> {{$net_balance}}</div>
		<div class="panel-body">
		<!--
						<hr/>
		-->
		<h4> 	Pay by Bank Transfer...</h4>
		<p>	Click the info button below and follow the instructions. </p>
		<p>
		NOTE: We do NOT accept bank charges.
		</p>
		<br/><br/>
				<table class="table" style='border:1px solid #ccc'>
					<tr>
						<th style='border:1px solid #ccc'>Member</th>
						<th style='border:1px solid #ccc'>Date</th>
						<th style='border:1px solid #ccc;text-align:right;'>Amount</th>

					</tr>
		<?php
		$id = Auth::user()->student_id;
		// echo $id;
		$payments1 = DB::table('payments')->where('user_id','=',$id)->get();
		?>
					@foreach($payments1 as $payment)
					<?php //$NetBalance=$payment->payment+$NetBalance ?>
					<tr style='border:1px solid #ccc'>
					<td style='border:1px solid #ccc'>{{Auth::user()->student_id}}</td>
					<td style='border:1px solid #ccc'>{{ $payment->created_at}}</td>
					<td style='border:1px solid #ccc; text-align:right;'>{{ $payment->payment}}</td>
					</tr>
					@endforeach
					<tr>
						<th colspan="2">Net Balance</th>
							<?php //$NetBalance=$NetBalance-$totInvoice;?>
						<td style='border:1px solid #ccc; text-align:right;'>{{$NetBalance}} </td>
					</tr>
				</table>
							</div>

		</div>
</div>

</div> <!-- row -->

<div class="row">
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Avilable Invoices</div>
		<div class="panel-body">
		@foreach($invoices1 as $invoice)
		<a class="btn btn-small  btn-danger " href="/invoice/{{$invoice->id}}">INV-{{$invoice->id}}.pdf</a>
		@endforeach
		</div>
		</div>
</div>
</div>
</div>
			</div>
		</div>
	</div>
</div>

@endsection


