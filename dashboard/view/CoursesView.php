<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1 d-flex justify-content-between align-center align-items-center">
                    <h6 class="c-bold font-primary-color">لیست دوره ها</h6>
                    <a href="<?php echo site_url('dashboard/courses/add-course') ?>" class="v-btn v-btn-success">افزودن دوره جدید</a>
                </div>
            </div>
            <div class="dashboard-container_body p-4">
                <div class="submit-section">
                    <div class="row">
                        <?php
                        // var_dump($courses);
                        if ($courses) :
                            foreach ($courses as $course) :
                        ?>
                                <div class="col-sm-12 col-md-4 mb-4">
                                    <div class="wcp-course-wrapper position-relative">
                                        <?php
                                        switch ($course->c_type) {
                                            case 0:
                                                echo '<span class="postion-absolut v-badge v-badge-success">رایگان</span>';
                                                break;
                                            case 1:
                                                echo '<span class="postion-absolut v-badge v-badge-success">غیر رایگان</span>';
                                                break;
                                        }
                                        ?>
                                        <img src="<?php echo $course->c_thumbnail ?>" alt="" class="img-fluid">
                                        <div class="d-flex justify-content-between align-items-center mt-4">
                                            <a href="<?php echo site_url($course->c_slug) ?>" class="mt-3 mb-2"><?php echo $course->c_title ?></a>
                                            <a href="<?php echo site_url('dashboard/courses/edit-course/') . $course->c_id ?>" class="v-btn v-btn-primary text-center">ویرایش</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="v-alert v-alert-danger">
                                تاکنون دوره ای ایجاد نشده است.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>