@extends('mid.layouts.master')

@section('content')

    <div class="THE-WORK-TITLE">
        <h2>
            {{$title}}
        </h2>
        <p>
            {{$description}}
        </p>
        <a href="#">
            <button data-bs-toggle="modal" data-bs-target="#exampleModal">
                + طلب عرض سعر
            </button>
        </a>
    </div>
    <div class="container">
        <div class="PEARNT-THE-WORK mb-5">
            <div class="ONE-DIVS-THE-WORK">
                <div class="IMAGE-THE-WORK mb-3">
                    <img src="{{asset('mid').$works[0]->image}}" alt="">
                </div>

                <div class="IMAGE-THE-WORK">
                    <img src="{{asset('mid').$works[1]->image}}" alt="">
                </div>
            </div>
            <div class="TXEXT-THE-WORK text-center">
                <p class="mt-5 px-4" style="font-size: 13px;">

                    {{$works[0]->description}}
                    </p>
                <br>
                <p class="px-4" style="font-size: 13px;">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوي المقروء لصفحة ما
                    {{$works[1]->description}}
                </p>
            </div>

        </div>
        <div class="PEARNT-THE-WORK mb-5">
            <div class="TXEXT-THE-WORK text-center">
                <p class="mt-5 px-4" style="font-size: 13px;">
                    {{$works[2]->description}}

                </p>
                <br>
                <p class="px-4" style="font-size: 13px;">
                    {{$works[3]->description}}

                </p>
            </div>
            <div class="ONE-DIVS-THE-WORK">
                <div class="IMAGE-THE-WORK mb-3">
                    <img src="{{asset('mid').$works[2]->image}}" alt="">
                </div>
                <div class="IMAGE-THE-WORK">
                    <img src="{{asset('mid').$works[3]->image}}" alt="">
                </div>
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

