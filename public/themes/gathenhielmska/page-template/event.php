<?php /* Template name: Event */ ?>

<?php get_header(); ?>
    <h2><?php the_title(); ?></h2>
    <?php $args =
        ['post_type' => 'event_listing']
    ?>
    <?php $events = get_posts($args) ?>


    <?php if (count($events)): ?>

        <?php foreach ($events as $post): setup_postdata($post); ?>

        <?php $month = date_i18n('F', strtotime($post->post_date));?>

            <h1><?php  the_title();?></h1>
            <p><?php echo get_metadata('post', $post->ID, '_event_description', true); ?></p>
            <p><?php echo $post->post_content;?></p>
            <button><a href="<?php the_permalink();?>"></a></button>

        <?php endforeach; ?>
    <?php endif ;?>

<?php get_footer(); ?>
