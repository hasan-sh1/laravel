
{{--     @include('profile.hasan.index') --}}
<head>
<link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../assets/css/demo.css" />
</head>
@php
          $userPoints1 = DB::table('user_points')
              ->where('user_id', Auth::id())
              ->value('points');
      @endphp
                <div class="card" style="background-color: #233b66;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-white"   >متجر الكروت</h2>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>

                        <div class="alert alert-info" style="color: #e30505; background-color: #9fa9c0; font-weight: bold;">
                            points: <span>{{ $userPoints1 ?? 0 }}</span>
                        </div>

                        <div class="row">
                            @foreach (App\Models\Product::all() as $product)
                                <div class="col-md-2 mb-3">
                                    <div class="card h-100" style="background-color: #dedede; border-radius: 10px;">
                                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 225px; height: 200px; object-fit: cover;">
                                        
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $product->name }}</h5>
                                            <p class="card-text">{{ $product->description }}</p>
                                            <p class="card-text">السعر: {{ $product->price }} نقاط</p>
                                            <form action="{{ route('buyProduct', $product->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary">شراء</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        @if (session('message'))
                                      <div class="alert alert-success mt-4" style="color: #ffffff; font-weight: bold; background-color: #00d13b; border-radius: 10px;">
                                          {{ session('message') }}
                                      </div>
                                  @endif
                    </div>
                </div>
