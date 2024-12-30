@extends('layouts.app')

@section('content')
<div class="container">
    <h2>العناصر الخاصة بي</h2>
    
    <div class="row">
        @foreach($items as $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">{{ $item->description }}</p>
                        
                        <button type="button" 
                                class="btn btn-primary" 
                                data-bs-toggle="modal" 
                                data-bs-target="#exchangeModal{{ $item->id }}">
                            تبادل العنصر
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 