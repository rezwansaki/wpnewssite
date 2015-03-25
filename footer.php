<div class="row" id="footer">
    <div class="row" id="footer_menu">
        <div class="col-md-12">
            <!-- Footer Menu -->
            <?php

                $args = array(
                'theme_location' => 'footer-menu',
                'depth'          => 2,
                'container'      => false,
                'menu_class'     => 'breadcrumb',
                'walker'         => new Bootstrap_Walker_Nav_Menu()
                );

                wp_nav_menu($args);

            ?>	
            <!-- /Footer Menu -->
        </div>
    </div>

    <div class="row" id="footer_text">
        <div class="col-md-12">
            Copyright &copy; 2015 – <?php echo date('Y'); ?> The News Reporter Inc. All rights reserved. Theme designed by Alinsworld.com <br>
            Reproduction in whole or in part in any form or medium without express written permission of The News Reporter Inc. is prohibited. The trade marks and images used in <br> the design are the copyright of their respective owners. They are used only for display purpose.
        </div>
    </div>
</div>

</div>

<?php wp_footer(); ?>

</body>


</html>
</html>