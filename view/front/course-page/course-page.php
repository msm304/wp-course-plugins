<?php

function course_page()

{
    $Course = new Course();
    $slug = Helper::getSlug($_SERVER['REQUEST_URI']);
    $course = $Course->find($slug);
    $course_meta = $Course->find_course_meta($slug);
?>

    <!-- ============================ Page Title Start================================== -->
    <?php include WCP_PLUGIN_VIEW . 'front/course-page/_header.php' ?>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Course Detail ================================== -->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <!-- start main course detail -->
                <div class="col-lg-8 col-md-8">
                    <div class="property_video xl">
                        <!-- _start thumbanil -->
                        <video width="100%" height="auto" controls>
                            <source src="<?php echo $course->c_demo ?>" type="video/mp4">
                        </video>

                        <div class="instructor_over_info">
                            <ul>
                                <li>
                                    <div class="ins_info">
                                        <div class="ins_info_thumb">
                                            <img src="assets/img/user-8.jpg" class="img-fluid" alt="" />
                                        </div>
                                        <div class="ins_info_caption">
                                            <span>مدرس</span>
                                            <h4>حسام موسوی</h4>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <span>دسته بندی</span>
                                    طراحی سایت
                                </li>
                                <li>
                                    <span>امتیاز</span>
                                    <div class="eds_rate">
                                        4.2
                                        <div class="eds_rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- _end thumbanil -->

                    <!-- All Info Show in Tab -->
                    <div class="tab_box_info mt-4">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Overview Detail -->
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <!-- Overview -->
                                <div class="edu_wraper">
                                    <?php echo $course->c_desc ?>
                                </div>
                            </div>

                            <div class="edu_wraper">
                                <h4 class="edu_title">جلسات دوره</h4>
                                <div id="accordionExample" class="accordion shadow circullum">
                                    <!-- Part 1 -->
                                    <div class="card">
                                        <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0 accordion_title">
                                                <a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark collapsible-link py-2">دوره اول: مقدمه و معرفی مدرس</a>
                                            </h6>
                                        </div>
                                        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                                            <div class="card-body pl-3 pr-3">
                                                <ul class="lectures_lists">
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 1
                                                        </div>
                                                        معرفی دوره
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 2
                                                        </div>
                                                        ساخت منوها در بخش مدیریت
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 3
                                                        </div>
                                                        متاباکس و ذخیره اطلاعات برای پست ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 4
                                                        </div>
                                                        استفاده از قالب استاندارد در پلاگین ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 5
                                                        </div>
                                                        ذخیره و بازیابی تنظیمات در وردپرس
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Part 2 -->
                                    <div class="card">
                                        <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0 accordion_title">
                                                <a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-block position-relative collapsed text-dark collapsible-link py-2">دوره دوم: پیاده سازی پلاگین آمار بازدید</a>
                                            </h6>
                                        </div>
                                        <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                                            <div class="card-body pl-3 pr-3">
                                                <ul class="lectures_lists">
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 1
                                                        </div>
                                                        معرفی دوره
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 2
                                                        </div>
                                                        ساخت منوها در بخش مدیریت
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 3
                                                        </div>
                                                        متاباکس و ذخیره اطلاعات برای پست ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 4
                                                        </div>
                                                        استفاده از قالب استاندارد در پلاگین ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 5
                                                        </div>
                                                        ذخیره و بازیابی تنظیمات در وردپرس
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Part 3 -->
                                    <div class="card">
                                        <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0 accordion_title">
                                                <a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-block position-relative collapsed text-dark collapsible-link py-2">دوره سوم: پیاده سازی پلاگین رای دادن به مطالب</a>
                                            </h6>
                                        </div>
                                        <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                                            <div class="card-body pl-3 pr-3">
                                                <ul class="lectures_lists">
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 1
                                                        </div>
                                                        معرفی دوره
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 2
                                                        </div>
                                                        ساخت منوها در بخش مدیریت
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 3
                                                        </div>
                                                        متاباکس و ذخیره اطلاعات برای پست ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 4
                                                        </div>
                                                        استفاده از قالب استاندارد در پلاگین ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 5
                                                        </div>
                                                        ذخیره و بازیابی تنظیمات در وردپرس
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Part 04 -->
                                    <div class="card">
                                        <div id="headingFour" class="card-header bg-white shadow-sm border-0">
                                            <h6 class="mb-0 accordion_title">
                                                <a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="d-block position-relative collapsed text-dark collapsible-link py-2">دوره نهایی: پیاده سازی پلاگین فروشگاه اینترنتی با
                                                    درگاه پرداخت</a>
                                            </h6>
                                        </div>
                                        <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
                                            <div class="card-body pl-3 pr-3">
                                                <ul class="lectures_lists">
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 1
                                                        </div>
                                                        معرفی دوره
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 2
                                                        </div>
                                                        ساخت منوها در بخش مدیریت
                                                    </li>
                                                    <li>
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 3
                                                        </div>
                                                        متاباکس و ذخیره اطلاعات برای پست ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 4
                                                        </div>
                                                        استفاده از قالب استاندارد در پلاگین ها
                                                    </li>
                                                    <li class="unview">
                                                        <div class="lectures_lists_title">
                                                            <i class="ti-control-play"></i>دوره: 5
                                                        </div>
                                                        ذخیره و بازیابی تنظیمات در وردپرس
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Overall Reviews -->
                            <div class="rating-overview">
                                <div class="rating-overview-box">
                                    <span class="rating-overview-box-total">4.2</span>
                                    <span class="rating-overview-box-percent">از امتیاز 5</span>
                                    <div class="star-rating" data-rating="5">
                                        <i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i><i class="ti-star"></i>
                                    </div>
                                </div>

                                <div class="rating-bars">
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">5 ستاره</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating high" data-rating="4.7">
                                                <span class="rating-bars-rating-inner" style="width: 85%"></span>
                                            </span>
                                            <strong>85%</strong>
                                        </span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">4 ستاره</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating good" data-rating="3.9">
                                                <span class="rating-bars-rating-inner" style="width: 75%"></span>
                                            </span>
                                            <strong>75%</strong>
                                        </span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">3 ستاره</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating mid" data-rating="3.2">
                                                <span class="rating-bars-rating-inner" style="width: 52.2%"></span>
                                            </span>
                                            <strong>53%</strong>
                                        </span>
                                    </div>
                                    <div class="rating-bars-item">
                                        <span class="rating-bars-name">1 ستاره</span>
                                        <span class="rating-bars-inner">
                                            <span class="rating-bars-rating poor" data-rating="2.0">
                                                <span class="rating-bars-rating-inner" style="width: 20%"></span>
                                            </span>
                                            <strong>20%</strong>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="single_instructor">
                                <div class="single_instructor_thumb">
                                    <a href="#"><img src="assets/img/user-3.jpg" class="img-fluid" alt="" /></a>
                                </div>
                                <div class="single_instructor_caption">
                                    <h4><a href="#">مهندس رضایی</a></h4>
                                    <ul class="instructor_info">
                                        <li><i class="ti-video-camera"></i>72 ویدئو</li>
                                        <li><i class="ti-control-forward"></i>102 دوره</li>
                                        <li><i class="ti-user"></i>آپدیت بهمن ماه</li>
                                    </ul>
                                    <p>
                                        اول داستان، طراح گرافیک بودم و ۲ سالی به عنوان طراح
                                        مشغول بودم، بعد به برنامه‌نویسی علاقمند شدم و الان بیشتر
                                        از ۱۰ ساله که عاشق کدزنی و چالش‌های پروژه‌های مختلفم.
                                    </p>
                                    <ul class="social_info">
                                        <li>
                                            <a href="#"><i class="ti-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ti-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ti-linkedin"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="ti-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Reviews -->
                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>تاکنون <span> 3 </span> دیدگاه ثبت شده است!</h3>
                                </div>
                                <div class="reviews-comments-wrap">
                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="assets/img/user-1.jpg" class="img-fluid" alt="" />
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4>
                                                <a href="#">محمد خاکپور</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>10 بهمن
                                                    1399</span>
                                            </h4>

                                            <div class="listing-rating high" data-starrating2="5">
                                                <i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><span class="review-count">4.9</span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p>
                                                "ظاهرا آموزش کاملی بنظر میاد و میخوام بخرم ولی کاش
                                                بجای ساخت فروشگاه، پلاگین نویسی برا ووکامرس رو هم
                                                توضیح میدادین، البته میتونین تکمیل کنین این دوره رو
                                                و آپدیت کنین"
                                            </p>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->

                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="assets/img/user-2.jpg" class="img-fluid" alt="" />
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4>
                                                <a href="#">الهام پاکزاد</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>26 مرداد
                                                    1399</span>
                                            </h4>

                                            <div class="listing-rating mid" data-starrating2="5">
                                                <i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i><span class="review-count">3.7</span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p>
                                                "سلام.من PHP رو تو دوران هنرستان یاد گرفتم.اگه PHP
                                                رو به صورت مقدماتی کار کرده باشم ولی در حدی باشیم که
                                                درک نسبتا کاملی از کد خط ها و معنا و مفهوم آن داشته
                                                باشیم، کفایت میکنه یا باید پیشرفته تر آموزش ویدیویی
                                                ببینم؟ "
                                            </p>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->

                                    <!-- reviews-comments-item -->
                                    <div class="reviews-comments-item">
                                        <div class="review-comments-avatar">
                                            <img src="assets/img/user-3.jpg" class="img-fluid" alt="" />
                                        </div>
                                        <div class="reviews-comments-item-text">
                                            <h4>
                                                <a href="#">مهدی فدایی</a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>20 بهمن
                                                    1398</span>
                                            </h4>

                                            <div class="listing-rating good" data-starrating2="5">
                                                <i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star active"></i><i class="ti-star"></i>
                                                <span class="review-count">4.2</span>
                                            </div>
                                            <div class="clearfix"></div>
                                            <p>
                                                " سلام. برای یادگرفتن پیش نیاز این دوره که پی اچ پی
                                                هست تا کدام قسمت از اموزش پی اچ پی لازمه که یاد
                                                گرفته بشه؟(مطابق سرفصل های همین دوره در سایت) "
                                            </p>
                                        </div>
                                    </div>
                                    <!--reviews-comments-item end-->
                                </div>
                            </div>

                            <!-- Submit Reviews -->
                            <div class="edu_wraper">
                                <h4 class="edu_title">ثبت دیدگاه</h4>
                                <div class="review-form-box form-submit">
                                    <form>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>نام</label>
                                                    <input class="form-control" type="text" placeholder="نام شما" />
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <label>ایمیل</label>
                                                    <input class="form-control" type="email" placeholder="ایمیل شما" />
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <label>متن دیدگاه</label>
                                                    <textarea class="form-control ht-140" placeholder="دیدگاه خود را وارد نمایید"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="d-flex justify-content-between align-items-center comment-star-rating px-2 rounded mb-5 mt-4">
                                                        <span>میزان رضایت شما از این دوره </span>
                                                        <div class="wrap">
                                                            <div class="stars">
                                                                <label class="rate">
                                                                    <input type="radio" name="radio1" class="star-rate" id="star1" value="1" />
                                                                    <div class="face"></div>
                                                                    <i class="far fa-star star one-star"></i>
                                                                </label>
                                                                <label class="rate">
                                                                    <input type="radio" name="radio1" class="star-rate" id="star2" value="2" />
                                                                    <div class="face"></div>
                                                                    <i class="far fa-star star two-star"></i>
                                                                </label>
                                                                <label class="rate">
                                                                    <input type="radio" name="radio1" class="star-rate" id="star3" value="3" />
                                                                    <div class="face"></div>
                                                                    <i class="far fa-star star three-star"></i>
                                                                </label>
                                                                <label class="rate">
                                                                    <input type="radio" name="radio1" class="star-rate" id="star4" value="4" />
                                                                    <div class="face"></div>
                                                                    <i class="far fa-star star four-star"></i>
                                                                </label>
                                                                <label class="rate">
                                                                    <input type="radio" name="radio1" class="star-rate" id="star5" value="5" />
                                                                    <div class="face"></div>
                                                                    <i class="far fa-star star five-star"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-theme">
                                                        ثبت دیدگاه
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Instructor Detail -->
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab"></div>

                            <!-- Reviews Detail -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab"></div>
                        </div>
                    </div>
                </div>
                <!-- end main course detail -->
                <!-- start sidebar -->
                <div class="col-lg-4 col-md-4">
                    <!-- Course info -->
                    <div class="ed_view_box style_3">
                        <div class="ed_view_price pr-4 mt-3">
                            <span>قیمت آموزش</span>
                            <h2 class="theme-cl d-flex"><span class="course_main_price">
                                    <?php
                                    if ($course->c_discount == '0') {
                                        echo number_format($course->c_price);
                                    } else {
                                        echo '<div><span class="cources_price_discount">' . number_format(Helper::calculateDiscount($course->c_price, $course->c_discount)) . '</span><del>' . number_format($course->c_price) . '</del></div>';
                                    }
                                    ?>

                                </span>تومان</h2>
                        </div>

                        <div class="ed_view_features pl-4 pr-3">
                            <span>ویدئوهای نمونه</span>
                            <ul>
                                <li>
                                    <i class="ti-angle-left"></i>افزونه نویسی وردپرس بخش مقدمه
                                </li>
                                <li>
                                    <i class="ti-angle-left"></i>افزونه نویسی وردپرس بخش دهم
                                </li>
                                <li>
                                    <i class="ti-angle-left"></i>افزونه نویسی وردپرس بخش دهم
                                </li>
                            </ul>
                        </div>
                        <div class="ed_view_link">

                            <?php if (is_user_logged_in()) : ?>
                                <a href="#" class="btn btn-theme enroll-btn">
                                    ثبت نام
                                    <i class="ti-angle-left"></i>
                                </a>
                            <?php else : ?>
                                <a href="#" class="btn btn-theme enroll-btn">
                                    برای ثبت نام ابتدا در سایت لاگین نمایید
                                    <i class="ti-angle-left"></i>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="edu_wraper border">
                        <h4 class="edu_title">ویژگی های دوره</h4>
                        <ul class="edu_list right">
                            <li>
                                <i class="ti-user"></i>شرکت کنندگان:<strong><span><?php echo $course_meta->c_student ?></span> نفر</strong>
                            </li>
                            <li><i class="ti-game"></i>جلسات:<strong><?php echo $course_meta->c_session ?></strong></li>
                            <li>
                                <i class="ti-time"></i>مدت دوره:<strong><?php echo $course_meta->c_duration ?> ساعت</strong>
                            </li>
                            <li>
                                <i class="ti-tag"></i>سطح دوره:<strong><?php echo $Course->course_level($course_meta->c_level) ?></strong>
                            </li>
                            <li>
                                <i class="ti-flag-alt"></i>زبان:<strong><?php echo $Course->course_lang($course_meta->c_lang) ?></strong>
                            </li>
                            <li>
                                <i class="ti-shine"></i>نوع دوره:<strong><?php echo $Course->course_type($course->c_type) ?></strong>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end sidebar -->
            </div>
        </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
<?php

}
add_shortcode('course-page', 'course_page');
