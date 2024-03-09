@extends('mid.layouts.master')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show custom-alert" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show custom-alert" role="alert">

            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="title-filter">
            <div>
                <h2>{{$category->name ?? "مكيف"}}</h2>
            </div>
            <div>
                <a href="#">
                    <button data-bs-toggle="modal" data-bs-target="#exampleModal">
                        + طلب عرض سعر
                    </button>
                </a>
            </div>
        </div>
        <div class="FILTERAND-DIVS">
            <div class="PEARNT-FILTER">
                <div class="d-flex mt-3">
                    <div>
                        <img src="{{asset('mid')}}/images/filter.png" alt="">
                    </div>
                    <div class="px-3">
                        <p>فلتر النتائج</p>
                    </div>
                </div>
                <div>
                    <p style="color: #a8a8a8;">حسب النوع</p>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2413.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2414.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2415.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2416.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2417.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2418.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2419.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2420.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2421.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2422.png" alt="">
                    </div>
                </div>
                <div class="d-flex mt-3 align-items-center">
                    <div>
                        <input type="checkbox" class="mt-2">
                    </div>
                    <div class="px-3">
                        <img src="{{asset('mid')}}/images/Mask Group 2423.png" alt="">
                    </div>
                </div>
                <hr style="width: 80%; height: 3px; color: #a8a8a8;">
                <div>
                    <p style="color: #a8a8a8; font-weight: bold; font-size: 13px;">حسب المبيعات</p>
                </div>
                <div class="d-flex mt-3">
                    <div>
                        <input type="checkbox">
                    </div>
                    <div class="px-3">
                        <p style="font-size: 13px;">المنتجات الأكثر مبيعا</p>
                    </div>
                </div>
                <hr style="width: 80%; height: 3px; color: #a8a8a8;">
                <div>
                    <p style="color: #a8a8a8; font-weight: bold; font-size: 13px;">حسب السعر</p>
                </div>
                <div class="d-flex mt-3">
                    <div>
                        <input type="checkbox">
                    </div>
                    <div class="px-3">
                        <p style="font-size: 13px;"> من الأقل إلي الأعلي سعرا</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <input type="checkbox">
                    </div>
                    <div class="px-3">
                        <p style="font-size: 13px;"> من الأعلي إلي الأقل سعرا</p>
                    </div>
                </div>
                <hr style="width: 80%; height: 3px; color: #a8a8a8;">
                <div>
                    <p style="color: #a8a8a8; font-weight: bold; font-size: 13px;">حسب السعر</p>
                </div>
                <div class="d-flex">
                    <div>
                        <input type="checkbox">
                    </div>
                    <div class="px-3">
                        <p style="font-size: 13px;"> من الأعلي إلي الأقل تقييما</p>
                    </div>
                </div>
                <div class="d-flex">
                    <div>
                        <input type="checkbox">
                    </div>
                    <div class="px-3">
                        <p style="font-size: 13px;"> من الأقل إلي الأقل تقييما</p>
                    </div>
                </div>
            </div>
            <div class="PEARRNT-DIVS-CARD1">
                <div class="PEARRNT-DIVS-CARD">
                    @foreach($products as $product)
                        <div class="ONE-DIVSCARD">
                            <img src="{{asset('mid').$product->main_image}}" alt="" class="ONE-DIVSCARD-IMG">
                            <h6 class="mt-5">مكيف جداري جري 1.5 حصان</h6>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <img src="{{asset('mid').$product->brand->image}}" alt="">
                                </div>
                                <div>
                                    <img src="{{asset('mid').$product->brand->image}}" alt="">
                                </div>
                            </div>
                            <div class="mt-2">
                                <p style="color: #a8a8a8; font-size: 11px;white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{$product->description}}
                                </p>
                                <p style="margin-top: -15px; color: rgb(209, 180, 15);">{{$product->price}} ر.س</p>
                            </div>
                            <div class="ONE-DIVSCARD-BTN mt-4 d-flex align-items-center">
                                <div>
                                    <button>
                                        <img src="{{asset('mid')}}/images/add to cart.png" alt=""> إضافةإلي عربةالتسويق
                                    </button>
                                </div>
                                <div class="px-4">
                                    <img src="{{asset('mid')}}/images/fav.png" alt="">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            {{$products->links()}}
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="Request-a-price">
                        <form action="{{route('ask.price.create')}}" method="post">
                            @csrf
                        <h2>طلب عرض سعر</h2>
                        <p>يمكنك إرسال طلب عرض سعر خاص</p>
                        <input name="f_name" type="text" placeholder=" الأسم الأول" class="Request-a-price-1 mt-3">
                        <input name="l_name" type="text" placeholder=" الأسم الأخير" class="Request-a-price-1 mt-3">
                        <br>
                        <input name="email" type="email" placeholder=" البريد الإكتروني" class="Request-a-price-2 mt-3">
                        <br>
                        <input name="phone" type="text" placeholder=" رقم الجوال" class="Request-a-price-2 mt-3">
                        <br>
                        <select name="ask_category_id" id="" class="Request-a-price-2 m-3">
                            @foreach($ask_categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <textarea class="Request-a-price-3" name="message" id="" placeholder=" نص الرسالة"></textarea>
                        <br>
                        <button class="Btn-SSEND mt-3" type="submit">إرسال</button>
                        <br>
                        </form>
                        <button class="mt-2 CLOSEE" data-bs-dismiss="modal" aria-label="Close">
                            <img src="{{asset('mid')}}/images/exit.png" alt=""> إغلاق
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

