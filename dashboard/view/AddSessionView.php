<?php add_sessionController::addAction(); ?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1">
                    <h6 class="c-bold font-primary-color">افزودن جلسه</h6>
                </div>
            </div>
            <div class="dashboard-container_body p-4">
                <div class="submit-section">
                    <div class="row">
                        <form action="" method="post">
                            <div class="row">
                                <?php /* if (isset($_POST['course_add'])) : */ ?>
                                <?php echo FlashMessage::showMsg() ?>
                                <?php /* endif; */ ?>

                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">عنوان دوره</label>
                                    <select name="course_slug_id" data-cid="1" class="form-select form-select-dark wcp-get-course-references" aria-label="Default select example">
                                        <?php if ($find_course_title) : ?>
                                            <?php foreach ($find_course_title as $item) : ?>
                                                <option value="<?php echo $item->c_id ?>"><?php echo $item->c_title ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="">دوره ای ثبت نشده است</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label class="font-primary-color mb-3">عنوان جلسه</label>
                                    <input name="v_title" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['v_title']) ? $_POST['v_title'] : '' ?>">
                                </div>
                                <div class="form-group col-md-8 mb-3">
                                    <label class="font-primary-color mb-3">لینک ویدیو</label>
                                    <input name="v_link" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['v_link']) ? $_POST['v_link'] : '' ?>">
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <label class="font-primary-color mb-3">حجم ویدیو</label>
                                    <input name="v_size" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['v_size']) ? $_POST['v_size'] : '' ?>">
                                </div>
                                <div class="form-group col-md-2 mb-3">
                                    <label class="font-primary-color mb-3">زمان ویدیو</label>
                                    <input name="v_length" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['v_length']) ? $_POST['v_length'] : '' ?>">
                                </div>
                                <div class="form-group col-md-3 mb-3">
                                    <label class="font-primary-color mb-3">شماره سرفصل</label>
                                    <select name="r_number" class="form-select form-select-dark refrences-list" aria-label="Default select example">
                                    </select>
                                </div>

                                <div class="form-group col-md-3 mb-3">
                                    <label class="font-primary-color mb-3">شماره جلسه</label>
                                    <select name="v_number" class="form-select form-select-dark" aria-label="Default select example">
                                        <?php
                                        $i = 1;
                                        for ($i = 1; $i <= 100; $i++) :
                                        ?>
                                            <option value="<?php echo $i ?>">جلسه <?php echo $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 mb-3">
                                    <label class="font-primary-color mb-3">نوع ویدیو</label>
                                    <select name="v_type" class="form-select form-select-dark" aria-label="Default select example">
                                        <option value="0">رایگان</option>
                                        <option value="1">غیر رایگان</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-3 mb-3">
                                    <label class="font-primary-color mb-3">وضعیت</label>
                                    <select name="v_status" class="form-select form-select-dark" aria-label="Default select example">
                                        <option value="1">فعال</option>
                                        <option value="0">غیرفعال</option>
                                    </select>
                                </div>
                                <div class="col-md-12 mb-3 text-end">
                                    <input class="v-btn v-btn-success font-primary-color" name="add_session" type="submit" value="ذخیره">
                                </div>
                                <?php wp_nonce_field('_add_session', '_add_session', false) ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>