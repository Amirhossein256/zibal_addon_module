<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
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

    .active {
        color: #007bff;
    }

    #table-container {
        width: 80%;
        margin: 50px auto;
        direction: rtl;
    }
</style>

<nav class="navbar-mini">
    <ul class="navbar-mini-nav" id="navbar-mini-nav">
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link"
                                            href="addonmodules.php?module=zibal">داشبورد</a></li>
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link active"
                                            href="addonmodules.php?module=zibal&action=zibal/user">لیست کاربران</a></li>
        <li class="navbar-mini-nav-item"><a class="navbar-mini-nav-link"
                                            href="addonmodules.php?module=zibal&action=zibal/setting">تنظیمات</a></li>
    </ul>
</nav>
<hr>
<h1 class="text-center">لیست کاربران احراز هویت شده</h1>

<div id="table-container">
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th class="text-center">نام</th>
            <th class="text-center">کد ملی</th>
            <th class="text-center">شماره تماس</th>
            <th class="text-center">تاریخ تولد</th>
            <th class="text-center">وضعیت احراز</th>
            <th class="text-center">تاریخ احراز هویت</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($user as $item): ?>
            <tr>
                <td class="text-center"><?= $item->full_name ?></td>
                <td class="text-center"><?= $item->national_code ?></td>
                <td class="text-center"><?= $item->mobile ?></td>
                <td class="text-center"><?= $item->birthday ?></td>
                <td class="text-center"><?= $item->verify == 1 ? 'احراز شده' : 'احراز نشده' ?></td>
                <td class="text-center"><?= $item->created_at ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable({
            "language": {
                "lengthMenu": "نمایش _MENU_ رکورد در هر صفحه",
                "zeroRecords": "موردی یافت نشد",
                "info": "نمایش صفحه _PAGE_ از _PAGES_",
                "infoEmpty": "رکوردی موجود نیست",
                "infoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                "search": "جستجو:",
                "paginate": {
                    "first": "اولین",
                    "last": "آخرین",
                    "next": "بعدی",
                    "previous": "قبلی"
                },
                "aria": {
                    "sortAscending": ": فعال سازی مرتب سازی صعودی",
                    "sortDescending": ": فعال سازی مرتب سازی نزولی"
                }
            },
            "pageLength": 10
        });
    });

</script>
