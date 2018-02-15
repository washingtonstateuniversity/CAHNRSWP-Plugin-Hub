<meta name=”description” content=”<?php echo $excerpt; ?>” /> <!– No longer than 155 characters. –>
<!– Schema.org markup for Google+ –>
<meta itemprop=”name” content=”<?php echo $meta_title ?>”>
<meta itemprop=”description” content=”<?php echo $excerpt; ?>”>
<?php if ( ! empty ( $img ) ):?><meta itemprop=”image” content=”<?php echo $img ?>”><?php endif;?>
<!– Twitter Card data –>
<meta name=”twitter:card” content=”summary”>
<meta name=”twitter:site” content=”@publisher_handle”>
<meta name=”twitter:title” content=”<?php echo $meta_title ?>”>
<meta name=”twitter:description” content=”<?php echo $excerpt; ?>”> <!– Less than 200 characters. –>
<meta name=”twitter:creator” content=”@author_handle”>
<!– Twitter Summary card images must be at least 120x120px –>
<?php if ( ! empty ( $img ) ):?><meta name=”twitter:image” content=”<?php echo $img ?>”><?php endif;?> <!– Square at least 120x120px –>
<!– Open Graph data –>
<meta property=”og:title” content=”<?php echo $meta_title ?>” />
<meta property=”og:type” content=”article” />
<meta property=”og:url” content=”<?php echo $url ?>”; />
<?php if ( ! empty ( $img ) ):?><meta property=”og:image” content=”<?php echo $img ?>”; /><?php endif;?>
<meta property=”og:description” content=”<?php echo $excerpt; ?>” />
<meta property=”og:site_name” content=”<?php echo $unit_name; ?>” />
<?php if ( ! empty ( $fbadmin ) ):?> <meta property="fb:admins" content="<?php echo $fbadmin ?>" /><?php endif ;?>