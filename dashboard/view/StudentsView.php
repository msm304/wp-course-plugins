<!-- search form -->
<?php
$flag = false;
if (isset($_POST['wcp_search_submit'])) {
    if (!isset($_POST['_wcp_student_search']) || !wp_verify_nonce($_POST['_wcp_student_search'], '_wcp_student_search')) {
        die('access denied!!!');
    }
    if (empty($_POST['wcp_keyword'])) {
        FlashMessage::addMsg('ایمیل یا شماره موبایل دانشجوی مورد نظر را وارد نمایید!', 0);
    } else {
        $flag = true;
    }
    // var_dump($student_search_results);
}
?>
<div class="row my-4">
    <div class="row">
        <div class="col-sm-12">
            <?php echo  FlashMessage::showMsg(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-10">
            <form action="" method="post" class="mb-5">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="wcp_keyword" class="form-control form-control-dark" id="searchStudent" placeholder="جستجو ...">
                    </div>
                    <div class="col-md-3">
                        <input type="submit" name="wcp_search_submit" class="v-btn v-btn-primary" value="جستجو" style="height: 54px;">
                        <?php wp_nonce_field('_wcp_student_search', '_wcp_student_search', '') ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2 align-items-center">
            <!-- <button class="v-btn v-btn-success px-4" data-bs-toggle="add_modal">افزودن دانشجو</button> -->
            <button class="v-btn v-btn-success px-4" type="button" data-bs-toggle="modal" data-bs-target="#add_student">
                افزودن دانشجو
            </button>
            <!-- Modal Add Student -->
            <div class="modal fade" id="add_student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content modal-content-dark">
                        <div class="modal-header modal-header-dark">
                            <h5 class="modal-title" id="exampleModalLabel">افزودن دانشجو</h5>
                        </div>
                        <div class="modal-body">
                            <form class="student-add row g-3 justify-content-end text-end">
                                <div class="col-md-6">
                                    <input type="hidden" id="idRow">
                                    <label for="newFullName" class="form-label">نام و نام خانوادگی</label>
                                    <input type="text" class="form-control wcp-input-color" id="newFullName">
                                </div>
                                <div class="col-md-6">
                                    <label for="newEmail" class="form-label">ایمیل</label>
                                    <input type="email" class="form-control wcp-input-color" id="newEmail">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputTitle" class="form-label">عنوان دوره</label>
                                    <input type="text" class="form-control wcp-input-color" id="inputTitle">
                                </div>
                                <div class="col-6">
                                    <label for="newSlug" class="form-label">شناسه دوره (Slug)</label>
                                    <input type="text" class="form-control wcp-input-color" id="newSlug">
                                </div>
                                <div class="col-6">
                                    <label for="inputIdCourse" class="form-label">آیدی دوره (Course ID)</label>
                                    <input type="text" class="form-control wcp-input-color" id="inputIdCourse">
                                </div>
                                <div class="col-6">
                                    <label for="inputIdStudent" class="form-label">آیدی دانشجو (Student ID)</label>
                                    <input type="text" class="form-control wcp-input-color" id="inputIdStudent">
                                </div>
                                <div class="col-6">
                                    <label for="newPhone" class="form-label">موبایل</label>
                                    <input type="text" class="form-control wcp-input-color" id="newPhone">
                                </div>
                                <div class="col-md-6">
                                    <label for="newPrice" class="form-label">قیمت</label>
                                    <input type="text" class="form-control wcp-input-color" id="newPrice">
                                </div>
                                <div class="col-md-12">
                                    <label for="newStatus" class="form-label">وضعیت</label>
                                    <select id="newStatus" class="form-select form-select-dark wcp-input-color">
                                        <option value="0">غیرفعال</option>
                                        <option value="1">فعال</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                </div>
                                <div class="modal-footer modal-footer-dark justify-content-center">
                                    <button type="button" class="v-btn v-btn-danger" data-bs-dismiss="modal" aria-label="Close">بستن
                                    </button>
                                    <button type="submit" class="v-btn v-btn-success">افزودن
                                        <i class="save-icon ti-reload loading-icon"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($flag) : ?>
        <?php if ($student_search_results) : ?>
            <div class="col-sm-12">
                <p class="mb-3">نتایج جستجو شما: <?php echo $_POST['wcp_keyword'] ?></p>
                <table class="table table-responsive table-striped dashboard-table-dark border-b-gray-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نام دوره</th>
                            <th scope="col">نام و نام خانوادگی</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">موبایل</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">تاریخ ثبت نام</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($student_search_results as $search_result) : ?>
                            <tr>
                                <th scope="row"><?php echo $search_result->id ?></th>
                                <td><?php echo $search_result->c_slug ?></td>
                                <td><?php echo $search_result->full_name ?></td>
                                <td><?php echo $search_result->email ?></td>
                                <td><?php echo $search_result->phone ?></td>
                                <td><?php echo number_format($search_result->price) ?> تومان</td>
                                <td>
                                    <span class="v-badge v-badge-<?php echo $search_result->status == 0 ? 'danger' : 'success' ?>"><?php echo $search_result->status == 0 ? 'غیرفعال' : 'فعال'   ?></span>
                                </td>
                                <td><?php echo Helper::toJalali($search_result->create_at, '-') ?></td>
                                <td>
                                    <div class="col-sm-12 my-3">
                                        <!-- Button trigger modal -->
                                        <button class="mx-1 wcp-edit-student-button" type="button" data-bs-toggle="modal" title="ویرایش" data-bs-target="<?php echo '#id-' . $search_result->id ?>">
                                            <i class="ti-pencil-alt"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="<?php echo 'id-' . $search_result->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content modal-content-dark">
                                                    <div class="modal-header modal-header-dark">
                                                        <h5 class="modal-title" id="exampleModalLabel">ویرایش اطلاعات دانشجو</h5>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form class="student-edit row g-3 justify-content-end text-end">
                                                            <div class="col-md-6">
                                                                <input type="hidden" id="idRow" value="<?php echo $search_result->id ?>">
                                                                <label for="inputFullName" class="form-label">نام و نام خانوادگی</label>
                                                                <input type="text" class="form-control wcp-input-color" id="inputFullName" value="<?php echo $search_result->full_name ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputEmail" class="form-label">ایمیل</label>
                                                                <input type="email" class="form-control wcp-input-color" id="inputEmail" value="<?php echo $search_result->email ?>">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="inputTitle" class="form-label">نام دوره</label>
                                                                <input type="text" class="form-control wcp-input-color" id="inputTitle" value="<?php echo $search_result->c_title ?>">
                                                            </div>
                                                            <div class="col-6">
                                                                <label for="inputPhone" class="form-label">موبایل</label>
                                                                <input type="text" class="form-control wcp-input-color" id="inputPhone" value="<?php echo $search_result->phone ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputPrice" class="form-label">قیمت</label>
                                                                <input type="text" class="form-control wcp-input-color" id="inputPrice" value="<?php echo number_format($search_result->price) ?>">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="inputDate" class="form-label">تاریخ ثبت نام</label>
                                                                <input type="text" class="form-control wcp-input-color" id="inputDate" data-date="<?php echo $search_result->create_at ?>" value="<?php echo Helper::toJalali($search_result->create_at, '-') ?>">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="inputStatus" class="form-label">وضعیت</label>
                                                                <select id="inputStatus" class="form-select form-select-dark wcp-input-color">
                                                                    <option value="0" <?php echo $search_result->status == 0 ? 'selected' : '' ?>>غیرفعال</option>
                                                                    <option value="1" <?php echo $search_result->status == 1 ? 'selected' : '' ?>>فعال</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-12">
                                                            </div>
                                                            <div class="modal-footer modal-footer-dark justify-content-center">
                                                                <button type="button" class="v-btn v-btn-danger" data-bs-dismiss="modal" aria-label="Close">بستن
                                                                </button>
                                                                <button type="submit" class="v-btn v-btn-success">ذخیره
                                                                    <i class="save-icon ti-reload loading-icon"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="mx-1 wcp-delete-student" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف" data-rowid="<?php echo $search_result->id ?>"><i class="ti-trash"></i></a>
                                    <i class="ti-reload loading-icon"></i>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else : ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="v-alert v-alert-primary">
                        دانشجو مورد نظر شما یافت نشد.
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</div>
<!-- End search form -->
<?php if ($students) : ?>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-responsive table-striped dashboard-table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">نام دوره</th>
                        <th scope="col">نام و نام خانوادگی</th>
                        <th scope="col">ایمیل</th>
                        <th scope="col">موبایل</th>
                        <th scope="col">قیمت</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">تاریخ ثبت نام</th>
                        <th scope="col">عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($students as $student) :
                        ?>
                            <th scope="row"><?php echo $student->id ?></th>
                            <td><?php echo $student->c_slug ?></td>
                            <td><?php echo $student->full_name ?></td>
                            <td><?php echo $student->email ?></td>
                            <td><?php echo $student->phone ?></td>
                            <td><?php echo number_format($student->price) ?> تومان</td>
                            <td>
                                <span class="v-badge v-badge-<?php echo $student->status == 0 ? 'danger' : 'success' ?>"><?php echo $student->status == 0 ? 'غیرفعال' : 'فعال'   ?></span>
                            </td>
                            <td><?php echo Helper::toJalali($student->create_at, '-') ?></td>
                            <td>
                                <div class="col-sm-12 my-3">
                                    <!-- Button trigger modal -->
                                    <button class="mx-1 wcp-edit-student-button" type="button" data-bs-toggle="modal" title="ویرایش" data-bs-target="<?php echo '#id-' . $student->id ?>">
                                        <i class="ti-pencil-alt"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="<?php echo 'id-' . $student->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content modal-content-dark">
                                                <div class="modal-header modal-header-dark">
                                                    <h5 class="modal-title" id="exampleModalLabel">ویرایش اطلاعات دانشجو</h5>
                                                </div>
                                                <div class="modal-body">
                                                    <form class="student-edit row g-3 justify-content-end text-end">
                                                        <div class="col-md-6">
                                                            <input type="hidden" id="idRow" value="<?php echo $student->id ?>">
                                                            <label for="inputFullName" class="form-label">نام و نام خانوادگی</label>
                                                            <input type="text" class="form-control wcp-input-color" id="inputFullName" value="<?php echo $student->full_name ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputEmail" class="form-label">ایمیل</label>
                                                            <input type="email" class="form-control wcp-input-color" id="inputEmail" value="<?php echo $student->email ?>">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="inputTitle" class="form-label">نام دوره</label>
                                                            <input type="text" class="form-control wcp-input-color" id="inputTitle" value="<?php echo $student->c_title ?>">
                                                        </div>
                                                        <div class="col-6">
                                                            <label for="inputPhone" class="form-label">موبایل</label>
                                                            <input type="text" class="form-control wcp-input-color" id="inputPhone" value="<?php echo $student->phone ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputPrice" class="form-label">قیمت</label>
                                                            <input type="text" class="form-control wcp-input-color" id="inputPrice" value="<?php echo number_format($student->price) ?>">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="inputDate" class="form-label">تاریخ ثبت نام</label>
                                                            <input type="text" class="form-control wcp-input-color" id="inputDate" data-date="<?php echo $student->create_at ?>" value="<?php echo Helper::toJalali($student->create_at, '-') ?>">
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label for="inputStatus" class="form-label">وضعیت</label>
                                                            <select id="inputStatus" class="form-select form-select-dark wcp-input-color">
                                                                <option value="0" <?php echo $student->status == 0 ? 'selected' : '' ?>>غیرفعال</option>
                                                                <option value="1" <?php echo $student->status == 1 ? 'selected' : '' ?>>فعال</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                        </div>
                                                        <div class="modal-footer modal-footer-dark justify-content-center">
                                                            <button type="button" class="v-btn v-btn-danger" data-bs-dismiss="modal" aria-label="Close">بستن
                                                            </button>
                                                            <button type="submit" class="v-btn v-btn-success">ذخیره
                                                                <i class="save-icon ti-reload loading-icon"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="mx-1 wcp-delete-student" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف" data-rowid="<?php echo $student->id ?>"><i class="ti-trash"></i></a>
                                <i class="ti-reload loading-icon"></i>
                            </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <div class="v-alert v-alert-danger">
                دانشجویی ثبت نام نکرده است.
            </div>
        <?php endif; ?>
        </div>
    </div>