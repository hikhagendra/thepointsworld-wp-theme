<?php get_header();
$current_user = wp_get_current_user();
$product_id = get_post_meta(get_the_ID(), '_course_product_id', true);
$has_purchased = wc_customer_bought_product($current_user->user_email, $current_user->ID, $product_id);
?>

<div class="tpw-flex">
    <aside class="tpw-w-1/4 tpw-bg-gray-100 tpw-rounded tpw-shadow-inner tpw-sticky tpw-top-0 tpw-h-[calc(100vh-2rem)] tpw-overflow-y-auto">
        <h2 class="tpw-text-2xl tpw-font-bold tpw-p-4">Course Content</h2>
        <?php if (have_rows('tpw_course_chapters')): ?>
            <!-- Navigation -->
            <div class="tpw-w-full tpw-bg-gray-100">
                <ul id="chapter-nav" class="">
                    <?php $index = 0; ?>
                    <?php while (have_rows('tpw_course_chapters')) : the_row();
                    $chapter_title = get_sub_field('tpw_chapter_title');
                    $chapter_id = sanitize_title($chapter_title); ?>
                        <li class="tpw-m-0">
                            <a href="#<?php echo $chapter_id; ?>" class="chapter-nav-item tpw-block tpw-py-4 hover:tpw-bg-gray-200 tpw-text-black hover:tpw-text-black tpw-px-4 <?php echo !$has_purchased ? 'locked' : ''; ?> <?php if($index == 0) {echo 'tpw-course-nav-active';} ?>" data-chapter="<?php echo $index; ?>" <?php echo !$has_purchased ? 'data-tooltip="Locked"' : ''; ?>>
                                <?php echo $chapter_title; ?>

                                <?php if (!$has_purchased && $index > 0): ?>
                                    <span class="lock-icon tpw-ml-2 tpw-float-right"><i class="fas fa-lock"></i></span>
                                <?php endif; ?>
                            </a>
                        </li>
                        <?php $index++; ?>
                    <?php endwhile; ?>
                </ul>
            </div>
        <?php endif; ?>
    </aside>
    
    <div class="tpw-w-3/4 tpw-ml-8">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="tpw-bg-white tpw-rounded tpw-p-6">
                <div class="tpw-course-header tpw-mb-8">
                    <h1 class="tpw-text-4xl tpw-font-bold tpw-mb-4"><?php the_title(); ?></h1>
                    <div class="tpw-course-meta tpw-flex tpw-items-center tpw-text-gray-600 tpw-space-x-4">
                        <span class="tpw-text-sm"><i class="fas fa-user tpw-mr-1"></i> Instructor: <?php the_author(); ?></span>
                        <span class="tpw-text-sm"><i class="fas fa-calendar-alt tpw-mr-1"></i> Published: <?php the_date(); ?></span>
                    </div>
                </div>
                <div class="tpw-prose tpw-max-w-none tpw-mb-8">
                    <?php the_content(); ?>
                </div>

                <?php if (is_user_logged_in() && $has_purchased): ?>
                    <?php if (have_rows('tpw_course_chapters')): ?>
                        <div class="tpw-flex tpw-flex-col md:tpw-flex-row tpw-space-y-4 md:tpw-space-y-0 md:tpw-space-x-4">
                            <!-- Chapters -->
                            <div class="tpw-w-full tpw-bg-white tpw-p-4 tpw-rounded tpw-shadow">
                                <?php $index = 0; ?>
                                <?php while (have_rows('tpw_course_chapters')) : the_row(); ?>
                                    <div class="chapter-content tpw-hidden" data-chapter="<?php echo $index; ?>">
                                        <h2 class="tpw-text-3xl tpw-font-bold tpw-mb-4"><?php the_sub_field('tpw_chapter_title'); ?></h2>
                                        <?php if ($video_url = get_sub_field('tpw_chapter_video')): ?>
                                            <div class="tpw-video tpw-mb-8">
                                                <video controls class="tpw-w-full">
                                                    <source src="<?php echo esc_url($video_url['url']); ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                        <?php endif; ?>
                                        <div class="tpw-mb-4"><?php wpautop(the_sub_field('tpw_chapter_description')); ?></div>
                                    </div>
                                    <?php $index++; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="tpw-course-intro">
                        <?php if (have_rows('tpw_course_chapters')): the_row(); ?>
                            <div class="chapter tpw-p-6 tpw-rounded tpw-shadow-inner">
                                <h3 class="tpw-text-2xl tpw-font-semibold tpw-mb-4"><?php the_sub_field('tpw_chapter_title'); ?></h3>
                                <?php if ($video_url = get_sub_field('tpw_chapter_video')): ?>
                                    <div class="tpw-video tpw-mb-4">
                                        <video controls class="tpw-w-full">
                                            <source src="<?php echo esc_url($video_url['url']); ?>" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                <?php endif; ?>
                                <div class="tpw-mb-4"><?php the_sub_field('tpw_chapter_description'); ?></div>
                            </div>
                        <?php endif; ?>

                        <div class="tpw-mt-8 tpw-text-center">
                            <p class="tpw-text-red-500 tpw-font-semibold tpw-mb-4">To access all chapters, please purchase the course.</p>
                            <a href="<?php echo esc_url( wc_get_checkout_url() . '?add-to-cart=' . $product_id ); ?>" class="tpw-inline-block tpw-bg-secondary tpw-text-white tpw-py-2 tpw-px-4 tpw-rounded tpw-font-semibold tpw-hover:bg-secondary-dark">Purchase Course</a>
                        </div>
                    </div>
                <?php endif; ?>
            </article>
            <?php if (is_user_logged_in() && $has_purchased): ?>
                <div id="review-form-wrapper" class="tpw-m-8">
                    <h3 class="tpw-text-2xl tpw-font-bold tpw-mb-4">Leave a Review</h3>
                    <form id="review-form" class="tpw-bg-white tpw-p-4 tpw-rounded tpw-shadow">
                        <input type="hidden" name="course_id" value="<?php echo get_the_ID(); ?>">
                        <div class="tpw-mb-4">
                            <label for="review_rating" class="tpw-block tpw-font-semibold tpw-mb-2">Your Rating:</label>
                            <div class="tpw-star-rating">
                                <?php for ($i = 1; $i <= 5; $i++): ?>
                                    <input type="radio" id="star-<?php echo $i; ?>" name="review_rating" value="<?php echo $i; ?>" class="tpw-hidden">
                                    <label for="star-<?php echo $i; ?>" class="tpw-inline-block tpw-text-2xl tpw-cursor-pointer"><i class="far fa-star"></i></label>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="tpw-mb-4">
                            <label for="review_content" class="tpw-block tpw-font-semibold tpw-mb-2">Your Review:</label>
                            <textarea id="review_content" name="review_content" class="tpw-w-full tpw-p-2 tpw-border tpw-rounded" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="tpw-bg-primary tpw-text-white tpw-py-2 tpw-px-4 tpw-rounded tpw-font-semibold tpw-hover:bg-primary-dark">Submit Review</button>
                    </form>
                    <div id="thank-you-message" class="tpw-hidden tpw-mt-4 tpw-text-green-500 tpw-font-semibold">Thank you for your review!</div>
                </div>
            <?php endif; ?>
        <?php endwhile; endif; ?>
    </div>
</div>

<?php get_footer(); ?>
