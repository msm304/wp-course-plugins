    <div class="rating-overview">
        <div class="rating-overview-box">
            <span class="rating-overview-box-total"><?php echo ceil(rtrim($Comment->comment_rate_avg($slug), 0)) ?></span>
            <span class="rating-overview-box-percent">از امتیاز 5</span>
            <div class="listing-rating <?php echo ceil(rtrim($Comment->comment_rate_avg($slug), 0)) > 3 ? 'high' : 'mid' ?>" data-rating=" 5">
                <?php echo $Comment->rating_star(ceil(rtrim($Comment->comment_rate_avg($slug), 0))) ?>
            </div>
        </div>

        <div class="rating-bars">
            <div class="rating-bars-item">
                <span class="rating-bars-name">5 ستاره</span>
                <span class="rating-bars-inner">
                    <span class="rating-bars-rating high" data-rating="4.7">
                        <span class="rating-bars-rating-inner" style="width: <?php echo $Comment->comment_rate_by_percent($slug, 5) ?>%"></span>
                    </span>
                    <strong><?php echo round($Comment->comment_rate_by_percent($slug, 5)) ?>%</strong>
                </span>
            </div>
            <div class="rating-bars-item">
                <span class="rating-bars-name">4 ستاره</span>
                <span class="rating-bars-inner">
                    <span class="rating-bars-rating good" data-rating="3.9">
                        <span class="rating-bars-rating-inner" style="width: <?php echo $Comment->comment_rate_by_percent($slug, 4) ?>%"></span>
                    </span>
                    <strong><?php echo round($Comment->comment_rate_by_percent($slug, 4)) ?>%</strong>
                </span>
            </div>
            <div class="rating-bars-item">
                <span class="rating-bars-name">3 ستاره</span>
                <span class="rating-bars-inner">
                    <span class="rating-bars-rating mid" data-rating="3.2">
                        <span class="rating-bars-rating-inner" style="width: <?php echo $Comment->comment_rate_by_percent($slug, 3) ?>%"></span>
                    </span>
                    <strong><?php echo round($Comment->comment_rate_by_percent($slug, 3)) ?>%</strong>
                </span>
            </div>
            <div class="rating-bars-item">
                <span class="rating-bars-name">1 ستاره</span>
                <span class="rating-bars-inner">
                    <span class="rating-bars-rating poor" data-rating="2.0">
                        <span class="rating-bars-rating-inner" style="width: <?php echo $Comment->comment_rate_by_percent($slug, 1) ?>%"></span>
                    </span>
                    <strong><?php echo round($Comment->comment_rate_by_percent($slug, 1)) ?>%</strong>
                </span>
            </div>
        </div>
    </div>