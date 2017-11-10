@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Ukarimu Group Members Loans
	</div>
	<div class="panel-body">
		<div class="table-resposive">
			@if(count($loans))
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Date applied</th>
							<th>Amount</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($loans as $loan)
					<tr>
						<td>{{ \App\User::find($loan->user_id)->name }}</td>
						<td>{{ $loan->created_at->toDayDateTimeString() }}</td>
						<th>{{ $loan->amount }}</th>
						@if($loan->status)
							<td>Approved</td>	
						@else					
							<td><a href="{{ route('approveLoan', $loan->id) }}" onclick="event.preventDefault(); document.getElementById('approve-form').submit();">
								Approve <i class="fa fa-check-square-o"></i>
							</a>
							<form id="approve-form" method="post" action="{{ route('approveLoan', $loan->id) }}" style="display: none;">
									{{ csrf_field() }}
							</form>
						</td>
						@endif
					</tr>
					@endforeach
					</tbody>
				</table>
			@else
				No loan history found.
			@endif
		</div>
	</div>
</div>

@endsection