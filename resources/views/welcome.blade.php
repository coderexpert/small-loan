@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="jumbotron col-md-8">
                <h2>Welcome to Ukarimu selfhelp group</h2>
                <p>Empowering society</p>
            </div>
            <div class="col-md-4">
                <div class="list-group">
                    <li class="list-group-item">
                        <div class="panel-footer"><h4>What we do</h4></div>
                    </li>
                    <li class="list-group-item">Member loans management</li>
                    <li class="list-group-item">Member monthly contributions management</li>
                    <li class="list-group-item">Members record keeping</li>
                    <a href="{{ route('register') }}" class="list-group-item">Join today!</a>
                </div>
            </div>                    
            </div>
    </div>
@endsection