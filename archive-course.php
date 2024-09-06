<?php
/*
Template Name: Courses
*/
get_header(); ?>

<div class="tpw-container tpw-mx-auto tpw-py-12">
    <h1 class="tpw-text-4xl tpw-font-bold tpw-mb-8">Courses</h1>
    <div class="tpw-grid tpw-grid-cols-1 md:tpw-grid-cols-2 lg:tpw-grid-cols-3 tpw-gap-8">
        <?php
        $courses = new WP_Query(array(
            'post_type' => 'course', // Assuming 'course' is the custom post type for courses
            'posts_per_page' => -1,
        ));

        if ($courses->have_posts()) :
            while ($courses->have_posts()) : $courses->the_post(); ?>
                <div class="tpw-bg-white tpw-rounded tpw-shadow tpw-p-6">
                    <h2 class="tpw-text-2xl tpw-font-bold tpw-mb-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="tpw-text-gray-600 tpw-mb-4"><?php the_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" class="tpw-inline-block tpw-bg-primary tpw-text-white tpw-py-2 tpw-px-4 tpw-rounded tpw-font-semibold tpw-hover:bg-primary-dark">View Course</a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p>No courses found.</p>
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>