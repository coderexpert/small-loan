@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="list-group center-block">
                        <li class="list-group-item">
                            <p class="text-center">
                                <strong> Hello {{ \Auth::user()->name }}</strong>
                            </p>
                        </li>
                        <a class="list-group-item text-success" href="{{ route('member_contribution') }}">
                            <span class="">View monthly contributions</span>
                            <span class="pull-right">Make contribution</span>
                        </a>
                        <li class="list-group-item">
                            <form class="form-horizontal" method="post" action="{{ route('member_apply_loan') }}">
                                <fieldset>
                                    <legend>Apply loan</legend>
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="amount" class="control-label col-md-4">Amount</label>
                                        <div class="col-md-8">
                                            <input type="number" id="amount" name="amount" class="form-control" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-success btn-block">Apply now</button>
                                        </div>        
                                    </div>
                                </fieldset>
                            </form>
                        </li>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            @if(count($errors))
                                errors
                            @endif
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="list-group">
                        Terms and conditions apply. Strictly not to be abused.
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="text-center">Ukarimu Inc</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="text-center">My Loans</div>
                </div>
                <div class="panel-body">
                    @if(count($loans))
                        <table class="table table-bordered">
                        <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                        @foreach($loans as $loan)

                            <tr>
                                <td>{{ $loan->created_at->toDayDateTimeString() }}</td>
                                <td>{{ $loan->amount }}</td>
                                <td>{{ ($loan->status) ? 'Approved' : 'Not Approved' }}</td>
                            </tr>
                        @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-center text-primary">You have no loans</div>
                    @endif
                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
