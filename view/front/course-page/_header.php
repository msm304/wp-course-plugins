<div class="ed_detail_head">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-7">
                <div class="ed_detail_wrap">
                    <ul class="cources_facts_list">
                        <?php
                        $tags = Helper::explodeString($course->c_tags);
                        if ($tags) :
                            foreach ($tags as $tag) :
                        ?>
                                <li class="facts-1"><?php echo $tag ?></li>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                    <div class="ed_header_caption">
                        <h2 class="ed_title"><?php echo $course->c_title ?></h2>
                    </div>
                    <div class="ed_header_short">
                        <p>
                            <?php echo $course->c_title_desc ?>
                        </p>
                    </div>

                    <!-- <div class="ed_rate_info">
                        <div class="star_info">
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star filled"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="review_counter">
                            <strong class="high">4.7</strong> 3572 امتیاز
                        </div>
                    </div> -->
                </div>
            </div>

            <div class="col-lg-4 col-md-5">
                <div class="property_video">
                    <div class="thumb">
                        <img class="pro_img img-fluid w100" src="<?php echo $course->c_tumbnail ?>" alt="7.jpg" />
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>