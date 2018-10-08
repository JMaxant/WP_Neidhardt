<?php
/*
 * Template Name: About
 */
get_header();
$about = new NS_About;
 ?>

<main id="window" class="about-page">
    <?php if(!empty($about->cover)) : ?>
    <figure class="about-content-cover">
        <?= $about->cover; ?>
    </figure>
    <?php endif; ?>
    <div>
        <section id="introduction">
            <?php
            $i=1;
            foreach($about->block as $title => $content) : ?>
                <h<?= $i; ?>><?= $title; ?></h<?= $i; ?>>
                <p><?= $content; ?></p>
                <?php  $i++; endforeach; ?>
        </section>
        <section id="awards">
            <h2><?= $about->awards['subtitle']; ?></h2>
            <?php if(empty($about->awards['gallery'])) : ?>
                <p>Awards are for Losers. Until we get one.</p>
            <?php  else:
                $gallery = $about->awards['gallery'];
                foreach($gallery as $item) : ?>
                    <figure class="awards gallery">
                        <img class="img-responsive" src="<?= $item['img']['url']; ?>" alt="<?= $item['img']['alt'];?>"/>
                        <figcaption class="awards caption">
                            <p><?= $item['caption']; ?></p>
                        </figcaption>
                    </figure>
                <?php endforeach;
            endif;
            ?>
        </section>
        <section id="testimonials">
            <h2><?= $about->testimonials['subtitle'] ?></h2>
            <?php
            if(empty($about->testimonials['gallery'])) : ?>
            <?php else :
                $gallery = $about->testimonials['gallery'];
                foreach($gallery as $item) : ?>
                    <figure class="gallery testimonials">
                        <img class="img-responsive" src="<?= $item['img']['url']; ?>" alt="<?= $item['img']['alt'];?>"/>
                        <figcaption class="captions testimonials">
                            <p><?= $item['caption']; ?></p>
                        </figcaption>
                    </figure>
                <?php endforeach;
            endif; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>
