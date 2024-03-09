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
        <div class="pearnt-sign-in text-center">
            <img src="images/logoo.png" alt="">
            <h2>تسجيل الدخول</h2>
            <p>قم بإدخال بيانات حسابك لتسجيل الدخول</p>
            <div class="text-center">
                <form action="{{route('user.login')}}" method="post">
                    @csrf
                    <div class="d-flex align-items-center FORMINPUT mt-4 mb-2 justify-content-center">
                        <div>
                            <img src="{{asset('mid')}}/images/email.png" alt="">
                        </div>
                        <div>
                            <input name="email" type="email" placeholder="أدخل البريد الإلكتروني">
                        </div>
                    </div>
                    <div class="d-flex align-items-center FORMINPUTt justify-content-center">
                        <div class="email">
                            <img src="{{asset('mid')}}/images/pass.png" alt="">
                        </div>
                        <div>
                            <input id="password" name='password' type="password" placeholder="أدخل كلمة المرور">
                        </div>
                        <div class="eye" onclick="togglePasswordVisibility()">
                            <img src="{{asset('mid')}}/images/eye.png" alt="">
                        </div>
                    </div>
                    <a style="text-decoration: none;" href="{{route('user.forget.password')}}">
                        <p style="color: #000;" class="mt-3">هل نسيت كلمة المرور ؟</p></a>
                    <div class="Access">
                        <button type="submit">الدخول</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-50 m-auto account1 d-flex mt-3 justify-content-between mb-5">
            <div class="account">
                <p>ليس لديك حساب ؟</p>
            </div>
            <div class="Register-a-new-account d-flex">
                <div>
                    <a href="{{route('user.register')}}">
                        <p class="mt-1">تسجيل حساب جديد</p></a>
                </div>
                <div class="px-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('pushjs')
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        }
    </script>
@endsection
