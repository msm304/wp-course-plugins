<?php

function wp_wcp_course_slider()
{
    $Course = new Course;
    $courses = $Course->find();
    $Comment = new Comment;

?>
    <section class="min-sec">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 mb-3">
                    <div class="sec-heading2">
                        <div class="sec-left">
                            <h3>دوره های آموزشی ویژه</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-0">

                    <div class="arrow_slide three_slide arrow_middle" dir="rtl">

                        <!-- Single Slide -->
                        <?php

                        if ($courses) :
                            foreach ($courses as $course) :
                                $cours_meta = $Course->find_course_meta($course->c_slug);
                                $comments = $Comment->find_by_slug($course->c_slug);
                                $slug = $course->c_slug;
                                // var_dump($slug);
                                // $star_rate = $comments->rate();
                        ?>
                                <div class="singles_items">
                                    <div class="education_block_grid style_2">
                                        <div class="education_block_thumb n-shadow">
                                            <a href="<?php echo home_url() . '/' . $course->c_slug ?>" target="_blank"><img src="<?php echo $course->c_tumbnail ?>" class="img-fluid" alt="<?php echo $course->c_title ?>"></a>
                                            <div class="cources_price"><?php echo $course->c_type == 1 ? number_format($course->c_price) . ' ' . 'تومان' : $Course->course_type($course->c_type) ?></div>
                                        </div>

                                        <div class="education_block_body">
                                            <h4 class="bl-title"><a href="<?php echo home_url() . '/' . $course->c_slug ?>" target="_blank"><?php echo $course->c_title ?></a></h4>
                                        </div>
                                        <div class="cources_info_style3">
                                            <ul>
                                                <li><i class="ti-user ml-2"></i><span><?php echo $Course->count_course_students($course->c_id) == true ? $Course->count_course_students($course->c_id) : 'بدون' ?></span> دانشجو</li>
                                                <!-- <li><i class="ti-time ml-2"></i><?php /* echo $cours_meta->c_duration */  ?>دقیقه</li> -->
                                                <li><i class="ti-time ml-2"></i><span><?php echo $Course->get_course_meta($course->c_id, 'c_duration', true)  ?></span>ساعت</li>
                                                <li><i class="ti-star text-warning ml-2"></i><?php echo round($Comment->comment_rate_avg($slug)) == 0 ? 'بدون' : round($Comment->comment_rate_avg($slug)) ?> امتیاز</li>
                                            </ul>
                                        </div>
                                        <?php $user_id = get_userdata($course->t_id)->id ?>
                                        <div class="education_block_footer">
                                            <div class="education_block_author">
                                                <div class="path-img"><a href="instructor-detail.html"><?php echo get_avatar($user_id, 35, '', get_userdata($course->t_id)->display_name), ['class' => 'img-fluid'] ?></div>
                                                <h5><a href="instructor-detail.html"><?php echo get_userdata($course->t_id)->display_name ?></a></h5>
                                            </div>
                                            <div class="foot_lecture"><i class="ti-control-skip-forward ml-2"></i><?php echo $Course->count_course_teacher($course->t_id) ?> دوره</div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="alert alert-info">تاکنون دوره ای منتشر نشده است.</div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </div>
    </section>
<?php
}

add_shortcode('course-slider', 'wp_wcp_course_slider');
