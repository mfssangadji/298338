<?php $__env->startSection('title', 'Kota Ternate'); ?>
<?php $__env->startSection('content'); ?>
    <!-- LayerSlider  -->
    <?php echo $__env->make('parts.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- LayerSlider / End -->

    <!-- 960 Container -->
    <div class="container">

        <!-- Testimonials -->
        <div class="one-third columns">

            <h3 class="margin-1">Peringatan Dini</h3>
            <!-- Testimonial Rotator -->
            <section class="flexslider testimonial-slider">
                <ul class="slides">
                    <li class="testimonial">
                        <div class="testimonials">Integer eu libero sit amet nisl vestibulum semper. Fusce costant Proin sit amet mauris odio pellentesque iaculis posuer dapibus natoque penatibus et magnis dis parturient montes.</div>
                        <div class="testimonials-bg"></div>
                    </li>
                    <!-- <li class="testimonial">
                        <div class="testimonials">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                        <div class="testimonials-bg"></div>
                    </li> -->
                    <div class="testimonials-author"><a href="#">Selengkapnya..</a></div>
                </ul>
            </section>
            <!-- Testomonial Rotator / End -->

        </div>

    </div>
    <!-- 960 Container / End -->

    <!-- 960 Container -->
    <div class="container floated">
        <div class="blank floated">

            <!-- Recent Work Entire -->
            <div class="four columns carousel-intro">

                <section class="entire">
                    <h3>Prakiraan Cuaca</h3>
                    <p align="justify">Data prakiraan cuaca seluruh kabupaten dan kota di Maluku Utara dalam waktu 3 harian.</p>
                </section>

                <div class="carousel-navi">
                    <div id="work-prev" class="arl jcarousel-prev"><i class="icon-chevron-left"></i></div>
                    <div id="work-next" class="arr jcarousel-next"><i class="icon-chevron-right"></i></div>
                </div>
                <div class="clearfix"></div>

            </div>

            <!-- jCarousel -->
            <section class="jcarousel recent-work-jc">
                <ul>
                    <!-- Recent Work Item -->
                    <?php $__currentLoopData = $forecast; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="four columns">
                            <a href="single-project.html" class="portfolio-item">
                                <figure>
                                    <center>
                                    <img src="<?php echo e(url('uploads/weather/'.strtolower(str_replace(' ', '', $weatherCode[$val['weather']['value']['icon'][$dtime_ext[$key]]]).'-'.$now->format('A')))); ?>.png" alt="" style="padding: 10px;" />
                                    </center>
                                    <figcaption class="item-description">
                                        <h5><?php echo e($w[$key]); ?></h5>
                                        <span>
                                            <?php echo e($weatherCode[$val['weather']['value']['icon'][$dtime_ext[$key]]]); ?> <br>
                                            (Suhu <?php echo e($val['t']['value']['C'][$dtime_ext[$key]].' - '.$val['t']['value']['C'][$dtime_ext[$key]+2]); ?>&#8451;) 
                                        </span>
                                    </figcaption>
                                </figure>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </section>
            <!-- jCarousel / End -->

        </div>
    </div>
    <!-- 960 Container / End -->

    <!-- 960 Container -->
    <div class="container">
        <!-- Icon Boxes -->
        <section class="icon-box-container">

            <!-- Icon Box Start -->
            <div class="one-third column">
                <article class="icon-box">
                    <i class="icon-bullhorn"></i>
                    <h3>Clean Design</h3>
                    <p>Incredibly clean design provides you powerful way to grow your business.</p>
                </article>
            </div>
            <!-- Icon Box End -->

            <!-- Icon Box Start -->
            <div class="one-third column">
                <article class="icon-box">
                    <i class="icon-magic"></i>
                    <h3>Responsive</h3>
                    <p>This theme is responsive, so it will looks awesome on all mobile devices. </p>
                </article>
            </div>
            <!-- Icon Box End -->

            <!-- Icon Box Start -->
            <div class="one-third column">
                <article class="icon-box">
                    <i class="icon-flask"></i>
                    <h3>Retina Ready</h3>
                    <p>Nevia is ready for retina and looks fantastic on high-resolution displays.</p>
                </article>
            </div>
            <!-- Icon Box End -->

        </section>
        <!-- Icon Boxes / End -->
    </div>
    <!-- 960 Container / End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pro\stamet-ternate\resources\views/welcome.blade.php ENDPATH**/ ?>