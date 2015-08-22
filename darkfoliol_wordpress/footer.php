<?
global $options;
foreach ($options as $value) {
    if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>

<div id="footer"><div class="wrapper">


<? if ($df_footer_title) { ?>

<b><? echo $df_footer_title; ?></b>


<? } else { ?>

Copyright © 2009 · Darkfolio · All rights reserved


<? } ?>



</div>
</div>