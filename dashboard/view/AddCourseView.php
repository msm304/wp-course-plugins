    <?php add_courseController::updateAction(); ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="dashboard-container dark-light">
                <div class="dashboard-container_header">
                    <div class="dashboard_fl_1">
                        <h6 class="c-bold font-primary-color">افزودن دوره</h6>
                    </div>
                </div>
                <div class="dashboard-container_body p-4">
                    <div class="submit-section">
                        <div class="row">
                            <form action="" method="post">
                                <div class="row">
                                    <?php echo FlashMessage::showMsg() ?>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">عنوان دوره</label>
                                        <input name="c_title" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_title'] ? $_POST['c_title'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">آیدی دوره</label>
                                        <input name="c_id" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_id'] ? $_POST['c_id'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">مدرس دوره</label>
                                        <input name="t_id" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['t_id'] ? $_POST['t_id'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">شناسه دوره (slug)</label>
                                        <input name="c_slug" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_slug'] ? $_POST['c_slug'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">برچسب</label>
                                        <input name="c_tags" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_tags'] ? $_POST['c_tags'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">قیمت</label>
                                        <input type="text" name="c_price" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_price'] ? $_POST['c_price'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">تصویر دوره</label>
                                        <input name="c_thumbnail" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_thumbnail'] ? $_POST['c_thumbnail'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">دمو دوره</label>
                                        <input name="c_demo" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_demo'] ? $_POST['c_demo'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">تخفیف</label>
                                        <input name="c_discount" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_discount'] ? $_POST['c_discount'] : '' ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">نوع</label>
                                        <select name="c_type" class="form-select form-select-dark" aria-label="Default select example">
                                            <option value="0" <?php echo  $_POST['c_type'] == '0' ? 'selected' : '' ?>>رایگان</option>
                                            <option value="1" <?php echo  $_POST['c_type'] == '1' ? 'selected' : '' ?>>پولی</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">وضعیت</label>
                                        <select name="c_status" class="form-select form-select-dark" aria-label="Default select example">
                                            <option value="0" <?php echo  $_POST['c_status'] == '0' ? 'selected' : '' ?>>فعال</option>
                                            <option value="1" <?php echo  $_POST['c_status'] == '1' ? 'selected' : '' ?>>غیرفعال</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">سطح دوره</label>
                                        <select name="c_level" class="form-select form-select-dark" aria-label="Default select example">
                                            <option value="1" <?php echo  $_POST['c_level'] == '0' ? 'selected' : '' ?>>مقدماتی</option>
                                            <option value="2" <?php echo  $_POST['c_level'] == '1' ? 'selected' : '' ?>>پیشرفته</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">زبان دوره</label>
                                        <select name="c_lang" class="form-select form-select-dark" aria-label="Default select example">
                                            <option value="0" <?php echo  $_POST['c_lang'] == '0' ? 'selected' : '' ?>>فارسی</option>
                                            <option value="1" <?php echo  $_POST['c_lang'] == '1' ? 'selected' : '' ?>>انگلیسی</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="font-primary-color mb-3">مدرس</label>
                                        <input name="t_name" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['t_name'] ? $_POST['t_name'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="font-primary-color mb-3">تعداد دانشجویان</label>
                                        <input name="c_student" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_student'] ? $_POST['c_student'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="font-primary-color mb-3">تعداد جلسات</label>
                                        <input name="c_session" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_session'] ? $_POST['c_session'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-4 mb-3">
                                        <label class="font-primary-color mb-3">طول دوره</label>
                                        <input name="c_duration" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo $_POST['c_duration'] ? $_POST['c_duration'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label class="font-primary-color mb-3">توضیحات دوره </label>
                                        <?php
                                        $content = $_POST['c_title_desc'] ? $_POST['c_title_desc'] : '';
                                        $editor_id = 'c_title_desc';
                                        //                                    $textarea_name='test';
                                        $args = [
                                            //                                        'textarea_name' => $textarea_name,
                                            'textarea_rows' => get_option('default_post_edit_rows', 20),

                                        ];
                                        wp_editor($content, $editor_id, $args);
                                        ?>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <label class="font-primary-color mb-3">مقاله دوره </label>
                                        <?php
                                        $content = $_POST['c_title_desc'] ? $_POST['c_title_desc'] : '';
                                        $editor_id = 'c_desc';
                                        //                                 $textarea_name='test';
                                        $args = [
                                            //                                        'textarea_name' => $textarea_name,
                                            'textarea_rows' => get_option('default_post_edit_rows', 20),
                                        ];
                                        wp_editor($content, $editor_id, $args);
                                        ?>

                                    </div>
                                    <div class="col-sm-12 my-3">
                                        <input name="course_add" class="v-btn v-btn-primary font-primary-color" type="submit" value="بروزرسانی">
                                    </div>
                                </div>
                                <?php wp_nonce_field('_course_add', '_course_add', false) ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>