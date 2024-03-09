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
        <div class="pearnt-new-password">
            <img src="{{asset('mid')}}/images/password.png" alt="">
            <h2 class="mt-4">كلمة المرور الجديدة</h2>
            <p>قم بتعيين كلمة مرور جديدة الخاصة بحسابك</p>
            <form action="{{route('user.reset.password')}}" method="post">
                @csrf
                <input type="hidden" name="email" value="{{$email}}">
                <input type="hidden" name="otp" value="{{$otp}}">
                <div class="pearnt-inputtt d-flex justify-content-center mt-2">
                    <input id="password" name="password" type="password" placeholder="  كلمة المرور">
                    <img id="togglePassword" src="{{asset('mid')}}/images/eye.png" alt="Toggle Password Visibility" onclick="togglePasswordVisibility('password', 'togglePassword')">
                </div>
                <div class="pearnt-inputtt d-flex justify-content-center mt-2">
                    <input id="confirm_password" name="password_confirmation" type="password" placeholder="  تأكيد كلمة المرور">
                    <img id="toggleConfirmPassword" src="{{asset('mid')}}/images/eye.png" alt="Toggle Confirm Password Visibility" onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPassword')">
                </div>
                <button class="mt-3 certainly">تأكيد</button>
            </form>
        </div>
    </div>


@endsection
@section('pushjs')

    <script>
        function togglePasswordVisibility(inputId, toggleId) {
            var inputField = document.getElementById(inputId);
            var toggleImage = document.getElementById(toggleId);

            if (inputField.type === 'password') {
                inputField.type = 'text';
                toggleImage.src = "{{asset('mid')}}/images/eye.png"; // Change the image source to the image that hides the password
            } else {
                inputField.type = 'password';
                toggleImage.src = "{{asset('mid')}}/images/eye.png"; // Change the image source to the image that hides the password
            }
        }
    </script>



@endsection


