<div class="col-sm-12 my-3">
    <?php if ($transactions) : ?>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-responsive table-striped dashboard-table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">نوع دوره</th>
                            <th scope="col">نام و نام خانوادگی</th>
                            <th scope="col">ایمیل</th>
                            <th scope="col">قیمت</th>
                            <th scope="col">شماره سفارش</th>
                            <th scope="col">شماره تراکنش</th>
                            <th scope="col">وضعیت</th>
                            <th scope="col">تاریخ پرداخت</th>
                            <th scope="col">عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transactions as $transaction) : ?>
                            <tr>
                                <td><?php echo $transaction->id ?></td>
                                <td>
                                    <?php
                                    switch ($transaction->plan_type) {
                                        case 0:
                                            echo '<span class="v-btn v-btn-primary px-2">رایگان</span>';
                                            break;
                                        case 1:
                                            echo '<span class="v-btn v-btn-danger px-2">پولی</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><?php echo $transaction->first_name . ' ' . $transaction->last_name ?></td>
                                <td><?php echo $transaction->email ?></td>
                                <td><?php echo $transaction->price ?></td>
                                <td><?php echo $transaction->order_number ?></td>
                                <td><?php echo $transaction->refNumber ?></td>
                                <td>
                                    <?php
                                    switch ($transaction->status) {
                                        case 0:
                                            echo '<span class="v-badge v-badge-danger">ناموفق</span>';
                                            break;
                                        case 1:
                                            echo '<span class="v-badge v-badge-success">موفق</span>';
                                            break;
                                    }
                                    ?>
                                </td>
                                <td><?php echo Helper::toJalali($transaction->create_at, '-') ?></td>
                                <td>
                                    <button class="mx-1 wcp-edit-student-button" type="button" data-bs-toggle="modal" title="ویرایش">
                                        <i class="ti-pencil-alt"></i>
                                    </button>

                                    <a href="#" class="mx-1 wcp-delete-transaction" data-bs-toggle="tooltip" data-bs-placement="top" title="حذف" data-transactionid="<?php echo $transaction->id ?>"><i class="ti-trash"></i></a>
                                    <i class="ti-reload loading-icon"></i>
                                </td>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <div class="v-alert v-alert-primary">
                    تاکنون تراکنشی ثبت نشده است.
                </div>
            <?php endif; ?>
            </div>
        </div>

</div>