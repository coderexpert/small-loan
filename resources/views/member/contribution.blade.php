@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="list-group">
						<li class="list-group-item">
							<form method="post" class="form-horizontal" action="{{ route('member_submit_contribution') }}">
								<fieldset>
									<legend>Make a contribution</legend>
								</fieldset>
								{{ csrf_field() }}
								<div class="form-group">
									<label for="amount" class="control-label col-md-4">Amount</label>
									<div class="col-md-8">
										<input type="number" name="amount" id="amount" class="form-control" required />
									</div>
								</div>
								<div class="form-group">
									<label for="transaction" class="control-label col-md-4">Mpesa transaction</label>
									<div class="col-md-8">
										<input type="text" name="transaction" id="transaction" class="form-control" required />
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8 col-md-offset-4">
										<button type="Submit" class="btn btn-success btn-block">Submit</button>
									</div>
								</div>
							</form>
						</li>
					</div>
				</div>
				<div class="panel-body">
					<div class="modal-footer text-muted"><strong>Monthly contributions</strong></div>
					<div class="table-responsive">
						@if(count($contributions))
	                        <table class="table table-bordered">
	                        <thead>
	                                <tr>
	                                    <th>Day Submitted</th>
										<th>Amount</th>
										<th>MPESA Transaction ID</th>
										<th>Status</th>
	                                </tr>
	                            </thead>
	                            <tbody>
	                        @foreach($contributions as $contribution)

	                            <tr>
	                                <td>{{ $contribution->created_at->toDayDateTimeString() }}</td>
	                                <td>{{ $contribution->amount }}</td>
	                                <td>{{ $contribution->transaction }}</td> 
	                                <td>{{ ($contribution->status) ? 'Confirmed'	 : 'Not confirmed'}}</td>
	                            </tr>
	                        @endforeach
	                            </tbody>
	                        </table>
	                    @else
	                        <div class="text-center text-primary">You have no contributions</div>
	                    @endif
					</div>
				</div>
				<div class="panel-footer">
					<div class="text-center">
						If your contribution does not appear. Kindly visit our offices.
					</div>
				</div>
			</div>
		</div>		
	</div>
</div>
@endsection