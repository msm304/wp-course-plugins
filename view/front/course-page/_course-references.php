 <div class="edu_wraper">
     <h4 class="edu_title">جلسات دوره</h4>
     <div id="accordionExample" class="accordion circullum">
         <!-- Part 1 -->
         <?php
            if ($course_references) :
                foreach ($course_references as $reference) :
            ?>
                 <div class="card">
                     <div id="heading-<?php echo $reference->id ?>" class="card-header bg-white shadow-sm border-0">
                         <h6 class="mb-0 accordion_title">
                             <a href="#" data-toggle="collapse" data-target="#collapse-<?php echo $reference->id ?>" aria-expanded="true" aria-controls="collaps-<?php echo $reference->id ?>" class="d-block position-relative text-dark collapsible-link py-2"><?php echo $reference->title ?></a>
                         </h6>
                     </div>
                     <div id="collapse-<?php echo $reference->id ?>" aria-labelledby="heading-<?php echo $reference->id ?>" data-parent="#accordionExample" class="collapse show">
                         <div class="card-body pl-3 pr-3">
                             <ul class="lectures_lists">
                                 <?php
                                    $r_number = $reference->r_number;
                                    $course_videos = $Course->find_course_video($slug, $r_number);
                                    if ($course_videos) :
                                        foreach ($course_videos as $video) :
                                    ?>
                                         <li <?php echo $video->v_type == 1 ? 'class="unview"' : '' ?>>
                                             <div class="lectures_lists_title">
                                                 <i class="ti-control-play"></i>جلسه: <?php echo $video->v_number ?>
                                             </div>
                                             <!-- <a href="<?php /* echo $video->v_link */ ?>"><?php /* echo $video->title */ ?></a> -->
                                             <p class="video-title" data-link="<?php echo $video->v_link ?>"><?php echo $video->title ?></p>
                                             <span class="video-download-link">
                                                 <a href="<?php echo $video->v_link ?>"><i class="ti-download"></i></a>
                                             </span>
                                         </li>
                                     <?php endforeach; ?>
                                 <?php else : ?>
                                     <p class="alert alert-info">جلسه ای منتشر نشده است</p>
                                 <?php endif; ?>
                             </ul>
                         </div>
                     </div>
                 </div>
             <?php endforeach; ?>
         <?php else : ?>
             <span class="text-info">سر فصلی هنوز منتشر نشده است</span>
         <?php endif; ?>
     </div>
 </div>