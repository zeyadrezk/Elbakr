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
        <div class="pearntChangePassword text-center">
            <h2>تغيير كلمة المرور</h2>
            <p>يمكنك تغيير كلمة المرور الخاصة بحسابك</p>
        </div>
        <form action="{{route('user.update.password')}}" method="post">
            @csrf
            <div class="input-new-password d-flex justify-content-center mt-5">
                <div>
                    <input name="current_password" type="password" placeholder=" كلمة المرور الحالية">
                </div>
                <div>
                    <img src="{{asset('mid')}}/images/eye.png" alt="">
                </div>
            </div>
            <a style="text-decoration: none;" href="{{route('user.forget.password')}}">
                <p class="text-center" style="font-size: 12px; margin-top: 10px;">
                    هل نسيت كلمة المرور ؟</p>
            </a>
            <div class="input-new-password d-flex justify-content-center mt-4">
                <div>
                    <input name="password" type="password" placeholder="  كلمة المرور الجديدة">
                </div>
                <div>
                    <img src="{{asset('mid')}}/images/eye.png" alt="">
                </div>
            </div>
            <div class="input-new-password d-flex justify-content-center mt-2">
                <div>
                    <input name="password_confirmation" type="password" placeholder=" تأكيد كلمة المرور الجديدة">
                </div>
                <div>
                    <img src="{{asset('mid')}}/images/eye.png" alt="">
                </div>
            </div>
            <div class="text-center">
                <button class=" mt-3 BTNCHNANGE">حفظ كلمة المرور الجديدة</button>
            </div>
        </form>
    </div>


@endsection


