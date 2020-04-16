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
        <form method="get">
            <input type="text" name="search" placeholder="Sök..." class="search__input">
            <input type="submit" value="submit">
        </form>
    </article>

    <article class="filter">
        <form action="/about/news/" method="get" class="filter__form">

            <?php $monthNum = 1; ?>

            <?php foreach ($months as $month) : ?>

                <label for="<?php echo $month; ?>" class="filter__button"><?php echo $month; ?></label>
                <input type="submit" id="<?php echo $month; ?>" name="month" value="<?php echo $monthNum; ?>">

                <?php $monthNum++; ?>

            <?php endforeach; ?>
        </form>
    </article>

    <article class=" news__content">
        <?php

        if (isset($_GET['month']) && (!empty($_GET['month']))) {
            $month = trim(filter_var($_GET['month'], FILTER_SANITIZE_STRING));

            echo do_shortcode('[ajax_load_more post_type="article" no_results_text="Åh nej! Det finns tyvärr inga nyheter denna månaden" month="' . $month . '"]');
        } elseif (isset($_GET['search']) && (!empty($_GET['search']))) {
            $search = trim(filter_var($_GET['search'], FILTER_SANITIZE_STRING));

            echo do_shortcode('[ajax_load_more post_type="article" no_results_text="Åh nej! Det finns tyvärr inga nyheter på det du sökte search="' . $search . '"]');
        } else {
            echo do_shortcode('[ajax_load_more post_type="article" no_results_text="Åh nej! Det finns tyvärr inga nyheter denna månaden"]');
        }

        ?>
    </article>

</section>

<?php get_footer(); ?>
