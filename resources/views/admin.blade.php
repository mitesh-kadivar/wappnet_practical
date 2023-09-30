@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <select class="form-select col-md-6" aria-label="Default select example" id="filter-select">
                        <option selected value="">Filter by category</option>
                        <option value="1" {{ ( collect(request()->segments())->last() == 1) ? 'selected' : '' }}>Electric</option>
                        <option value="2" {{ ( collect(request()->segments())->last() == 2) ? 'selected' : '' }}>Vehicle</option>
                        <option value="3" {{ ( collect(request()->segments())->last() == 3) ? 'selected' : '' }}>Fruits</option>
                    </select>

                    <br>
                    <h5 class="text-center">View all products</h5><hr>
                    <div class="col">
                        <div class="row">
                            @forelse($products as $product)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="{{URL::asset("/images/".$product->image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="#" title="View Product">{{ $product->name }}</a></h4>
                                        <p class="font-italic text-muted mb-0 small float-right">- {{ $product->category->name }}</p>
                                        <br>
                                        <p class="card-text">{{ $product->description }}</p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-danger btn-block">$ {{ $product->price }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                <span colspan="5" class="text-center">Product records not found</span>
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

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {
        $('#filter-select').on('change', function(){
        var id = $('#filter-select').val();
        var url = '{{ url("/admin/dashboard/:id") }}';
        url = url.replace(':id', id);
        window.location.href = url;
        });
    });
</script>

@endsection