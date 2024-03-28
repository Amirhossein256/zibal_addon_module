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
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link active" href="addonmodules.php?module=zibal">داشبورد</a></li>
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link" href="addonmodules.php?module=zibal&action=zibal/user">لیست کاربران</a></li>
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link" href="addonmodules.php?module=zibal&action=zibal/setting">تنظیمات</a></li>
    </ul>
</nav>
<hr>
<h1 class="text-center">ماژول احراز هویت کاربران</h1>
<style>
    .small-box {
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        display: inline-block;
        margin-bottom: 20px;
        overflow: hidden;
        width: 33%; /* اندازه عرض */
        background-color: #f8f9fa; /* رنگ پس‌زمینه قسمت اصلی */
        direction: rtl !important;
        text-align: right !important;
    }

    .small-box .inner {
        padding: 8px; /* فاصله داخلی */
        text-align: center;

    }

    .small-box h3 {
        margin-top: 0;
        font-size: 18px; /* اندازه فونت */
    }

    .small-box p {
        margin-bottom: 0;
        font-size: 14px; /* اندازه فونت */
    }

</style>
<div class="small-box bg-success-gradient">
    <div class="inner center-aline text-center">
        <h3><?php echo $userCount?></h3>
        <p>تعداد کاربران احراز هویت شده</p>
    </div>
</div>

