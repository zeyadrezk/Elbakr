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
        <div class="pearnt-Register-account text-center">
            <img src="{{asset('mid')}}/images/logoo.png" alt="" class="Register-logo">
            <h2 class="mt-5">تسجيل حساب جديد</h2>
            <p>قم بإدخال بريدك الإكتروني لتسجيل حساب جديد</p>

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

            <form action="{{route('user.register')}}" method="post">
                @csrf
                <div class="d-flex align-items-center FORMINPUT mt-4 mb-2 justify-content-center">
                    <div>
                        <img src="{{asset('mid')}}/images/email.png" alt="">
                    </div>
                    <div>
                        <input name="email" type="email" placeholder="أدخل البريد الإلكتروني">
                    </div>
                </div>
                <div class="Access">
                    <button>تسجيل</button>
                </div>
            </form>
            <div class="pearnt-Send-code d-flex mt-5 justify-content-center align-items-center">
                <div class="send1">
                    <p>لديك حساب بالفعل</p>
                </div>
                <div class="px-5 send">
                    <a href="{{route('user.login')}}">
                        <p style="color: #035b97;">تسجيل الدخول <img src="{{asset('mid')}}/images/arrow.png" alt=""></p>
                    </a>
                </div>
            </div>
        </div>
    </div>


@endsection
