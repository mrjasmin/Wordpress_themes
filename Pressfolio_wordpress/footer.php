<?php
require(TEMPLATEPATH . "/var.php");  ?>

<div id="footer">

<div class="wrapper">

<ul>


<?php if ($footertext) { ?>
        <li><?php echo $footertext; ?></li>
        <?php } else { ?>
        <li>2009 Portfoliopress by <a href="http://www.jasminweb.net">Jasminweb</a> This theme is developed for <a href="http://www.themeforest.com"><b>themeforest</b></a></li>
        <li>Powered by <a href="http://www.wordpress.org"> <b>Wordpress</b></a></li>
        <?php } ?>

</ul>


</div>

</div>

</body>
</html>