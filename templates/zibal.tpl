{if $authService}
    <link rel="stylesheet" href="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.css">
    <script type="text/javascript"
            src="https://unpkg.com/@majidh1/jalalidatepicker/dist/jalalidatepicker.min.js"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="authentication-form mt-5">
                    <h2 class="text-center mb-4">فرم احراز هویت</h2>
                    <p class="text-center">با توجه به اینکه احراز هویت الزامی میباشد لطفا ابتدا احراز هویت نماید</p>
                    <form action="index.php?m=zibal&a=authentication/authenticate" method="post">
                        <div class="form-group text-right">
                            <label for="national_id">کد ملی</label>
                            <input type="text" class="form-control text-right" id="national_id" name="national_id" required>
                        </div>
                        <div class="form-group text-right">
                            <label for="birthdate">تاریخ تولد</label>
                            <input data-jdp type="text" placeholder="تاریخ را انتخاب کنید" class="form-control text-right" id="birthdate" name="birthdate" required>
                            <script>
                                $(document).ready(function () {
                                    $('#birthdate').focus(function () {
                                        jalaliDatepicker.startWatch({
                                            minDate: "attr",
                                            maxDate: "attr"
                                        });
                                    });
                                })

                            </script>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{else}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="authentication-form mt-5">
                    <h2 class="text-center mb-4">فرم احراز هویت</h2>
                    <p class="text-center">با توجه به اینکه احراز هویت الزامی میباشد لطفا ابتدا احراز هویت نماید</p>
                    <form action="index.php?m=zibal&a=authentication/authenticate" method="post">
                        <div class="form-group text-right">
                            <label for="national_id">کد ملی</label>
                            <input type="text" class="form-control text-right" id="national_id" name="national_id" required>
                        </div>
                        <input value="{{$mobile}}" type="hidden" class="form-control" id="mobile" name="mobile" required>
                        <button type="submit" class="btn btn-primary btn-block">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{/if}
