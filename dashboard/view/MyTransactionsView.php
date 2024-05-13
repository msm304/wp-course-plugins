<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard-container dark-light">
            <div class="dashboard-container_header">
                <div class="dashboard_fl_1">
                    <h6 class="c-bold font-primary-color">پرداخت های من</h6>
                </div>
            </div>
            <div class="dashboard-container_body p-4">

                <div class="submit-section">
                    <?php if ($user_transactions) : ?>
                        <table class="table table-responsive table-striped dashboard-table-dark">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">عنوان دوره</th>
                                    <th scope="col">نام و نام خانوادگی</th>
                                    <th scope="col">ایمیل</th>
                                    <th scope="col">موبایل</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">شماره سفارش</th>
                                    <th scope="col">شماره پیگیری</th>
                                    <th scope="col">وضعیت پرداخت</th>
                                    <th scope="col">تاریخ پرداخت</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($user_transactions as $user_transaction) :
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $user_transaction->id ?></th>
                                        <td><?php echo $user_transaction->c_title ?></td>
                                        <td><?php echo $user_transaction->first_name . ' ' . $user_transaction->last_name ?></td>
                                        <td><?php echo $user_transaction->email ?></td>
                                        <td><?php echo $user_transaction->phone ?></td>
                                        <td><?php echo number_format($user_transaction->price) ?> تومان</td>
                                        <td><?php echo $user_transaction->order_number ?></td>
                                        <td><?php echo $user_transaction->ref_id != '' ? $user_transaction->ref_id : '-' ?></td>
                                        <td><?php
                                            switch ($user_transaction->status) {
                                                case 0:
                                                    echo '<span class="v-badge v-badge-danger">ناموفق</span>';
                                                    break;
                                                case 1:
                                                    echo '<span class="v-badge v-badge-success">موفق</span>';
                                                    break;
                                            }
                                            ?></td>
                                        <td><?php echo Helper::toJalali($user_transaction->create_at, '-') ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php else : ?>
                        <div class="v-alert v-alert-danger">
                            تاکنون تراکنشی انجام نشده است.
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</div>