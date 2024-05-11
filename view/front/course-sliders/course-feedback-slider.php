<?php
function wp_wcp_course_feedback_slider()
{
    $Comment = new Comment();
    $Course = new Course();
?>

    <section>
        <div class="container">
            <?php
            $total_user = count_users();
            ?>
            <div class="row justify-content-center ">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="sec-heading center">
                        <h2>دانشجویان <span class="theme-cl">لرن آپ</span> چه می گویند</h2>

                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <!-- Cource Grid 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="_get_know_wrap">
                        <div class="_get_know_caption">
                            <h4><span class="counter-1"><?php echo $total_user['total_users'] ?></span>+</h4>
                            <p>کاربران</p>
                        </div>
                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="_get_know_wrap">
                        <div class="_get_know_caption">
                            <h4><span class="counter-2"><?php echo $Course->count_course() ?></span>+</h4>
                            <p>دوره ها</p>
                        </div>
                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="_get_know_wrap">
                        <div class="_get_know_caption">
                            <h4><span class="counter-3"><?php echo $Course->count_teacher() ?></span>+</h4>
                            <p>مدرسین باتجربه</p>
                        </div>
                    </div>
                </div>

                <!-- Cource Grid 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="_get_know_wrap">
                        <div class="_get_know_caption">
                            <h4><span class="counter-4"><?php echo $Course->count_student() ?></span>+</h4>
                            <p>دانشجویان</p>
                        </div>
                    </div>
                </div>

            </div>
            <!-- ============================ Featured Category Start ================================== -->

            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                        <div class="arrow_slide three_slide-dots arrow_middle" dir="rtl">

                            <!-- Single Slide -->
                            <?php $comments = $Comment->find();
                            if ($comments) :
                                foreach ($comments as $comment) :
                            ?>
                                    <div class="singles_items mb-4">
                                        <div class="bg-light rounded box-shadow">
                                            <div class="client-detail-box">
                                                <div class="pic pt-4 d-flex justify-content-around align-items-center">
                                                    <?php echo get_avatar($comment->email, 100, '', '') ?>
                                                    <div class="reviews-comments-item-text reviews-comments-item-text-custom">
                                                        <h4><?php echo $comment->full_name ?></h4>

                                                        <div style="direction: ltr" class="listing-rating  <?php echo $comment->rate > 3 ? 'high' : 'mid' ?>">

                                                            <?php echo $Comment->rating_star($comment->rate) ?>
                                                            <span class="review-count"><?php echo $comment->rate ?></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="edu_data">
                                                <h6 class="title mb-3 align-items-center"><span>دانشجوی دوره : <?php echo $Course->find_course_title($comment->c_slug)->c_title ?></span>
                                                </h6>
                                                <p><?php echo $comment->comment ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="alert alert-info">تاکنون دیدگاهی برای دوره های آموزشی ارسال نشده است.</div>
                            <?php endif; ?>

                        </div>
                    </div>

                </div>
            </div>
            <!-- ============================ Featured Category End ================================== -->
        </div>
    </section>

<?php
}

add_shortcode('course_feedback_slider', 'wp_wcp_course_feedback_slider');
