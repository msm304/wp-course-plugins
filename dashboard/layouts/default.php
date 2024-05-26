<!doctype html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>داشبورد</title>
    <?php wp_head(); ?>
</head>

<body class="dark-deep">
    <div class="container-fluid">
        <!--  <div class="row">
          <div class="col-sm-12 p-5 mb-5 bg-white"></div>
      </div>-->
        <div class="row">
            <div class="col-sm-12 col-md-3 aside-wrapper">
                <aside class="dashboard-nav px-3">
                    <div class="user-info d-flex justify-content-center align-items-center flex-column">
                        <?php echo get_avatar(wp_get_current_user()->user_email, 135, '', wp_get_current_user()->display_name) ?>
                        <p class="display-user-name font-primary-color my-3"><?php echo wp_get_current_user()->display_name ?></p>
                        <p class="membership-date font-primary-color">تاریخ عضویت:
                        <p><?php echo Helper::toJalali(wp_get_current_user()->user_registered, '-') ?></p>
                    </div>
                    <ul class="nav flex-column aside-nav">
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" href="<?php echo site_url('dashboard') ?>"><i class="ti-panel"></i>داشبورد</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" href="<?php echo site_url('dashboard/my-courses') ?>"><i class="ti-book"></i>دوره های من</a>
                        </li>
                        </li>
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" href="<?php echo site_url('dashboard/my-transactions') ?>"><i class="ti-credit-card"></i>پرداخت های من</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" href="<?php echo site_url('dashboard/students') ?>"><i class="ti-user"></i>مدیریت دانشجویان</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" href="<?php echo site_url('dashboard/transactions') ?>"><i class="ti-money"></i>مدیریت تراکنش ها</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" href="<?php echo site_url('dashboard/courses') ?>"><i class="ti-money"></i>مدیریت دوره های آموزشی</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" href=""><i class="ti-user"></i>مدیریت مدرسین</a>
                        </li>
                        <li class="nav-item py-1">
                            <a class="nav-link py-3" data-bs-toggle="collapse" data-bs-target="#session-collapse" aria-expanded="true">
                                <i class="ti-folder"></i>مدیریت جلسات آموزشی
                            </a>
                            <div class="collapse" id="session-collapse">
                                <ul class="list-unstyled">
                                    <li class="py-1 "><a href="" class="p-3"><i class="ti-plus"></i>سرفصل ها</a></li>
                                    <li class="py-1"><a href="" class="p-3"><i class="ti-pencil-alt"></i> جلسات ویدیویی</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </aside>
            </div>
            <div class="col-sm-12 col-md-9">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 pb-4">
                        <nav aria-label="breadcrumb">
                            <ol class="dashboard-breadcrumb">
                                <li class="dashboard-breadcrumb-item "><a href="#">خانه</a></li>
                                <span class="mx-2 font-primary-color">></span>
                                <li class="dashboard-breadcrumb-item active" aria-current="page">افزودن دوره جدید</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card blue position-relative">
                            <i class="ti-book position-absolute"></i>
                            <div class="title">کل دوره ها</div>
                            <div class="value">۹۰<span class="font-primary-color">دوره</span></div>
                            <i class="zmdi zmdi-upload"></i>
                            <div class="value"></div>
                            <div class="stat"><b></b></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card green position-relative">
                            <i class="ti-user position-absolute"></i>
                            <div class="title">کل دانشجویان</div>
                            <i class="zmdi zmdi-upload"></i>
                            <div class="value">۴۵۳۲<span class="font-primary-color">نفر</span></div>
                            <div class="stat"><b></b></div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card darkblue position-relative">
                            <i class="ti-money position-absolute"></i>
                            <div class="title">میانگین فروش</div>
                            <i class="zmdi zmdi-download"></i>
                            <div class="value">۵۶۰۰۰۰۰۰<span class="font-primary-color">تومان</span></div>
                            <div class="stat"><b></b></div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
                        <div class="card red position-relative ">
                            <i class="ti-money position-absolute"></i>
                            <div class="title">کل فروش</div>
                            <i class="zmdi zmdi-download"></i>
                            <div class="value">۹۹۰۰۰۰۰۰<span class="font-primary-color">تومان</span></div>
                            <div class="stat"><b></b></div>
                        </div>
                    </div>
                </div>
                <?php include WCP_DASHBOARD_VIEW . $view; ?>
            </div>
        </div>
    </div>

</body>
<?php wp_footer(); ?>

</html>