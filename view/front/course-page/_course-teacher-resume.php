 <div class="single_instructor">
     <?php $teacher = $Course->find_course_teacher($course->t_id);
        if ($teacher) :
            $teacher_resume = Helper::explodeString($teacher->t_desc);
        ?>
         <div class="single_instructor_thumb">
             <?php
                $t_email = $teacher->t_email;
                $t_fullname = $teacher->t_fullname;
                ?>
             <?php echo get_avatar($t_email, 230, '', $t_fullname, ['class' => 'img-fluid']) ?>
             <!-- <a href="#"><img src="assets/img/user-3.jpg" class="img-fluid" alt="" /></a> -->
         </div>
         <div class="single_instructor_caption">
             <h4><a href="#"><?php echo $t_fullname ?></a></h4>
             <ul class="instructor_info">
                 <li><i class="ti-video-camera"></i>72 ویدئو</li>
                 <li><i class="ti-control-forward"></i>102 دوره</li>
                 <li><i class="ti-user"></i>آپدیت بهمن ماه</li>
             </ul>
             <ul class="lists-3 teacher-resume">
                 <?php if ($teacher_resume) : ?>
                     <?php foreach ($teacher_resume as $resume) : ?>
                         <li><?php echo $resume ?></li>
                     <?php endforeach; ?>
                 <?php else : ?>
                     <div class="alert alert-info">اطلاعاتی ثبت نشده است</div>
                 <?php endif; ?>
             </ul>
             <ul class="social_info">
                 <li>
                     <a href="<?php echo $teacher->t_telegram ?>"><i class="ti-location-arrow"></i></a>
                 </li>
                 <li>
                     <a href="<?php echo $teacher->t_twitter ?>"><i class="ti-twitter"></i></a>
                 </li>
                 <li>
                     <a href="<?php echo $teacher->t_linkedin ?>"><i class="ti-linkedin"></i></a>
                 </li>
                 <li>
                     <a href="<?php echo $teacher->t_instagram ?>"><i class="ti-instagram"></i></a>
                 </li>
             </ul>
         </div>
     <?php else : ?>
         <div class="alert alert-info">مدرسی برای این دوره یافت نشد</div>
     <?php endif; ?>
 </div>