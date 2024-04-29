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