<?php /* Template name: News */

get_header();

$months = [
    'januari',
    'februari',
    'mars',
    'april',
    'maj',
    'juni',
    'juli',
    'augusti',
    'september',
    'oktober',
    'november',
    'december'
];

?>

<section class="news">
    <h2 class="page__heading"><?php the_title(); ?></h2>

    <article class="search">
    </article>

    <article class="filter">
        <form action="/about/news/" method="get" class="filter__form">

            <?php foreach ($months as $month) : ?>

                <?php $monthNum = 1; ?>

                <label for="<?php echo $month; ?>" class="filter__button"><?php echo $month; ?></label>
                <input type="radio" id="<?php echo $month; ?>" name="month" value="<?php echo $month; ?>">

                <?php $monthNum++; ?>

            <?php endforeach; ?>
        </form>
    </article>

    <article class=" news__content">
        <?php if (isset($_GET['month'])) : ?>
            <?php var_dump($_GET); ?>
        <?php else : ?>
            <?php $counter = 0; ?>
            <?php echo do_shortcode('[ajax_load_more post_type="article" no_results_text="No articles."]'); ?>
        <?php endif; ?>
    </article>

</section>

<?php get_footer(); ?>
