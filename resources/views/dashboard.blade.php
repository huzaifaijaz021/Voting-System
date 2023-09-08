@extends('layouts.app')
@section('title'){{'Dashboard'}} @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>{{ __('Welcome to a Poll System Dashboard Created by :name', ['name' => $userdata->name]) }}</div>
                    <div>{{ __('Total Votes: :vote', ['vote' => $votecount[0]]) }}</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
