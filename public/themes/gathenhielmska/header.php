<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#6d9aea">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <nav>
        <ul>
            <?php foreach (get_pages(['sort_column' => 'menu_order']) as $page) : ?>
                <li>
                    <a class="nav-link" href="<?php echo get_permalink($page); ?>">
                        <?php echo $page->post_title; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
