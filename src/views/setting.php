<style>
    /* Custom styles for this template */
    .navbar-mini {
        background-color: #f8f9fa;
        padding: 10px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        direction: rtl;
    }

    .navbar-mini-nav {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .navbar-mini-nav-item {
        margin-right: 15px;
    }

    .navbar-mini-nav-link {
        text-decoration: none;
        color: #333;
        font-size: 20px;
    }

    .navbar-mini-nav-link:hover {
        color: #007bff;
    }
    .active{
        color: #007bff;
    }
</style>

<nav class="navbar-mini">
    <ul class="navbar-mini-nav" id="navbar-mini-nav">
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link" href="addonmodules.php?module=zibal">داشبورد</a></li>
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link" href="addonmodules.php?module=zibal&action=zibal/user">لیست کاربران</a></li>
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link active" href="addonmodules.php?module=zibal&action=zibal/setting">تنظیمات</a></li>
    </ul>
</nav>
<hr>
<form style="direction: rtl" class="" method="post"
      action="addonmodules.php?module=zibal&action=zibal/setting">

    <div class="row">
        <div class="col-md-9">
            <div class="col-md-10">
                <div class="form-check form-check-inline">
                    <input <?php  if($setting['authService'] == 'shahkarInquiry') { echo 'checked';}?> class="form-check-input" type="radio" name="authService" value="shahkarInquiry">
                    <label class="form-check-label"> شاهکار</label>
                </div>
                <hr>
            <div class="form-check form-check-inline">
                <input <?php  if($setting['AfterLogin'] == 'on') { echo 'checked';}?> class="form-check-input" type="radio" name="AfterLogin" value="on">
                <label class="form-check-label">فعال</label>
            </div>
                <hr>

            <div class="form-check form-check-inline">
                <input disabled <?php  if($setting['BeforeRegister'] == 'on') { echo 'checked';}?> class="form-check-input" type="radio" name="BeforeRegister" value="on">
                <label class="form-check-label">فعال</label>
            </div>
            </div>

            <div class="col-md-2">

                <div class="form-check form-check-inline">
                    <input <?php  if($setting['authService'] == 'nationalIdentityInquiry') { echo 'checked';}?> class="form-check-input" type="radio" name="authService" value="nationalIdentityInquiry">
                    <label class="form-check-label"> اطلاعات هویتی</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input <?php  if($setting['AfterLogin'] == 'off') { echo 'checked';}?> class="form-check-input" type="radio" name="AfterLogin" value="off">
                    <label class="form-check-label">غیر فعال</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input disabled <?php  if($setting['BeforeRegister'] == 'off') { echo 'checked';}?> class="form-check-input" type="radio" name="BeforeRegister" value="off">
                    <label class="form-check-label">غیر فعال</label>
                </div>
            </div>
        </div>
        <div class="col-md-3">


            <label for="">
                نوع احراز هویت
            </label>
            <hr>
            <label for="">
                بررسی احراز هویت کاربر بعد از ورود
            </label>
            <hr>
            <label for="">
                فعال شدن افزونه پیش از ثبت نام
            </label>
        </div>

    </div>

    <hr>
    <div class="row">
        <button class="btn btn-success" style="margin-right: 10px" name="step2">ثبت</button>

    </div>
</form>
