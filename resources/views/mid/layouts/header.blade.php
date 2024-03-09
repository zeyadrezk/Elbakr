<body>
<section id="header">
    <a href="{{route('user.home')}}"><img src="{{asset('mid')}}/images/logo.png" class="logooo" alt=""></a>
    <div>
        <ul id="navbar">
            <li><a href="{{route('user.home')}}#who-are-we">عن الشركة</a></li>
            <li><a href="{{route('user.home')}}#best-seller">الأكثر مبيعا</a></li>
            <li><a href="{{route('user.home')}}#Aluminum-air-conditioning-vents">
                    فتحات التكييف الألومنيوم</a></li>
            <div class="dropdown">
                <button style="color: #fff;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton4"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    أعمالنا
                </button>
                <ul style="border-radius: 20px;" class="dropdown-menu dropdown-menu-dark"
                    aria-labelledby="dropdownMenuButton4">
                    <li><a class="dropdown-item" href="{{route('project.work.duct')}}">أعمال ال DUCT</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{route('project.work.repair')}}">أعمال الصيانة</a></li>
                </ul>
            </div>
            <li><a href="{{route('user.home')}}#Our-projects">مشاريعنا</a></li>
            <li><a href="{{route('user.home')}}#Our-branches">فروعنا</a></li>
            <li><a href="{{route('user.home')}}#Connect-with-us">تواصل معنا</a></li>

            <a href="#" id="close"><i class="fa-solid fa-circle-xmark"></i></a>
        </ul>
    </div>
    <div class="searchBox">
        <div class="search-Toggle">
            <i class="fa-solid fa-x cancel"></i>
            <i class="fa-solid fa-magnifying-glass search"></i>
        </div>
        <div class="search-field">
            <input type="text" placeholder=" بحث ...">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </div>
    <div class="cart">
        <a href="Car-marketing.html">
            <i class="fa-solid fa-cart-shopping"></i></a>
    </div>

{{--    check authed--}}
    @auth
        <div class="dropdown">
            <button style="border: 1px solid #fff; border-radius: 30px; color: #fff; font-size: 9px;"
                    class="btn dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown"
                    aria-expanded="false">
                مرحبا.أحمد مسعد
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2" style="font-size: 12px; text-align: start;">
                <a style="text-decoration: none;" href="preference.html">
                    <li>
                        <button class="dropdown-item" type="button">
                            <img src="{{asset('mid')}}/images/favv.png" alt=""> المفضله
                        </button>
                    </li>
                </a>
                <a style="text-decoration: none;" href="My-requests.html">
                    <li>
                        <button class="dropdown-item" type="button">
                            <img src="{{asset('mid')}}/images/requests.png" alt=""> طلباتي
                        </button>
                </a>
                </li>
                <a style="text-decoration: none;" href="{{route('user.profile')}}">
                    <li>
                        <button class="dropdown-item" type="button">
                            <img src="{{asset('mid')}}/images/edit data.png" alt=""> تعديل بياناتي
                        </button>
                    </li>
                </a>
                <a style="text-decoration: none;" href="{{route('user.change.password')}}">
                    <li>
                        <button class="dropdown-item" type="button">
                            <img src="{{asset('mid')}}/images/edit pass.png" alt=""> تغيير كلمة المرور
                        </button>
                    </li>
                </a>
                <a style="text-decoration: none;" href="Saved-addresses.html">
                    <li>
                        <button class="dropdown-item" type="button">
                            <img src="{{asset('mid')}}/images/locations.png" alt=""> العناوين المحفوظه
                        </button>
                    </li>
                </a>
                <li>
                    <button data-bs-toggle="modal" data-bs-target="#exampleModa2" class="dropdown-item" type="button"
                            style="color: red;">
                        <img src="{{asset('mid')}}/images/logout.png" alt=""> تسجيل الخروج
                    </button>
                </li>
            </ul>
        </div>
        <div id="mobile">
            <i id="bar" class="fas fa-outdent"></i>
        </div>
    @endauth


{{--    check guest--}}
    @guest
        <div class="USERDIVS">
            <a href="{{route('user.login.form')}}">
                <button>
                    <i class="fa-solid fa-user USER px-2"></i> تسجيل الدخول
                </button>
            </a>
        </div>
        <div class="USERDIVS2">
            <a href="{{route('user.login.form')}}"><i class="fa-solid fa-user"></i></a>
        </div>
    @endguest

    <div id="mobile">
        <i id="bar" class="fas fa-outdent"></i>
    </div>
</section>
