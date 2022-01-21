<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Andy Huber</title>

    <script type="module">
        document.documentElement.classList.remove('no-js');
        document.documentElement.classList.add('js')
    </script>

    <link rel="stylesheet" href="sass/style.css" />

    <meta name="description" content="Sie wollen neue grüne Erfindungen? Andy ist für sie da" />
    <meta property="og:title" content="Andy Huber" />
    <meta property="og:description" content="Sie wollen neue grüne Erfindungen? Andy ist für sie da" />
    <meta property="og:image" content="https://www.andyhuber.com/images/AlexMayer_Logo.svg" />
    <meta property="og:image:alt" content="Logo von Andy Huber" />
    <meta property="og:locale" content="de_AT" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary" />
    <meta property="og:url" content="https://www.andyhuber.com" />
    <link rel="canonical" href="https://www.andyhuber.com" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
</head>
<?php wp_body_open(); ?>

<body>
    <header>

        <nav id="navbar">
            <!--<ul>
                <li><a class="button-like" href="#">Home</a></li>
                <li><a class="button-like" href="#">News</a></li>
                <li><a class="button-like" href="#">Meine Erfolge</a></li>
                <li><a class="button-like" href="#">Über mich</a></li>
            </ul>-->

            <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
        </nav>
        <a href="#" id="button"><span></span></a>

        <div class="herotext noShow">
            <h2>Change the World<br>Don't let it change You</h2>
        </div>

    </header>

    <main>
        <?php if (is_front_page()) { ?>
            <section id="news">
                <h2 class="headline">News</h2>
                <div class="divider">
                    <div class="noShow">
                        <img class="newsPic" src="<?php bloginfo('template_directory'); ?>/images/erdhand.jpg" alt="Hand mit Erde">
                    </div>

                    <div class="div-padding">
                        <ul>
                            <?php
                            $news_query = new WP_Query('order=DESC&category_name=news');

                            if ($news_query->have_posts()) {
                                $COUNT = 1;
                                while ($news_query->have_posts() && $COUNT <= 3) {
                                    $news_query->the_post(); ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <p><?php echo get_field('kurzbeschreibung'); ?></p>
                                    </li>
                                <?php $COUNT++;
                                } ?>
                            <?php } else {
                            ?>
                                <p>Erster Post demnächst...</p>
                            <?php } ?>
                            <? wp_reset_postdata(); ?>
                        </ul>

                        <a class="button-like button-news" href="/news">Alle Anzeigen</a>

                    </div>
                </div>

            </section>

            <section id="erfolge">
                <h2 class="headline">Erfolge</h2>
                <div class="divider div-padding">

                    <div>
                        <div class="container">

                            <?php $services_query = new WP_Query('order=ASC&category_name=erfolge');

                            if ($services_query->have_posts()) {
                                $COUNT = 1;

                                while ($services_query->have_posts() && $COUNT <= 3) {
                                    $services_query->the_post();
                                    $thumbnail_id = get_post_thumbnail_id(); ?>
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="card">
                                            <div class="div-pic">
                                                <img class="cardPic" src="<?php echo wp_get_attachment_image_url($thumbnail_id); ?>" alt="<?php get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); ?>">
                                            </div>
                                            <div class="div-erfindername">
                                                <p><?php the_title(); ?></p>
                                            </div>
                                        </div>
                                    </a>
                                <?php $COUNT++;
                                    wp_reset_postdata();
                                } ?>
                            <?php } else { ?>
                                <p>Keine Referenzen vorhanden...</p>
                            <?php } ?>
                        </div>
                        <a class="button-like button-news" href="/erfolge">Alle Anzeigen</a>
                    </div>


                    <div class="div-padding noShow">
                        <img class="erfolgsPic" src="<?php bloginfo('template_directory'); ?>/images/giesen.jpg" alt="Gieskanne gießt Beet.">
                    </div>
                </div>

            </section>

            <section id="me">
                <h2 class="headline">Das bin ich</h2>
                <div class="divider">
                    <div class="div-michtext">
                        <p>
                            <?php
                            $about_query = new WP_Query('order=ASC&category_name=aboutme');

                            if ($about_query->have_posts()) {
                                while ($about_query->have_posts()) {
                                    $about_query->the_post();
                                    echo the_content();
                                }
                            } else {
                                echo "Erster Post demnächst...";
                            } ?>
                        </p>
                    </div>

                    <div class="div-padding noShow">

                        <img class="mePic" src="<?php bloginfo('template_directory'); ?>/images/binich.png" alt="Andy beim Schrauben">
                    </div>
                </div>

            </section>
        <?php } else {
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_title();
                    the_content();
                }
            } else {
                echo "<p>Derzeit noch keine Beiträge... Bitte kommen Sie später weider zurück!</p>";
            }
        } ?>
    </main>

    <?php include('_footer.php') ?>

    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/burger.js"></script>
</body>

</html>