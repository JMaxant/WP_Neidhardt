<?php
/*
 * Template Name: Index
 */
get_header();
$class = ' overlay-aside';
$index = new NS_Index;

?>

<main id="<?= $index->class; ?>" class="window">
    <section class="content">
        <div class="swiper-container swiper-container-horizontal">
            <div class="swiper-wrapper">
                <?php foreach($index->fields as $key => $field) : ?>
                    <div class="swiper-slide">
                        <?= $field['media']; ?>
                        <div class="swiper-slide-overlay<?php if($key != 0) { echo $class; } ?>">
                            <?php if($key == 0) : ?>
                            <h1><?= $field['title']; ?></h1>
                            <h2><?= $field['desc']; ?></h2>
                            <?php else: ?>
                            <h2><?= $field['title']; ?></h2>
                            <p><?= $field['desc']; ?></p>
                            <?php endif;?>
                            <div class="button">
                                <?php
                                if(!empty($field['links'])):
                                    foreach($field['links'] as $item) : ?>

                                    <a href="<?= get_permalink($item['link']->ID); ?>">
                                        <?php if($key == 0) {
                                            echo $item['link']->post_title;
                                        } else {
                                            echo 'Learn more';
                                        };?>
                                    </a>
                                    <?php
                                    endforeach;
                                endif ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        <div class="swiper-scrollbar"></div>
        </div>
    </section>
</main>


<?php get_footer(); ?>

