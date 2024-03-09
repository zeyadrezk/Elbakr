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
        <div class="pearntCopleteData text-center">
            <img src="{{asset('mid')}}/images/user2.png" alt="" class="user2">
            <h2 class="mt-4">إستكمال البيانات</h2>
            <p>قم بإستكمال بياناتك الشخصية لتتمكن من تسجيل حسابك</p>
            <form action="{{route('user.complete.register')}}" method="post">
                @csrf
                <input name="email" type="hidden" value="{{$email}}" >
                <input name="f_name" type="text" placeholder=" الاسم الأول " class="inputName">
                <input name="l_name" type="text" placeholder="  الاسم الأخير " class="inputName">
                <br>
                <input name="phone" type="text" placeholder=" رقم الجوال " class="inputNumber mt-2">
                <div class="pearnt-inputtt d-flex justify-content-center mt-2">
                    <input id="password" name="password" type="password" placeholder="  كلمة المرور">
                    <img id="togglePassword" src="{{asset('mid')}}/images/eye.png" alt="Toggle Password Visibility" onclick="togglePasswordVisibility('password', 'togglePassword')">
                </div>
                <div class="pearnt-inputtt d-flex justify-content-center mt-2">
                    <input id="confirm_password" name="password_confirmation" type="password" placeholder="  تأكيد كلمة المرور">
                    <img id="toggleConfirmPassword" src="{{asset('mid')}}/images/eye.png" alt="Toggle Confirm Password Visibility" onclick="togglePasswordVisibility('confirm_password', 'toggleConfirmPassword')">
                </div>
                <div class="Access">
                    <button>تأكيد</button>
                </div>
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
