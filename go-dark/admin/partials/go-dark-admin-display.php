<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * @since      1.0.0
 *
 * @package    Go_Dark
 * @subpackage Go_Dark/admin/partials
 */

class adminDashboard{
    public function construct(){
        echo '
        <html>
            <body>
                <h1>GO DARK PROWEAVER</h1>

                <a href="javascript:;" class="alert">TRY</a>
            </body>
        </html>
        ';
    }
}

new adminDashboard();

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->