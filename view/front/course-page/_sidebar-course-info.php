  <div class="edu_wraper border">
      <h4 class="edu_title">ویژگی های دوره</h4>
      <ul class="edu_list right">
          <li>
              <i class="ti-user"></i>شرکت کنندگان:<strong><span><?php echo $course_meta->c_student ?></span> نفر</strong>
          </li>
          <li><i class="ti-game"></i>جلسات:<strong><?php echo $course_meta->c_session ?></strong></li>
          <li>
              <i class="ti-time"></i>مدت دوره:<strong><?php echo $course_meta->c_duration ?> ساعت</strong>
          </li>
          <li>
              <i class="ti-tag"></i>سطح دوره:<strong><?php echo $Course->course_level($course_meta->c_level) ?></strong>
          </li>
          <li>
              <i class="ti-flag-alt"></i>زبان:<strong><?php echo $Course->course_lang($course_meta->c_lang) ?></strong>
          </li>
          <li>
              <i class="ti-shine"></i>نوع دوره:<strong><?php echo $Course->course_type($course->c_type) ?></strong>
          </li>
      </ul>
  </div>