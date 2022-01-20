<?php
$context = Timber::get_context();
$args = array(
'category_name' => 'erfolge',
'orderby' => array(
    'date' => 'ASC'
));

$context['post'] = Timber::get_posts( $args ); 

Timber::render('/timber/erfolge.twig', $context);
?>