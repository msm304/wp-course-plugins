<?php
referencesController::deleteAction();
// var_dump(error_log(print_r($_POST, true)));
?>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1 d-flex justify-content-between align-center align-items-center">
                    <h6 class="c-bold font-primary-color">مدیریت سرفصل ها</h6>
                    <a href="<?php echo site_url('dashboard/teachers/add-teacher') ?>" class="v-btn v-btn-success  me-auto" data-bs-toggle="modal" data-bs-target="#add-new-reference">افزودن سرفصل جدید</a>
                    <a href="<?php echo site_url('dashboard/courses/references/add-session') ?>" class="v-btn v-btn-primary me-2">افزودن جلسه جدید</a>
                </div>
            </div>
            <div class="dashboard-container_body p-4">
                <div class="submit-section">
                    <div class="row">
                        <div class="col-sm-12 my-3">
                            <?php echo FlashMessage::showMsg(); ?>
                            <div class="accordion accordion-body-dark" id="accordionExample">
                                <?php if ($find_course_title) : ?>
                                    <?php foreach ($find_course_title as $item) : ?>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $item->id ?>" aria-expanded="true" aria-controls="collapseOne">
                                                    <?php echo $item->c_title ?>
                                                </button>
                                            </h2>
                                            <div id="collapse-<?php echo $item->id ?>" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                <div class="accordion-body accordion-body-dark">
                                                    <ul>
                                                        <?php
                                                        $course_references = referencesController::getReferenceAction($item->id);
                                                        if ($course_references) :
                                                            foreach ($course_references as $course_reference) :
                                                        ?>
                                                                <li class="d-reference-list d-flex align-items-center my-4 rounded p-3 v-li-bg-primary-color">
                                                                    <span class="d-flex justify-content-center align-items-center me-3 ml-2 r-number" contenteditable="true"><?php echo $course_reference->r_number ?></span>
                                                                    <span class="r-title" contenteditable="true"><?php echo $course_reference->title ?></span>
                                                                    <span>
                                                                        <a href="<?php echo site_url('dashboard/courses/references?cid=') . $item->id . '&rid=' . $course_reference->id ?>" class="p-1"><i class="ti-close"></i></a>
                                                                        <a href="#" class="wcp-update-reference p-1" data-id="<?php echo $course_reference->id ?>"><i class="ti-pencil-alt"></i></a>
                                                                    </span>
                                                                </li>
                                                                <?php $course_videos = referencesController::getSubReferenceAction($item->id) ?>
                                                                <?php if ($course_videos) : ?>
                                                                    <?php foreach ($course_videos as $video) : ?>
                                                                        <ul class="ms-5 me-3">
                                                                            <li class="d-reference-list d-flex align-items-center my-4">
                                                                                <span class="d-flex justify-content-center align-items-center me-3 sub-r-number"><?php echo $video->v_number ?></span>
                                                                                <span class="sub-r-title me-3"><?php echo $video->title ?></span>
                                                                                <span>
                                                                                    <a href="<?php echo site_url('dashboard/courses/references?cid=') . $item->id . '&rid=' . $video->id ?>" class="p-1"><i class="ti-close"></i></a>
                                                                                    <a href="#" class="wcp-update-reference p-1" data-id="<?php echo $video->id ?>"><i class="ti-pencil-alt"></i></a>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    <?php endforeach; ?>
                                                                <?php else : ?>
                                                                    <div class="v-alert v-alert-primary">
                                                                        تاکنون ویدیویی منتشر نشده است.
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endforeach; ?>
                                                        <?php else : ?>
                                                            <div class="v-alert v-alert-info">
                                                                تاکنون سرفصلی ثبت نشده است.
                                                            </div>
                                                        <?php endif; ?>
                                                    </ul>
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

<!-- Modal -->
<div class="modal fade" id="add-new-reference" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-dark">
            <div class="modal-header modal-header-dark">
                <h5 class="modal-title" id="exampleModalLabel">افزودن سرفصل جدید
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="wcp-add-new-reference" action="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="my-3">
                                <select class="form-select form-select-dark course-id-slug" aria-label="Default select example">
                                    <?php
                                    if ($find_course_title && $find_course_title > 0) :
                                        foreach ($find_course_title as $item) :
                                    ?>
                                            <option class="reference-title-new" value="<?php echo $item->c_id ?>|<?php echo $item->c_slug ?>"><?php echo $item->c_title ?></option>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <option>تاکنون دوره ای ایجاد نشده است</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group input-group col-sm-12 mb-3 p-0 input-group-border-0">
                                <div class="input-group-prepend col-sm-2 ps-0 pr-0 ml-2">
                                    <input type="text" class="form-control form-control-dark font-primary-color reference-number text-center" placeholder="شماره ..." value="1">
                                </div>
                                <input type="text" class="form-control form-control-dark font-primary-color reference-new-title" placeholder=" عنوان سرفصل ...">
                                <div class="input-group-append">
                                    <button class="btn btn-success btn-submit-insert-reference"><i class="ti-plus"></i></button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>