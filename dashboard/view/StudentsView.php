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
                            <td><?php
                                switch ($student->status) {
                                    case 0:
                                        echo '<span class="v-badge v-badge-danger">غیرفعال</span>';
                                        break;
                                    case 1:
                                        echo '<span class="v-badge v-badge-success">فعال</span>';
                                        break;
                                }
                                ?></td>
                            <td><?php echo Helper::toJalali($student->create_at, '-') ?></td>
                            <td>
                                <a href="" class="mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="ویرایش"><i class="ti-pencil-alt"></i></a>
                                <a href="" class="mx-1 wcp-delete-student" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف" data-id="<?php echo $student->id ?>"><i class="ti-trash"></i></a>
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