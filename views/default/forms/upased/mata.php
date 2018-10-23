<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page);

$title = '1. On matemaatikatund. Õpetaja annab ülesande: "Bussis sõitis 15 inimest. Peatuses läks maha 5 inimest ja 2 inimest tuli bussi peale. Mitu inimest sõidab nüüd bussis?" Mõtle, kas tegevus sobib või ei sobi selle ülesande lahendamiseks.';
$text1 = '1. Teed sellise joonise:';
$text2 = '2. Mõtled, kas ülesandes on tegemist liitmise (+) või lahutamisega (-)';
$text3 = '3. Teed sellise joonise:';
$text4 = '4. Meenutad, missuguseid bussidega ülesandeid oled varem lahendanud';

echo elgg_view_title($title);

//draw radios
form_view_radio($text1, $wcode, $page, 1);
echo '<img src="/mod/Uldpadevused/images/bussipeatus.png">';

form_view_radio($text2, $wcode, $page, 2);

form_view_radio($text3, $wcode, $page, 3);
echo '<img src="/mod/Uldpadevused/images/kastid.png">';

form_view_radio($text4, $wcode, $page, 4);

//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);