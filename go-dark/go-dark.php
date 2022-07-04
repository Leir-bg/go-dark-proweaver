<?php
/**
 * Plugin Name: Go Dark Proweaver
 * Plugin URI: https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 * Description: Dark mode for Proweaver themes.
 * Version: 1.0
 * Author: PRD1113, PRD978
 * Author URI: https://web4.proweaverlinks.com/MAINTENANCE/FORRESEARCH/
 */
add_action('admin_menu', 'test_plugin_setup_menu');

function test_plugin_setup_menu(){
    add_menu_page( 'Go Dark', 'Go Dark', 'manage_options', 'go-dark', 'test_init');
}

function test_init(){
    echo "
    <h1>GO DARK PROWEAVER!</h1>
    <p>Panimulang Panalangin (Opening Prayer)</p>
    <p>Namatay ka, Hesus subalit ang bukal ng buhay ay lumagalas para sa mga kaluluwa at ang karagatan ng awa ay bumugso para sa sanlibutan.</p>
    <p>O bukal ng buhay, na walang Hanggang Awa ng Diyos, balutin  mo ang sangkatauhan at ibuhos mong ganap ang iyong sarili para sa aming lahat.</p>
     <br>
    <p>O banal na Dugo at Tubig na lumgalas mula sa Puso ni Hesus bilang Bukal ng Awa para sa aming lahat, ako ay nananalig sa iyo.(3x)</p>
    <br>
    <br>
    <p>Sign of the Cross(+):</p>
    <br>
    <br>
    <p>Sa umpisa, dasalin ang:</p>
    <p>Isang Ama Namin;</p>
    <p>Isang Aba Ginoong Maria; Isang Sumasampalataya /(Kredo ng Apostolis) / (Apostles Creed)</p>
    <br>
    <br>
    <p>Sa bawat malalaking butil ng bawat dekada:</p>
    <p>Ama na Walang Hanggan, iniaalay ko po sa Inyo ang Katawan at Dugo, Kaluluwa at Pagka-Diyos ng Kamahal-mahalan Mong Anak na si </p><p>Jesu-Kristo, na aming Panginoon at Manunubos. Para sa ikapagpapatawad ng aming mga kasalanan at sa sala ng buong mundo</p>
    <br>
    <br>
    <p>Sa sampung maliliit na butil bawat dekada:</p>
    <p>Alang-alang sa mga tiniis na hirap at kamatayan ni Jesus,</p>
    <p>Kaawaan Mo po kami at ang buong sansinukob.</p>
    <br>
    <br>
    <p>Pagkatapos, bigkasin:</p>
    <p>Banal na Diyos, Banal na Puspos ng Kapangyarihan, Banal na Walang Hanggan, maawa po Kayo sa amin at sa buong mundo. (3X) AMEN.</p>
    <br>
    <br>
    <p>Sign of the Cross (+)</p>
    <br>
    <br>
    <p>Pagsasarang Panalangin (Closing Prayer)</p>
    <p>Walang hanggang Diyos, na ang awa ay walang katapusan at ang kabangyaman ng habag na di maubosubos, masuyong tingnan po kami at palagoin nyo po ang awa sa amin, nang sa mahihirap na sandali ay maaring di kami panghinaan ng loob, o kayay malupaypay, kundi ng may malaking pananalig isuko ang aming sarili sa iyong banal na kalooban, na siya ring pagibig at awa din.</p>
    ";
}

/** Hook Dark Mode */

add_action('wp_enqueue_scripts', 'load_dm');

function load_dm(){
    wp_register_style('darkmode_style', plugin_dir_url( __FILE__ ) . 'assets/css/darkstyle.min.css');
    wp_enqueue_style('darkmode_style');
    wp_enqueue_script('darkmode_script', plugin_dir_url( __FILE__ ) . 'scripts/darkmode.min.js', array('jquery'));
}
?>