<?php

    $exampleContent = get_field('content');

?>

<div>
    <div class="container">
        <?php echo $exampleContent; ?>
    </div>
</div>

<?php include('block-load.php'); ?>