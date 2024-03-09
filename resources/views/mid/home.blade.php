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

    <div class="scroll-toop2">
    <a href="https://api.whatsapp.com/send/?phone=%2B966507870590&text&type=phone_number&app_absent=0"><i
        class="fa-brands fa-whatsapp"></i></a>
  </div>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('mid')}}/images/slider.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block text-header">
          <h2>كل ما تحتاجة من مكيفات</h2>
          <p>أصبح سهلا الآن وبين يديك فقط أطلب ما تحتاجه ونصله إليك</p>
          <a href="#Shop-now"><button>تسوق الآن</button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('mid')}}/images/slider.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block text-header">
          <h2>كل ما تحتاجة من مكيفات</h2>
          <p>أصبح سهلا الآن وبين يديك فقط أطلب ما تحتاجه ونصله إليك</p>
          <a href="#Shop-now"><button>تسوق الآن</button></a>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{asset('mid')}}/images/slider.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-md-block text-header">
          <h2>كل ما تحتاجة من مكيفات</h2>
          <p>أصبح سهلا الآن وبين يديك فقط أطلب ما تحتاجه ونصله إليك</p>
          <a href="#Shop-now"><button>تسوق الآن</button></a>
        </div>
      </div>
    </div>
  </div>
  <div class="paernt-I-listen">
    <div class="image-I-liste">
      <img src="{{asset('mid')}}/images/pic1.png" alt="">
    </div>
    <div class="text-I-liste">
      <h2>أستمتع بأمتع الأجواء</h2>
      <p>شركة البكر للمكيفات بحميع أنواعها </p>
    </div>
  </div>
  <div>
    <div class="pearnt-who-are-we">
      <div class="text-who-are-we text-center">
        <h3>من نحن</h3>
        <p>نبذة بسيطة عن الشركة</p>
        <img class="mt-5" src="{{asset('mid')}}/images/about.png" alt="">
        <p style="color: black; font-size: 14px;">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوي المقروء لصفحة ما سيلهي
          القاريء عن التركيز
          علي الشكل الخارجي للنص
          أو <br>شكل توضح الفقرات في الصفحة التي يقرأها إفتراضي هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوي المقروء
          لصفحة
          ما</p>
        <p style="color: rgb(193, 189, 189); font-size: 13px;">هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوي المقروء
          لصفحة
          ما سيلهي
          القاريء عن التركيز
          علي الشكل<br> الخارجي للنص
          أو شكل توضح الفقرات في الصفحة التي يقرأها إفتراضي هناك حقيقة مثبتة منذ زمن طويل <br> وهي أن المحتوي المقروء
          لصفحة
          ما</p>
        <a href="who-are-we.html">
          <button class="mt-4">تعرف علي المزيد</button></a>
      </div>
    </div>
    <div class="title-Products mt-5 text-center">
      <h3>المنتجات</h3>
      <p>عرض لجميع أنواع منتجاتنا</p>
    </div>
    <div class="container mt-5" id="Shop-now">
      <div class="pearnt-divs-Products">
        <div class="oneDevs-Products">
          <img src="{{asset('mid').$categories[0]->image}}" alt="">
          <h4 class="mt-5">{{$categories[0]->name}}</h4>
            <a href="{{ route('product.by.category', ['id' => $categories[0]->id]) }}" style="text-decoration: none; color: inherit;">
                <p>عرض المنتجات
                    <i class="fa-solid fa-arrow-left px-2" style="font-size: 13px;"></i>
                </p>
            </a>
        </div>
        <div class="TwoDevs-Products">
          <img src="{{asset('mid').$categories[1]->image}}" alt="">
          <h4 class="mt-5">{{$categories[1]->name}}</h4>
            <a href="{{ route('product.by.category', ['id' => $categories[1]->id]) }}" style="text-decoration: none; color: inherit;">
                <p>عرض المنتجات
                    <i class="fa-solid fa-arrow-left px-2" style="font-size: 13px;"></i>
                </p>
            </a>
        </div>
        <div class="THreeDevs-Products">
            <img src="{{asset('mid').$categories[2]->image}}" alt="">
            <h4 class="mt-5">{{$categories[2]->name}}</h4>
            <a href="{{ route('product.by.category', ['id' => $categories[2]->id]) }}" style="text-decoration: none; color: inherit;">
                <p>عرض المنتجات
                    <i class="fa-solid fa-arrow-left px-2" style="font-size: 13px;"></i>
                </p>
            </a>
        </div>
      </div>
      <div class="pearnt-divs-Products mt-4">
        <div class="FourDevs-Products">
            <img src="{{asset('mid').$categories[3]->image}}" alt="">
            <h4 class="mt-5">{{$categories[3]->name}}</h4>
            <a href="{{ route('product.by.category', ['id' => $categories[3]->id]) }}" style="text-decoration: none; color: inherit;">
                <p>عرض المنتجات
                    <i class="fa-solid fa-arrow-left px-2" style="font-size: 13px;"></i>
                </p>
            </a>
        </div>
        <div class="FiveDevs-Products">
            <img src="{{asset('mid').$categories[4]->image}}" alt="">
            <h4 class="mt-5">{{$categories[4]->name}}</h4>
            <a href="{{ route('product.by.category', ['id' => $categories[4]->id]) }}" style="text-decoration: none; color: inherit;">
                <p>عرض المنتجات
                    <i class="fa-solid fa-arrow-left px-2" style="font-size: 13px;"></i>
                </p>
            </a>
        </div>
        <div class="EndDevs-Products">
            <img src="{{asset('mid').$categories[5]->image}}" alt="">
            <h4 class="mt-5">{{$categories[5]->name}}</h4>
            <a href="{{ route('product.by.category', ['id' => $categories[5]->id]) }}" style="text-decoration: none; color: inherit;">
                <p>عرض المنتجات
                    <i class="fa-solid fa-arrow-left px-2" style="font-size: 13px;"></i>
                </p>
            </a>
        </div>
      </div>
    </div>
    <div class="container mt-5" id="best-seller">
      <div class="title-best-seller text-center">
        <h3>الأكثر مبيعا</h3>
        <p>أكثر منتجاتنا تحقيقا للمبيعات</p>
      </div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="pearnt-slide mt-5">
                        @foreach($chunks_products[0] as $product)
                            <div class="one-slide text-center">
                                <img src="{{asset('mid').$product->main_image}}" alt="">
                                <div class="text-end mt-5">
                                    <h5>
                                        {{$product->name}}
                                    </h5>
                                    <img src="{{asset('mid').$product->brand->image}}" alt="">
                                    <p>
                                        {{ Str::limit($product->description, 100) }}
                                    </p>
                                    <span>
                                  {{$product->price}}
                                        ر.س</span>
                                    <div class="pearnt-add-cart mt-4 d-flex align-items-center">
                                        <div>
                                            <button>
                                                <img src="{{asset('mid')}}/images/add to cart.png" alt=""> إضافةإلي عربةالتسويق
                                            </button>
                                        </div>
                                        <div class="px-4">
                                            <img src="{{asset('mid')}}/images/fav.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="carousel-item">
                    <div class="pearnt-slide mt-5">
                        @foreach($chunks_products[0] as $product)
                            <div class="one-slide text-center">
                                <img src="{{asset('mid').$product->main_image}}" alt="">
                                <div class="text-end mt-5">
                                    <h5>
                                        {{$product->name}}
                                    </h5>
                                    <img src="{{asset('mid').$product->brand->image}}" alt="">
                                    <p>
                                        {{ Str::limit($product->description, 100) }}
                                    </p>
                                    <span>
                                  {{$product->price}}
                                        ر.س</span>
                                    <div class="pearnt-add-cart mt-4 d-flex align-items-center">
                                        <div>
                                            <button>
                                                <img src="{{asset('mid')}}/images/add to cart.png" alt=""> إضافةإلي عربةالتسويق
                                            </button>
                                        </div>
                                        <div class="px-4">
                                            <img src="{{asset('mid')}}/images/fav.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="pearnt-slide mt-5">
                        @foreach($chunks_products[0] as $product)
                            <div class="one-slide text-center">
                                <img src="{{asset('mid').$product->main_image}}" alt="">
                                <div class="text-end mt-5">
                                    <h5>
                                        {{$product->name}}
                                    </h5>
                                    <img src="{{asset('mid').$product->brand->image}}" alt="">
                                    <p>
                                        {{ Str::limit($product->description, 100) }}
                                    </p>
                                    <span>
                                  {{$product->price}}
                                        ر.س</span>
                                    <div class="pearnt-add-cart mt-4 d-flex align-items-center">
                                        <div>
                                            <button>
                                                <img src="{{asset('mid')}}/images/add to cart.png" alt=""> إضافةإلي عربةالتسويق
                                            </button>
                                        </div>
                                        <div class="px-4">
                                            <img src="{{asset('mid')}}/images/fav.png" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>

        </div>
    </div>
    <div class="Show-more text-center">
      <a href="#"><button data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa-solid fa-plus"></i> طلب عرض سعر
        </button></a>
    </div>
    <div class="container mt-5" id="Aluminum-air-conditioning-vents">
      <div class="title-best-seller text-center">
        <h3>فتحات التكييف الألومنيوم</h3>
        <p>أكثر منتجاتنا تحقيقا للمبيعات</p>
      </div>
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
                <div class="pearnt-slide mt-5">
                    @foreach($chunks_Acc[0] as $product)
                        <div class="one-slide text-center">
                            <img src="{{asset('mid').$product->main_image}}" alt="">
                            <div class="text-end mt-5">
                                <h5>
                                    {{$product->name}}
                                </h5>
                                <img src="{{asset('mid').$product->brand->image}}" alt="">
                                <p>
                                    {{ Str::limit($product->description, 100) }}
                                </p>
                                <span>
                                  {{$product->price}}
                                        ر.س</span>
                                <div class="pearnt-add-cart mt-4 d-flex align-items-center">
                                    <div>
                                        <button>
                                            <img src="{{asset('mid')}}/images/add to cart.png" alt=""> إضافةإلي عربةالتسويق
                                        </button>
                                    </div>
                                    <div class="px-4">
                                        <img src="{{asset('mid')}}/images/fav.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
            </div>
          </div>
          <div class="carousel-item">
            <div class="pearnt-slide mt-5">
                @foreach($chunks_Acc[1] as $product)
                    <div class="one-slide text-center">
                        <img src="{{asset('mid').$product->main_image}}" alt="">
                        <div class="text-end mt-5">
                            <h5>
                                {{$product->name}}
                            </h5>
                            <img src="{{asset('mid').$product->brand->image}}" alt="">
                            <p>
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            <span>
                                  {{$product->price}}
                                        ر.س</span>
                            <div class="pearnt-add-cart mt-4 d-flex align-items-center">
                                <div>
                                    <button>
                                        <img src="{{asset('mid')}}/images/add to cart.png" alt=""> إضافةإلي عربةالتسويق
                                    </button>
                                </div>
                                <div class="px-4">
                                    <img src="{{asset('mid')}}/images/fav.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
          <div class="carousel-item">
            <div class="pearnt-slide mt-5">
                @foreach($chunks_Acc[2] as $product)
                    <div class="one-slide text-center">
                        <img src="{{asset('mid').$product->main_image}}" alt="">
                        <div class="text-end mt-5">
                            <h5>
                                {{$product->name}}
                            </h5>
                            <img src="{{asset('mid').$product->brand->image}}" alt="">
                            <p>
                                {{ Str::limit($product->description, 100) }}
                            </p>
                            <span>
                                  {{$product->price}}
                                        ر.س</span>
                            <div class="pearnt-add-cart mt-4 d-flex align-items-center">
                                <div>
                                    <button>
                                        <img src="{{asset('mid')}}/images/add to cart.png" alt=""> إضافةإلي عربةالتسويق
                                    </button>
                                </div>
                                <div class="px-4">
                                    <img src="{{asset('mid')}}/images/fav.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="Show-more text-center">
      <a href="#"><button data-bs-toggle="modal" data-bs-target="#exampleModal">
          <i class="fa-solid fa-plus"></i> طلب عرض سعر
        </button></a>
    </div>
    <div class="pearnt-DUCT">
      <div class="OneDivs_image_text container">
        <div class="image-Duct align-it">
          <div class="one-image-duct">
            <img src="{{asset('mid').$work_Duct[0]->image}}" alt="" class="topp">
          </div>
        </div>
        <div class="TEXT-DUCT text-center">
          <h2>أعمال ال DUCT</h2>
          <p>تعرف علي أعمال تمديدات الهواء التي نقدمها</p>
          <p class="mt-5 px-4" style="font-size: 13px;">
              {{$work_Duct[0] ->description}}
          </p>
          <a href="{{route('project.work.duct')}}"><button>
              عرض المزيد <i class="fa-solid fa-arrow-left px-2"></i>
            </button></a>
        </div>
      </div>
    </div>
    <div class="pearnt-DUCT-TOW TEXT-DUCTTT">
      <div class="OneDivs_image_text container">
        <div class="TEXT-DUCT text-center">
          <h2>أعمال الصيانة</h2>
          <p>تعرف علي أعمال الصيانة الخاصة بنا</p>
          <p class="mt-5 px-4" style="font-size: 13px;">
            {{$our_work[0] ->description}}
          </p>
          <a href="{{route('project.work.repair')}}"><button>
              عرض المزيد <i class="fa-solid fa-arrow-left px-2"></i>
            </button></a>
        </div>
        <div class="image-Duct">
          <div class="one-image-duct">
            <img src="{{asset('mid').$our_work[0]->image}}" alt="" class="topp">
          </div>
        </div>
      </div>
    </div>
    <div class="TITLE-Our-projects" id="Our-projects">
      <h2>مشاريعنا</h2>
      <p>تعرف علي مشاريعنا التي تم تنفيذها</p>
    </div>
    <div class="container">
      <div class="PEARNT-OUR-PROJECTS">
          @foreach($project_categories as $category)
        <div class="ONEDEVS-OUR-PROJECTS text-center">
          <img src="{{asset('mid').$category->image}}" alt="">
          <a href="{{route('project.index',['id'=>$category->id])}}">
            <h5 class="mt-5">
                {{$category->name}}
              <i class="fa-solid fa-arrow-left px-2"></i>
            </h5>
          </a>
        </div>
              @endforeach
      </div>
    </div>
    <div class="title-Our-branches text-center" id="Our-branches">
      <h2>فروعنا</h2>
      <p>تعرف علي مشاريعنا التي تم تنفيذها</p>
    </div>
    <div class="container">
      <div class="pearnt-Our-branches">
            @foreach($branches as $branch)
        <div class="onedivs-Our-branches">
          <img src="{{asset('mid').$branch->image}}" alt="">
          <p class="mt-3">
                {{$branch->name}}
          </p>
          <div class="d-flex">
            <div>
              <img src="{{asset('mid')}}/images/location.png" alt="">
            </div>
            <div>
              <p>العنوان</p>
            </div>
          </div>
          <p>

            {{$branch->location}}
          </p>
        </div>
                @endforeach
      </div>
    </div>
    <div class="title-Our-partners">
      <h2>شركاؤنا</h2>
      <p>تعرف علي شركاء شركة البكر</p>
    </div>
    <div class="container">
      <div class="pearnt-Our-partners">
        <div class="OneDIVS-Our-partners">
          <img src="{{asset('mid')}}/images/Group 176096.png" alt="">
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
