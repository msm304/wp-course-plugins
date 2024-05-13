<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1">
                    <h6 class="c-bold font-primary-color">دوره های من</h6>
                </div>
            </div>
            <div class="dashboard-container_body p-4">
                <div class="submit-section">
                    <div class="row">
                        <?php
                        if ($user_courses) :
                            foreach ($user_courses as $user_course) :
                        ?>
                                <div class="col-sm-12 col-md-4">
                                    <div class="wcp-course-wrapper position-relative">
                                        <?php
                                        switch ($user_course->c_type) {
                                            case 0:
                                                echo '<span class="postion-absolut v-badge v-badge-success">رایگان</span>';
                                                break;
                                            case 1:
                                                echo '<span class="postion-absolut v-badge v-badge-success">غیر رایگان</span>';
                                                break;
                                        }
                                        ?>
                                        <img src="<?php echo $user_course->c_tumbnail ?>" alt="" class="img-fluid">
                                        <a href="<?php echo site_url($user_course->c_slug) ?>" class="mt-3 mb-2"><?php echo $user_course->c_title ?></a>
                                        <p><?php echo mb_substr($user_course->c_title_desc, '0', '200', 'UTF8') . '...' ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="v-alert v-alert-danger">
                                تاکنون در دوره ای ثبت نام نکرده اید.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>