<?php

$video_mp4  = get_field('video');
$heading    = get_field('heading');
$content    = get_field('content');
$button     = get_field('button');

$enableNotifications    = get_field('enable_notifications');
$notifications          = get_field('notifications');

$attr =  array(
    'src'      => $video_mp4,
    'preload'  => 'auto',
    'loop'     => '1',
    'autoplay' => '1'
);

?>

<div class="hero">
    <?php if( $video_mp4 ) { ?>
    <div class="hero__video">
        <?php echo wp_video_shortcode(  $attr ); ?>
    </div>
    <?php } ?>

    <?php if( $enableNotifications ) { ?>
    <div class="hero__notifications">
        <div class="container">
            <div class="hero__notifications__list">
                <?php foreach( $notifications as $notification ) { ?>
                    <div>
                        <?php echo $notification['content']; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>

    <div class="container">
        <div class="hero__content">
            <h1>
                <span class="animation do-fromLeft"><?php echo $heading['line_1']; ?></span>
                <span class="animation do-fromRight"><?php echo $heading['line_2']; ?></span>
                <span class="animation do-fromLeft"><?php echo $heading['line_3']; ?></span>
            </h1>

            <?php if( $content ) { ?>
                <p class="animation do-fromDown"><?php echo $content; ?></p>
            <?php } ?>

            <?php if( $button ) { ?>
                <?php $button['target'] = $button['target'] ? $button['target'] : '_self'; ?>
                
                <a class="animation do-fromDown" target="<?php echo $button['target']; ?>" href="<?php echo $button['url']; ?>"><?php echo $button['title']; ?></a>
            <?php } ?>
        </div>
    </div>
</div>