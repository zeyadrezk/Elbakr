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
        <div class="pearnt-Forgot-password text-center">
            <img src="{{asset('mid')}}/images/email2.png" alt="">
            <h2 class="mt-3">هل نسيت كلمةالمرور ؟</h2>
            <p>قم بإدخال بريدك الإكتروني لإرسال كود التحقق</p>
            <form action="{{route('user.send.otp.password')}}" >
                <div class="d-flex align-items-center FORMINPUT mt-4 mb-2 justify-content-center">
                    <div>
                        <img src="{{asset('mid')}}/images/email.png" alt="">
                    </div>
                    <div>
                        <input name="email" type="text" placeholder="أدخل البريد الإلكتروني">
                    </div>
                </div>
                <div class="Access">
                    <button>إرسال</button>
                </div>
            </form>
        </div>
    </div>


@endsection

