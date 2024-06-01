  <?php add_courseController::addAction(); ?>
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
                                  <?php /* if (isset($_POST['course_add'])) : */ ?>
                                  <?php echo FlashMessage::showMsg() ?>
                                  <?php /* endif; */ ?>

                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">عنوان دوره</label>
                                      <input name="c_title" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_title']) ? $_POST['c_title'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">آیدی دوره</label>
                                      <input name="c_id" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_id']) ? $_POST['c_id'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">لیست مدرسین</label>
                                      <?php if ($teachers) : ?>
                                          <select name="t_name" class="form-select form-select-dark" aria-label="Default select example">
                                              <?php foreach ($teachers as $teacher) : ?>
                                                  <option value="<?php echo $teacher->t_id ?>|<?php echo $teacher->t_fullname ?>"><?php echo $teacher->t_fullname ?></option>
                                              <?php endforeach; ?>
                                          </select>
                                      <?php else : ?>
                                          <option value="">تاکنون مدرسی ثبت نشده است</option>
                                      <?php endif; ?>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">شناسه دوره (slug)</label>
                                      <input name="c_slug" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_slug']) ? $_POST['c_slug'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">برچسب</label>
                                      <input name="c_tags" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_tags']) ? $_POST['c_tags'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">قیمت</label>
                                      <input type="text" name="c_price" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_price']) ? $_POST['c_price'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">تصویر دوره</label>
                                      <input name="c_thumbnail" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_thumbnail']) ? $_POST['c_thumbnail'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">دمو دوره</label>
                                      <input name="c_demo" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_demo']) ? $_POST['c_demo'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">تخفیف</label>
                                      <input name="c_discount" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_discount']) ? $_POST['c_discount'] : '' ?>">
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">نوع</label>
                                      <select name="c_type" class="form-select form-select-dark" aria-label="Default select example">
                                          <?php $c_type =  isset($_POST['c_type']) ? $_POST['c_type'] : '' ?>
                                          <option value="0" <?php echo $c_type == 0 ? 'selected' : '' ?>>رایگان</option>
                                          <option value="1" <?php echo $c_type == 1 ? 'selected' : '' ?>>پولی</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">وضعیت</label>
                                      <select name="c_status" class="form-select form-select-dark" aria-label="Default select example">
                                          <?php $c_status =  isset($_POST['c_status']) ? $_POST['c_status'] : '' ?>
                                          <option value="0" <?php echo $c_status == 0 ? 'selected' : '' ?>>فعال</option>
                                          <option value="1" <?php echo $c_status == 1 ? 'selected' : '' ?>>غیرفعال</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">سطح دوره</label>
                                      <select name="c_level" class="form-select form-select-dark" aria-label="Default select example">
                                          <?php $c_level =  isset($_POST['c_level']) ? $_POST['c_level'] : '' ?>
                                          <option value="1" <?php echo $c_level == 1 ? 'selected' : '' ?>>مقدماتی</option>
                                          <option value="2" <?php echo $c_level == 2 ? 'selected' : '' ?>>پیشرفته</option>
                                      </select>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">زبان دوره</label>
                                      <select name="c_lang" class="form-select form-select-dark" aria-label="Default select example">
                                          <?php $c_lang =  isset($_POST['c_lang']) ? $_POST['c_lang'] : '' ?>
                                          <option value="0" <?php echo $c_lang == 0 ? 'selected' : '' ?>>فارسی</option>
                                          <option value="1" <?php echo $c_lang == 1 ? 'selected' : '' ?>>انگلیسی</option>
                                      </select>
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">تعداد دانشجویان</label>
                                      <input name="c_student" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_student']) ? $_POST['c_student'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">تعداد جلسات</label>
                                      <input name="c_session" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_session']) ? $_POST['c_session'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-6 mb-3">
                                      <label class="font-primary-color mb-3">طول دوره</label>
                                      <input name="c_duration" type="text" class="form-control form-control-dark font-primary-color" value="<?php echo isset($_POST['c_duration']) ? $_POST['c_duration'] : '' ?>">
                                  </div>
                                  <div class="form-group col-md-12 mb-3">
                                      <label class="font-primary-color mb-3">توضیحات دوره </label>
                                      <?php
                                        $content =  isset($_POST['c_title_desc']) ? $_POST['c_title_desc'] : '';
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
                                        $content = isset($_POST['c_desc']) ? $_POST['c_desc'] : '';
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
                                      <input name="add_new_course" class="v-btn v-btn-primary font-primary-color" type="submit" value="افزودن">
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