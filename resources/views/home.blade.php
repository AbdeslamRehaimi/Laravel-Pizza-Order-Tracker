@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="title m-b-md">
                    Laravel
                    <b>Boite</b>Pizza
                </div>

                <div class="links">
                    <a href="{{ url('/admin') }}">BackPack</a>
                    <a href="{{ url('/products') }}">FronteEnd</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
