@extends('mid.layouts.master')

@section('content')

    <div class="container">
        <div class="pearnt-preference text-center">
            <h2>المفضلة</h2>
            <p>جميع منتجاتك المضافة إلي قائمة المفضلة</p>
            <img class="mt-5" src="{{asset('mid')}}/images/no fav.png" alt="">
            <p>لا توجد لديك منتجات بالمفضلة</p>
            <a href="{{route('user.home')}}"><button>تصفح المنتجات</button></a>
        </div>
    </div>


@endsection


