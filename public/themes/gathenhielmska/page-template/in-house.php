<?php /* Template name: In-house */ ?>

<?php get_header(); ?>

$managementMembers = get_posts(['post_type' => 'in-house']); ?>

<?php if (count($managementMembers)) : ?>
    <div>
        <div>
            <h2>Ledningsgrupp</h2>
            <ul>
                <?php foreach ($managementMembers as $post) : setup_postdata($post); ?>
                    <li>
                        <img src="<?php echo get_field('profile_image') ?>" alt="">
                        <h4><?php echo get_field('description') ?></h4>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<?php get_footer(); ?>
