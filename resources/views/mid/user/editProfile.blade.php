@extends('mid.layouts.master')

@section('content')

    <div class="container">
        <div class="pearntCopleteData text-center">
            <h2 class="mt-4 BEFOR">تعديل بياناتي </h2>
            <p>يمكنك تعديل بياناتك الشخصية</p>
            <form action="{{route('user.edit.profile')}}">
                <input name="f_name" type="text" placeholder="{{$user->f_name}}" class="inputName">
                <input name="l_name" type="text" placeholder="{{$user->l_name}} " class="inputName">
                <br>
                <input name="email" type="text" placeholder="{{$user->email}}" class="inputNumber mt-2" readonly>
                <br>
                <input name="phone" type="text" placeholder="{{$user->phone}} " class="inputNumber mt-2">
                <div class="Access">
                    <button>حفظ التعديلات</button>
                </div>
                <div class="delete-account m-auto mt-5 d-flex">
                    <div class="mt-2">
                        <img src="{{asset('mid')}}/images/delete.png" alt="">
                    </div>
                    <div class="px-3 mt-1 text-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <p><span>حذف الحساب</span><br>
                            يمكنك حذف حسابك نهائيا من الموقع وحذف جميع البيانات المتعلقة بالحساب</p>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="remove-account text-center">
                            <img src=" {{asset('mid')}}/images/delete.png" alt="">
                            <h4>حذف الحساب</h4>
                            <p>هل أنت متأكد من حذف حسابك بالموقع ؟</p>
                            <form action="{{ route('user.delete.account') }}" method="POST">
                                @csrf
                                <button class="to-be-sure">تأكيد حذف الحساب</button>
                            </form>
                            <br>
                            <button class="mt-2 CLOSEE" data-bs-dismiss="modal" aria-label="Close">
                                <img src="{{asset('mid')}}/images/exit.png" alt=""> إغلاق
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


