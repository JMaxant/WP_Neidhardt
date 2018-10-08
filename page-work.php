<?php
/*
 * Template Name: work
 */
get_header();
$work = new NS_Work;
?>
<main id="work" class="window">
    <section class="projects-grid">
        <div class="toolbar">
            <?php for($i=0; $i < count($work->tags->name); $i++) : ?>
                <button class="btn fil-cat btn-inner <?php if($work->tags->anchor[$i] === $work->active_category) : ?>selected <?php endif; ?>" data-rel="<?= $work->tags->anchor[$i] ?>">
                    <span><?= $work->tags->name[$i] ?></span>
                </button>
            <?php endfor; ?>
        </div>
        <div id="portfolio">
            <?php
            $style = 'style="display:none;"';
            for($i=0; $i < count($work->gallery_items); $i++) :
                $class = 'tile all '.$work->gallery_items[$i]['tags'];
                if(strstr($class, $work->active_category)) {
                    $class .= ' scale-anm';
                }
            ?>
            <figure class="<?= $class; ?>" <?php if(!strstr($class, $work->active_category)) : echo $style; endif; ?>>
                    <?= $work->gallery_items[$i]['thumbnail']; ?>
                    <a href="<?= $work->gallery_items[$i]['url']; ?>">
                        <figcaption class="overlay">
                            <h3><?= $work->gallery_items[$i]['post_title']; ?></h3>
                        </figcaption>
                    </a>
                </figure>
            <?php endfor; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>