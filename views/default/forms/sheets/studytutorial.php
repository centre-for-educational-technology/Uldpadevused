<?php
session_start();

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp);

if ($page == 1)
{
  $title = '1. On matemaatikatund. Õpetaja annab ülesande: "Bussis sõitis 15 inimest. Peatuses läks maha 5 inimest ja 2 inimest tuli bussi peale. Mitu inimest sõidab nüüd bussis?" Mõtle, kas tegevus sobib või ei sobi selle ülesande lahendamiseks.';
  $text1 = '1. Teed sellise joonise:';
  $text2 = '2. Mõtled, kas ülesandes on tegemist liitmise (+) või lahutamisega (-)';
  $text3 = '3. Teed sellise joonise:';
  $text4 = '4. Meenutad, missuguseid bussidega ülesandeid oled varem lahendanud';
  
  echo elgg_view_title($title);
  
  //draw radios
  form_view_radio($text1, $wcode, $page, 1);
  echo '<img src="'.elgg_get_site_url().'mod/Uldpadevused/images/bus_stop.png">';
  
  form_view_radio($text2, $wcode, $page, 2);
  
  form_view_radio($text3, $wcode, $page, 3);
  echo '<img src="'.elgg_get_site_url().'/mod/Uldpadevused/images/graph.png">';
  
  form_view_radio($text4, $wcode, $page, 4);
}
else
{
  $title = '2. Õpetaja annab emakeele tunnis kodus lugemiseks 1 lehekülje pikkuse loo paberi valmistamisest ja ütleb, et järgmisel päeval tuleb seda teksti tunnis jutustada. Mõtle, kas tegevus on hea või mitte selle kodutöö tegemiseks.';
  $text1 = '1. Loed teksti lihtsalt mitu korda läbi.';
  $text2 = '2. Teed iga teksti lõigu kohta joonise.';
  $text3 = '3. Meenutad, mida pidin jutustama eelmisel korral.';
  $text4 = '4. Harjutad teksti jutustamist lühemalt ja oma sõnadega.';
  $text5 = '5. Tuubid teksti pähe.';
  $text6 = '6. Mõtled, mida sa tead paberi kohta.';
  
  echo elgg_view_title($title);
  
  //draw radios
  form_view_radio($text1, $wcode, $page, 1);
  form_view_radio($text2, $wcode, $page, 2);
  form_view_radio($text3, $wcode, $page, 3);
  form_view_radio($text4, $wcode, $page, 4);
  form_view_radio($text5, $wcode, $page, 5);
  form_view_radio($text6, $wcode, $page, 6); 
}
//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp);