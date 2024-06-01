<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1 d-flex justify-content-between align-center align-items-center">
                    <h6 class="c-bold font-primary-color">مدیریت مدرسین</h6>
                    <a href="<?php echo site_url('dashboard/teachers/add-teacher') ?>" class="v-btn v-btn-success">افزودن مدرس جدید</a>
                </div>
            </div>
            <div class="dashboard-container_body p-4">
                <div class="submit-section">
                    <div class="row">
                        <?php
                        // var_dump($courses);
                        if ($teachers) :
                            foreach ($teachers as $teacher) :
                        ?>
                                <div class="col-sm-12 col-md-4 mb-4">
                                    <div class="wcp-course-wrapper position-relative">
                                        <div class="d-flex justify-content-between align-items-center m-4">
                                            <?php echo get_avatar($teacher->t_email, 100, '', $teacher->t_fullname, ['class'=>'img-fluid']) ?>
                                            <a href="<?php echo $teacher->t_fullname ?>" class="mt-3 mb-2"><?php echo $teacher->t_fullname ?></a>
                                            <a href="" class="v-btn v-btn-primary text-center">ویرایش</a>
                                        </div>
                                        <p><?php echo $teacher->t_desc ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="v-alert v-alert-danger">
                                تاکنون مدرسی ثبت نشده است.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>