<?php

function course_page()

{
    $Course = new Course();
    $Comment = new Comment();
    $User = new WCP_User();
    $slug = Helper::getSlug($_SERVER['REQUEST_URI']);
    $course = $Course->find($slug);
    $course_meta = $Course->find_course_meta($slug);
    $course_references = $Course->find_references($slug);
?>

    <!-- ============================ Page Title Start================================== -->
    <?php include WCP_PLUGIN_VIEW . 'front/course-page/_header.php' ?>
    <!-- ============================ Page Title End ================================== -->

    <!-- ============================ Course Detail ================================== -->
    <section class="bg-light">
        <div class="container video-section">
            <div class="row">
                <!-- start main course detail -->
                <div class="col-lg-8 col-md-8">
                    <?php include WCP_PLUGIN_VIEW . 'front/course-page/_video-player.php' ?>
                    <!-- _end thumbanil -->

                    <!-- All Info Show in Tab -->
                    <div class="tab_box_info mt-4">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Overview Detail -->
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <!-- Overview -->
                                <?php include WCP_PLUGIN_VIEW . 'front/course-page/_course-desc.php' ?>
                            </div>

                            <?php include WCP_PLUGIN_VIEW . 'front/course-page/_course-references.php' ?>

                            <!-- Overall Reviews -->
                            <?php include WCP_PLUGIN_VIEW . 'front/course-page/_course-total-rate.php' ?>

                            <?php include WCP_PLUGIN_VIEW . 'front/course-page/_course-teacher-resume.php' ?>

                            <!-- Reviews -->
                            <?php include WCP_PLUGIN_VIEW . 'front/course-page/_course-comments.php' ?>
                            <!-- start sidebar -->
                            <div class="col-lg-4 col-md-4">
                                <!-- Course info -->
                                <?php include WCP_PLUGIN_VIEW . 'front/course-page/_sidebar-course-price.php' ?>
                                <?php include WCP_PLUGIN_VIEW . 'front/course-page/_sidebar-course-info.php' ?>

                            </div>
                            <!-- end sidebar -->
                        </div>
                    </div>
    </section>
    <!-- ============================ Course Detail ================================== -->
<?php

}
add_shortcode('course-page', 'course_page');
