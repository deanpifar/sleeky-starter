<?php if(!is_page() && !is_single() && current_user_can('administrator')) { ?>

    <img
    className="onload-hack-pp"
    height="0"
    width="0"
    onLoad="abc()"
    src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1 1' %3E%3Cpath d=''/%3E%3C/svg%3E"
    />

<?php } ?>
