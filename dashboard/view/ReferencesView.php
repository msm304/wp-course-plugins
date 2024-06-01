<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1 d-flex justify-content-between align-center align-items-center">
                    <h6 class="c-bold font-primary-color">مدیریت سرفصل ها</h6>
                    <a href="<?php echo site_url('dashboard/teachers/add-teacher') ?>" class="v-btn v-btn-success">افزودن سرفصل جدید</a>
                </div>
            </div>
            <div class="dashboard-container_body p-4">
                <div class="submit-section">
                    <div class="row">
                        <div class="col-sm-12 my-3">
                            <div class="accordion accordion-body-dark" id="accordionExample">
                                <?php if ($find_course_item) : ?>
                                    <?php foreach ($find_course_item as $item) : ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $item->id ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    <?php echo $item->c_title ?>
                                                </button>
                                            </h2>
                                            <div id="collapse-<?php echo $item->id ?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body accordion-body-dark">
                                                    <strong>This is the first item's accordion body.</strong> It
                                                    is shown by default, until the collapse plugin adds the
                                                    appropriate classes that we use to style each element. These
                                                    classes control the overall appearance, as well as the
                                                    showing and hiding via CSS transitions. You can modify any
                                                    of this with custom CSS or overriding our default variables.
                                                    It's also worth noting that just about any HTML can go
                                                    within the <code>.accordion-body</code>, though the
                                                    transition does limit overflow.
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="v-alert v-alert-danger">
                                        تاکنون دوره ای ثبت نشده است.
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>