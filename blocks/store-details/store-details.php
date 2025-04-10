<?php
// Ensure this file is included within the WordPress loop.
$post_id = get_the_ID();

// Get ACF fields
$address = get_field('address', $post_id);
$email   = get_field('email', $post_id);
$contact = get_field('contact', $post_id);
?>

<div class="store-details-block">
    <?php if ($address): ?>
        <p><strong>Address:</strong> <?php echo esc_html($address); ?></p>
    <?php endif; ?>
    <?php if ($email): ?>
        <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
    <?php endif; ?>
    <?php if ($contact): ?>
        <p><strong>Tel:</strong> <a href="tel:<?php echo esc_attr($contact); ?>"><?php echo esc_html($contact); ?></a></p>
    <?php endif; ?>
</div>
