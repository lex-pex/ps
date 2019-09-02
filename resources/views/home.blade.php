@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 p-0 m-0">
            <div class="card bg-light">
                <div class="card-header">Dashboard</div>
                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @yield('feed')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection