{{-- @include('profile.hasan.index') --}}

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
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #233b66;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="text-white" >مشترياتي</h2>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> العودة
                            </a>
                        </div>

                        <div class="row">
                            @if($purchases->count() > 0)
                                @foreach ($purchases as $purchase)
                                    <div class="col-md-2 mb-3">
                                        <div class="card h-100">
                                            <img src="{{ asset($purchase->product->image) }}" class="card-img-top" alt="{{ $purchase->product->name }}" style="width: 225px; height: 200px; object-fit: cover;">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $purchase->product->name }}</h5>
                                                <p class="card-text">تم الشراء: {{ $purchase->created_at->format('Y-m-d') }}</p>
                                                <form action="{{ route('deletePurchase', $purchase->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        حذف واسترجاع النقاط
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <div class="alert alert-info" style="color: #e30505; background-color: #9fa9c0; font-weight: bold;">
                                        لا توجد مشتريات حتى الآن
                                    </div>
                                </div>
                            @endif
                        </div>
                        @if (session('message'))
                                      <div class="alert alert-success mt-4" style="color: #ffffff; font-weight: bold; background-color: #00d13b; border-radius: 10px;">
                                          {{ session('message') }}
                                      </div>
                                  @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
