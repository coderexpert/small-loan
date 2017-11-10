@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Ukarimu Group Members
	</div>
	<div class="panel-body">
		<div class="table-resposive">
			@if(count($members))
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					@foreach($members as $member)
					<tr>
						<td>{{ $member->name}}</td>
						<td>{{ $member->email}}</td>
						<td><a href="#"> Delete <i class="fa fa-trash-o"></i></a></td>
					</tr>
					@endforeach
					</tbody>
				</table>
			@else
				No members found
			@endif
		</div>
	</div>
</div>

@endsection