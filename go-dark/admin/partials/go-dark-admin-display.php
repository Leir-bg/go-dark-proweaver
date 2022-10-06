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

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<html>
    <body>
        <main>
            <h1>GO DARK PROWEAVER</h1>

            <div class="cont">
                <form action="submit_form" class="submit_form" method="post">
                    <label for="sections_for_dm">Input section ID/Class:</label>
                    <input type="text" name="sections_for_dm" id="sections_for_dm" placeholder="start with # or .">

                    <label for="shade_for_dm">Shade:</label>
                    <div class="color_box"></div>
                    <small class="color_text"></small>
                    <select name="shade_for_dm" id="shade_for_dm">
                        <option value="#000000">Shade 1</option>
                        <option value="#1a1a1a">Shade 2</option>
                        <option value="#2e2e2e">Shade 3</option>
                    </select>

                    <input type="submit" value="Submit">
                </form>

                <table class="data_table">
                    <thead>
                        <tr><th>Section</th><th>Shade</th></tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </main>
    </body>
</html>