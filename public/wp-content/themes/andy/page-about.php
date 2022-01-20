<?php
$context = Timber::get_context();
$args = array(
'category_name' => 'aboutme',
'orderby' => array(
    'date' => 'ASC'
));

$context['post'] = Timber::get_posts( $args ); 

Timber::render('/timber/about.twig', $context);
?>
