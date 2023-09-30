@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Dashboard') }}
                </div>
                <div class="card-header">
                    {{ __('Cart') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary float-right" href="{{ url()->previous() }}"> Back</a>

                    <br>
                    <h5>My orders</h5>
                    <div class="col">
                        <div class="row">
                            @forelse($orders as $order)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{URL::asset("/images/".$order->product->image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#" title="View Product">{{ $order->product->name }}</a></h4>
                                        <p class="font-italic text-muted mb-0 small float-right">{{ $order->product->category->name }}</p>
                                        <br>
                                        <p class="card-text">{{ $order->product->description }}</p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-success btn-block">$ {{ $order->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <span colspan="5" class="text-center">Empty your bucket</span>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_scripts')
@endsection
