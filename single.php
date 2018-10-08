<?php get_header();
$single = new NS_Single;
?>
<main class="main-projectdetail-content window">
    <?php if(!empty($single->embed)) : ?>
        <header class="soundcloud-embed">
            <div class="soundcloud-wrapper">
                <?= $single->embed; ?>
            </div>
        </header>
    <?php endif; ?>
	<figure class="details-cover">
        <?= $single->media; ?>
    </figure>
    <section class="projectdetail-content">
        <div class="projectdetail-description">
            <h1><?= $single->title; ?></h1>
            <?= $single->article; ?>
        </div>
        <?php if(!empty($single->media)) : ?>
    </section>
<?php endif; ?>
</main>
<?php get_footer(); ?>
