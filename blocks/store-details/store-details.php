<?php
/**
 * Store Details Block Template.
 *
 * @param array $block The block settings and attributes.
 * @param string $content The block inner HTML (empty).
 * @param bool $is_preview True during AJAX preview.
 */

// Get ACF fields
$address = get_field('address');
$email = get_field('email');
$contact = get_field('contact');

// Block ID and class
$block_id = !empty($block['anchor']) ? $block['anchor'] : 'store-details-' . $block['id'];
$class_name = 'store-details';

?>

<div id="<?php echo esc_attr($block_id); ?>" class="<?php echo esc_attr($class_name); ?>">
    <?php if ($address) : ?>
        <p><strong>Address:</strong> <?php echo esc_html($address); ?></p>
    <?php endif; ?>
    
    <?php if ($email) : ?>
        <p><strong>Email:</strong> <a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></p>
    <?php endif; ?>
    
    <?php if ($contact) : ?>
        <p><strong>Contact:</strong> <?php echo esc_html($contact); ?></p>
    <?php endif; ?>
</div>
