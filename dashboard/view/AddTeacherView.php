<?php add_teacherController::addAction(); ?>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1">
                    <h6 class="c-bold font-primary-color">افزودن مدرس جدید</h6>
                </div>
            </div>
            <div class="dashboard-container_body p-4">
                <!-- Basic info -->
                <div class="submit-section">
                    <div class="row">
                        <?php echo FlashMessage::showMsg() ?>
                        <form action="" method="post">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">نام </label>
                                    <input type="text" name="t_fullname" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['t_fullname']) ? $_POST['t_fullname'] : '' ?>" placeholder="نام مدرس ...">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">ایمیل </label>
                                    <input type="text" name="t_email" class="form-control form-control-dark font-primary-color ltr" value="<?php echo isset($_POST['t_email']) ? $_POST['t_email'] : '' ?>" placeholder="Email  ...">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">شماره تماس </label>
                                    <input type="text" name="t_phone" class="form-control form-control-dark font-primary-color ltr" value="<?php echo isset($_POST['t_phone']) ? $_POST['t_phone'] : '' ?>" placeholder="شماره تماس مدرس ...">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">تلگرام</label>
                                    <input type="text" name="t_telegram" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['t_facebook']) ? $_POST['t_facebook'] : '' ?>" placeholder="فیسبوک ...">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">توییتر</label>
                                    <input type="text" name="t_twitter" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['t_twitter']) ? $_POST['t_twitter'] : '' ?>" placeholder="توییتر ...">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">اینستاگرام</label>
                                    <input type="url" name="t_instagram" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['t_instagram']) ? $_POST['t_instagram'] : '' ?>" placeholder="اینستاگرام ...">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">لینکداین</label>
                                    <input type="url" name="t_linkedin" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['t_linkedin']) ? $_POST['t_linkedin'] : '' ?>" placeholder="لینکداین ...">
                                </div>

                                <label class="font-primary-color mb-3"> درباره مدرس </label>
                                <?php
                                $content = isset($_POST['t_desc']) ? $_POST['t_desc'] : '';
                                $editor_id = 't_desc';
                                //                                 $textarea_name='test';
                                $args = [
                                    //                                        'textarea_name' => $textarea_name,
                                    'textarea_rows' => get_option('default_post_edit_rows', 20),
                                ];
                                wp_editor($content, $editor_id, $args);
                                ?>

                            </div>

                            <div class="col-md-12 mb-3 text-end p-0 mt-4">
                                <input class="v-btn v-btn-success font-primary-color" name="teacher_add" type="submit" value="ذخیره">
                            </div>
                            <?php wp_nonce_field('_add_teacher', '_add_teacher', false) ?>
                        </form>
                    </div>
                </div>
                <!-- Basic info -->

            </div>

        </div>
    </div>
</div>