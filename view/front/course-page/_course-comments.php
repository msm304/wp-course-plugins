                            <div class="list-single-main-item fl-wrap">
                                <div class="list-single-main-item-title fl-wrap">
                                    <h3>تاکنون <span> <?php echo $Comment->count_comment($slug) ? $Comment->count_comment($slug) : '0'; ?> </span> دیدگاه ثبت شده است!</h3>
                                </div>

                                <div class="reviews-comments-wrap">
                                    <!-- reviews-comments-item -->
                                    <?php
                                    $comments = $Comment->find($slug);
                                    if ($comments) :
                                        foreach ($comments as $comment) :
                                    ?>
                                            <div class="reviews-comments-item">
                                                <div class="review-comments-avatar">
                                                    <?php echo get_avatar($comment->email, 80, '', $comment->full_name, ['class' => 'img-fluid']) ?>
                                                    <!-- <img src="assets/img/user-1.jpg" class="img-fluid" alt="" /> -->
                                                </div>
                                                <div class="reviews-comments-item-text">
                                                    <h4>
                                                        <a href="#"><?php echo $comment->full_name ?></a><span class="reviews-comments-item-date"><i class="ti-calendar theme-cl"></i>
                                                            <?php
                                                            $date = $comment->create_at;
                                                            $date = explode(" ", $date);
                                                            $date = explode('-', $date[0]);
                                                            $year = intval($date[0]);
                                                            $month = intval($date[1]);
                                                            $day = intval($date[2]);
                                                            $date = [$year, $month, $day];
                                                            $date = implode('-', $date);
                                                            echo Helper::toJalali($date, '-');
                                                            ?>
                                                        </span>
                                                    </h4>

                                                    <div class="listing-rating <?php echo $comment->rate > 3 ? 'high' : 'mid' ?>" data-starrating2="5">
                                                        <?php echo $Comment->rating_star($comment->rate) ?>
                                                        <span class="review-count"><?php echo $comment->rate ?></span>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <p>
                                                        <?php echo $comment->comment ?>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="alert alert-info">دیدگاهی ثبت نشد است</div>
                                    <?php endif; ?>
                                    <!--reviews-comments-item end-->
                                </div>

                            </div>

                            <!-- Submit Reviews -->
                            <div class="edu_wraper">
                                <h4 class="edu_title">ثبت دیدگاه</h4>
                                <?php $user = $User->is_user_student();
                                ?>
                                <?php if ($user) : ?>
                                    <div class="review-form-box form-submit">
                                        <form id="student-comment-form">
                                            <div class="row">

                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <label>متن دیدگاه</label>
                                                        <textarea class="form-control ht-140 student-comment" placeholder="دیدگاه خود را وارد نمایید"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="d-flex justify-content-between align-items-center comment-star-rating px-2 rounded mb-5 mt-4">
                                                            <span>میزان رضایت شما از این دوره </span>
                                                            <div class="wrap">
                                                                <div class="stars">
                                                                    <label class="rate">
                                                                        <input type="radio" name="radio1" class="star-rate" id="star1" value="1">
                                                                        <div class="face"></div>
                                                                        <i class="far fa-star star one-star"></i>
                                                                    </label>
                                                                    <label class="rate">
                                                                        <input type="radio" name="radio1" class="star-rate" id="star2" value="2">
                                                                        <div class="face"></div>
                                                                        <i class="far fa-star star two-star"></i>
                                                                    </label>
                                                                    <label class="rate">
                                                                        <input type="radio" name="radio1" class="star-rate" id="star3" value="3">
                                                                        <div class="face"></div>
                                                                        <i class="far fa-star star three-star"></i>
                                                                    </label>
                                                                    <label class="rate">
                                                                        <input type="radio" name="radio1" class="star-rate" id="star4" value="4">
                                                                        <div class="face"></div>
                                                                        <i class="far fa-star star four-star"></i>
                                                                    </label>
                                                                    <label class="rate">
                                                                        <input type="radio" name="radio1" class="star-rate" id="star5" value="5">
                                                                        <div class="face"></div>
                                                                        <i class="far fa-star star five-star"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-theme">
                                                            ثبت دیدگاه
                                                            <i class="ti-reload mx-2 loading-icon"></i>
                                                        </button>
                                                        <input type="hidden" class="c_slug" value="<?php echo $slug ?>">
                                                        <input type="hidden" class="c_id" value="<?php echo $Course->find($slug)->c_id ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                <?php else : ?>
                                    <div class="alert alert-info">برای ارسال دیدگاه ابتدا باید عضو دوره شوید.</div>
                                <?php endif; ?>
                            </div>

                            <!-- Instructor Detail -->
                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab"></div>

                            <!-- Reviews Detail -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab"></div>
                            </div>
                            </div>
                            </div>
                            <!-- end main course detail -->