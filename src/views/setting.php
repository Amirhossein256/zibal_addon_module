<hr>
<h1 style="direction: rtl"> تنظیمات ماژول احراز هویت</h1>
<hr>
<form style="direction: rtl" class="" method="post"
      action="addonmodules.php?module=zibal&action=zibal/setting">

    <div class="row">
        <div class="col-md-9">
            <div class="col-md-10">


                <div class="form-check form-check-inline">
                    <input <?php  if($setting['shahkarInquiry'] == 'on') { echo 'checked';}?> class="form-check-input" type="radio" name="shahkarInquiry" value="on">
                    <label class="form-check-label">فعال</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input <?php  if($setting['nationalIdentityInquiry'] == 'on') { echo 'checked';}?> class="form-check-input" type="radio" name="nationalIdentityInquiry" value="on">
                    <label class="form-check-label">فعال</label>
                </div>
                <hr>

            <div class="form-check form-check-inline">
                <input <?php  if($setting['AfterLogin'] == 'on') { echo 'checked';}?> class="form-check-input" type="radio" name="AfterLogin" value="on">
                <label class="form-check-label">فعال</label>
            </div>
                <hr>

            <div class="form-check form-check-inline">
                <input <?php  if($setting['BeforeRegister'] == 'on') { echo 'checked';}?> class="form-check-input" type="radio" name="BeforeRegister" value="on">
                <label class="form-check-label">فعال</label>
            </div>
            </div>

            <div class="col-md-2">

                <div class="form-check form-check-inline">
                    <input <?php  if($setting['shahkarInquiry'] == 'off') { echo 'checked';}?> class="form-check-input" type="radio" name="shahkarInquiry" value="off">
                    <label class="form-check-label">غیر فعال</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input <?php  if($setting['nationalIdentityInquiry'] == 'off') { echo 'checked';}?> class="form-check-input" type="radio" name="nationalIdentityInquiry" value="off">
                    <label class="form-check-label">غیر فعال</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input <?php  if($setting['AfterLogin'] == 'off') { echo 'checked';}?> class="form-check-input" type="radio" name="AfterLogin" value="off">
                    <label class="form-check-label">غیر فعال</label>
                </div>
                <hr>
                <div class="form-check form-check-inline">
                    <input <?php  if($setting['BeforeRegister'] == 'off') { echo 'checked';}?> class="form-check-input" type="radio" name="BeforeRegister" value="off">
                    <label class="form-check-label">غیر فعال</label>
                </div>
            </div>


        </div>
        <div class="col-md-3">


            <label for="">
                سرویس شاهکار
            </label>
            <hr>
            <label for="">
                سرویس اطلاعات هویتی
            </label>
            <hr>
            <label for="">
                فعال شدن افزونه پیش از ثبت نام
            </label>
            <hr>
            <label for="">
                بررسی احراز هویت کاربر بعد از ورود
            </label>
        </div>

    </div>

    <hr>
    <div class="row">
        <button class="btn btn-success" style="margin-right: 10px" name="step2">ثبت</button>

    </div>
</form>
