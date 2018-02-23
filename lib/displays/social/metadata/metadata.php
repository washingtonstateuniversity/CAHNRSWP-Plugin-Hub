<meta name="description" content="<?php echo $excerpt; ?>" />
<meta itemprop="name" content="<?php echo $meta_title ?>">
<meta itemprop="description" content="<?php echo $excerpt; ?>">
<?php if ( ! empty ( $img ) ):?><meta itemprop="image" content="<?php echo $img ?>" />
<?php endif;?>
<meta name="twitter:card" content="summary">
<meta property="og:title" content="<?php echo $meta_title ?>" />
<meta property="og:type" content="article" />
<meta property="og:url" content="<?php echo $url ?>" />
<?php if ( ! empty ( $img ) ):?><meta property="og:image" content="<?php echo $img ?>" />
<?php endif;?>
<meta property="og:image:alt" content=" " />
<meta property="og:description" content="<?php echo $excerpt; ?>" /> 
<meta property="og:site_name" content="<?php echo $unit_name; ?>" />