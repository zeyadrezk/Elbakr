


<div class="modal fade" id="exampleModa2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="remove-account text-center">
                    <img src="{{asset('mid')}}/images/logoutt.png" alt="">
                    <h4>تسجيل الخروج</h4>
                    <p>هل أنت متأكد من تسجيل الخروج من حسابك ؟</p>
                    <form action="{{ route('user.logout') }}" method="POST">
                        @csrf <!-- CSRF Token for security -->
                        <button type="submit" class="to-be-sure">تأكيد تسجيل الخروج</button>
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

<div class="pearnt-DIVSFOOTER  mt-5" id="Connect-with-us">
    <div class="one_DIVSFOOTER">
        <img src="{{asset('mid')}}/images/logo.png" alt="">
        <p>
            هناك حقيقة مثيتة من ومن طويل وهي ان
            هناك حقيقة مثيتة من ومن طويل وهي ان
            هناك حقيقة مثيتة من ومن طويل وهي ان
            هناك حقيقة مثيتة من ومن طويل وهي ان
            هناك حقيقة مثيتة من ومن طويل وهي ان
        </p>
    </div>
    <div class="two_DIVSFOOTER px-5">
        <h4>روابط مهمه</h4>
        <p class="mt-4">من نحن</p>
        <p>المنتجات</p>
        <p>مستلزمات التكييف</p>
        <p>مشاريع الDUCT</p>
    </div>
    <div class="three_DIVSFOOTER mt-5">
        <p>أعمالنا</p>
        <p>أوجهة الألومنيوم</p>
        <p>سياسة الإستبدال و الإسترجاع</p>
        <p>الشروط والأحكام</p>
    </div>
    <div class="Four_DIVSFOOTER">
        <h4>تابعنا من خلال الروابط التالية</h4>
        <div class="icon-footer mt-5">
            <a href="#"><i class="fa-brands fa-x-twitter ICOS1"></i></a>
            <a href="#"><i class="fa-brands fa-snapchat ICOS2"></i></a>
            <a href="#"><i class="fa-brands fa-facebook ICOS3"></i></a>
            <a href="#"><i class="fa-brands fa-whatsapp ICOS4"></i></a>
            <a href="#"><i class="fa-brands fa-instagram ICOS5"></i></a>
        </div>
        <p class="mt-3">وسائل الدفعة المتاحة :</p>
        <img src="{{asset('mid')}}/images/pay logos.png" alt="">
    </div>
</div>
<div class="ATHR-COMPANY">
    <p>Copyright <a href="https://athr-sa.com/">
            ATHR</a> Company</p>
</div>
</footer>
<script src="{{asset('mid')}}/script.js"></script>
<script src="{{asset('mid')}}/js/bootstrap.bundle.min.js"></script>

<script>
    setTimeout(function() {
        document.querySelectorAll('.alert').forEach(function(alert) {
            alert.remove();
        });
    }, 10000); // 20 seconds
</script>

</body>

</html>
