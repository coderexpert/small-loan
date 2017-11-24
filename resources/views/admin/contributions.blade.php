@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Ukarimu Group Members Contributions
	</div>
	<div class="panel-body">
		<div class="table-resposive">
			@if(count($contributions))
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Date Submitted</th>
							<th>Amount</th>
							<th>Transaction ID</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($contributions as $contribution)
					<tr>
						<td>{{ \App\User::find($contribution->user_id)->name }}</td>
						<td>{{ $contribution->created_at->toDayDateTimeString() }}</td>
						<td>{{ $contribution->amount }}</td>
						<td>{{ $contribution->transaction}}</td>

						@if($contribution->status)
							<td>Approved</td>	
						@else					
							<td><a href="{{ route('approveContribution', $contribution->id) }}" onclick="event.preventDefault(); document.getElementById('approve-form').submit();">
								Approve <i class="fa fa-check-square-o"></i>
							</a>
							<form id="approve-form" method="post" action="{{ route('approveContribution', $contribution->id) }}" style="display: none;">
									{{ csrf_field() }}
							</form>
						</td>
						@endif
					</tr>
					@endforeach
					</tbody>
				</table>
			@else
				No member contributions found
			@endif
		</div>
	</div>
</div>

@endsection