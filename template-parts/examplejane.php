<?php

    $exampleContent = get_field('content');
    $image          = get_field('image');

?>

<div>
    <div class="container">
        <?php echo $exampleContent; ?>

        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
    </div>
</div>

<?php include('block-load.php'); ?>