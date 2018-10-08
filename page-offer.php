<?php
/*
 * Template Name: Offer
 */
get_header();
$page = new NS_Page;
?>
    <main id="<?= $page->class; ?>" class="window">
        <section class="about-content-container">
            <?php if(!empty($page->thumbnail)) : ?>
                <figure class="about-content-image">
                    <?= $page->thumbnail; ?>
                </figure>
            <?php endif; ?>
            <article class="about-content-text">
                <h1><?= $page->title; ?></h1>
                <?php
                foreach($page->subfields as $key => $rows) :
                    if(is_string($key)) : ?>
                        <h2><?= $key; ?></h2>
                    <?php endif; ?>
                    <article class="block-<?= $page->class; ?>">
                        <p><?= $rows['content']; ?></p>
                        <a class="rel-link-<?= $page->class; ?>" href="<?= $rows['rel_link']; ?>">See more</a>
                    </article>
                <?php endforeach; ?>
            </article>

        </section>
    </main>

<?php
get_footer();

