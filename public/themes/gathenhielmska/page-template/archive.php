<?php /* Template name: Archive */

get_header();

$events = get_posts(['post_type' => 'archive-image']);
$videos = get_posts(['post_type' => 'archive-video']);
?>

<section class="archive">
    <article class="images">
        <h2 class="page__heading">Bilder</h2>

        <div class="images_search">
        </div>

        <div class="event_gallery">
            <?php if (count($events)) : ?>
                <?php foreach ($events as $post) : setup_postdata($post);  ?>

                    <?php $gallery = get_field('archive_image_gallery') ?>

                    <div class="album">
                        <div class="album__info">
                            <h3><?php the_title(); ?></h3>

                            <?php if ($gallery) : ?>
                                <p>(<?php echo count($gallery); ?>)</p>
                            <?php endif; ?>
                        </div>

                        <?php //print_r($gallery);
                        ?>

                        <?php if ($gallery) : ?>
                            <div class="album__slider">
                                <?php foreach ($gallery as $image) : ?>
                                    <div class="image <?php echo ($image['width'] > $image['height']) ? 'landscape' : 'portrait'; ?>">
                                        <img src="<?php echo $image['url']; ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <!--/event__gallery-->
    </article>

    <article class="videos">
        <h2 class="page__heading">Filmer</h2>

        <?php if (count($videos)) : ?>
            <?php foreach ($videos as $post) : setup_postdata($post);  ?>

                <?php

                $iframe = get_field('archive_video_url');

                // Use preg_match to find iframe src.
                preg_match('/src="(.+?)"/', $iframe, $matches);
                $src = $matches[1];

                // Add extra parameters to src and replace HTML.
                $params = [
                    'autoplay' => 1,
                    'controls'  => 1,
                    'hd'        => 1,
                    'autohide'  => 0,
                    'mute' => 1,
                    'enablejsapi' => 1
                ];

                $new_src = add_query_arg($params, $src);
                $iframe = str_replace($src, $new_src, $iframe);

                ?>

                <?php if ($iframe) :
                ?>
                    <div class="video">
                        <?php echo $iframe;
                        ?>
                        <button class="video__play" style="background-image: url('<?php echo get_field('archive_video_image')['url']; ?>')">
                            <img src="<?php echo get_template_directory_uri();
                                        ?>/assets/images/play.svg" alt="Play button">
                        </button>
                    </div>
                <?php endif; ?>



                <!-- <?php
                        // $youtube_video_url = get_field('archive_video_url', false, false);
                        // print_r($youtube_video_url);

                        // $embedUrl = str_replace('watch?=v=', 'embed/', $youtube_video_url,);

                        // print_r($embedUrl);
                        ?>

                <div class="video">
                    <button class="video__play" style="background-image: url('<?php //echo get_field('archive_video_image')['url'];
                                                                                ?>')">
                        <img src="<?php //echo get_template_directory_uri();
                                    ?>/assets/images/play.svg" alt="Play button">
                    </button>
                    <iframe width="560" height="315" src="<?php //echo $youtube_video_url;
                                                            ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div> -->




            <?php endforeach; ?>
        <?php endif; ?>
    </article>

</section>

<?php get_footer(); ?>
