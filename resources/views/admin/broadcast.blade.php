@extends('admin.layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		Ukarimu Group - Send broadcact to members
	</div>
	<div class="panel-body">
		<div class="list-group">
			<li class="list-group-item">
				Send out a broadcast
			</li>
			<li class="list-group-item">
				<form class="form-horizontal" method="post" action="{{ route('admin_members_save_broadcast') }}">
					<fieldset>
						<legend>Broadcast form</legend>
						<div class="form-group">
							{{ csrf_field() }}
							<label for="title" class="control-label col-md-4">Title:</label>
							<div class="col-md-8">
								<input type="text" class="form-control" name="title" id="title" placeholder="Title" required />
							</div>
						</div>
						<div class="form-group">
							<label for="Message" class="control-label col-md-4">Message:</label>
							<div class="col-md-8">
								<textarea id="message" name="message" rows="4" class="form-control" placeholder="Enter message here" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button class="btn btn-primary">Send</button>
							</div>
						</div>
					</fieldset>
				</form>
			</li>
		</div>
	</div>
	<div class="panel-footer">
		This broadcast will be send to all members. <span class="pull-right text-primary">Ukarimu Inc</span>
	</div>
</div>

@endsection