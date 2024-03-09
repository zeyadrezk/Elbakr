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
        <div class="pearnt-validation text-center">
            <img src="{{asset('mid')}}/images/verify.png" alt="">
            <h2 class="mt-5">كود التحقق</h2>
            <p>قم بكتابة كود التحقق المكون من 5 أرقام الذي تم <br>
                إرساله إليك عبر البريد الإكتروني </p>
            <p>{{$email}}</p>
        </div>
        <form action="{{route('user.check.otp')}}" method="post">
            @csrf
            <div class="input-validation text-center" style="align-items: center; text-align: center;" dir="ltr">
                <input  name="n1" type="text" minlength="1" maxlength="1" style="text-align: center;" required>
                <input name="n2" type="text" minlength="1" maxlength="1" style="text-align: center;" required>
                <input name="n3" type="text" minlength="1" maxlength="1" style="text-align: center;" required>
                <input name="n4" type="text" minlength="1" maxlength="1" style="text-align: center;" required>
                <input name="n5" type="text" minlength="1" maxlength="1" style="text-align: center;" required>
                <input type="hidden" name="email" value="{{$email}}">
                <br>
                <button type="submit" class="mt-3">تحقق</button>
            </div>
        </form>
        <div class="pearnt-Send-code d-flex mt-5 justify-content-center align-items-center">
            <div class="send1">
                <p>لم يتم إرسال كود التحقق ؟</p>
            </div>
            <div class="px-5 send">
                <a href="{{ route('user.send.otp',['email'=>$email]) }}">
                    <p>إرسال الكود مرة أخرى <img src="{{asset('mid')}}/images/resend.png" alt=""></p>
                </a>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            var inputs = document.querySelectorAll('input[type="text"]');

            // Add event listeners to each input field
            inputs.forEach(function(input, index) {
                input.addEventListener('input', function() {
                    if (index < inputs.length - 1 && input.value.length === 1) {
                        inputs[index + 1].focus();
                    }
                });

                input.addEventListener('keydown', function(event) {
                    if (index > 0 && event.keyCode === 8 && input.value.length === 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
        };
    </script>

@endsection
