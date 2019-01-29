<?php
session_start();
elgg_load_css('studytutorial');

//extract data to put in hidden fields
$wcode = elgg_extract('wcode', $vars);
$page = elgg_extract('page', $vars);
$maxp = elgg_extract('maxp', $vars);
$poll = elgg_extract('poll', $vars);
//make hidden fields
form_view_hidden_fields($wcode, $page, $maxp, $poll);

if ($page == 1)
{
  $title = '1. On matemaatikatund. Õpetaja annab ülesande: "Bussis sõitis 15 inimest. Peatuses läks maha 5 inimest ja 2 inimest tuli bussi peale. Mitu inimest sõidab nüüd bussis?" Mõtle, kas tegevus sobib või ei sobi selle ülesande lahendamiseks.';
  $text1 = '1. Teed sellise joonise:';
  $text2 = '2. Mõtled, kas ülesandes on tegemist liitmise (+) või lahutamisega (-)';
  $text3 = '3. Teed sellise joonise:';
  $text4 = '4. Meenutad, missuguseid bussidega ülesandeid oled varem lahendanud';
  
  echo elgg_view_title($title);
  
  //draw radios
  form_view_radio($text1, $wcode, $page, 1, $poll);
  echo '<img src="'.elgg_get_site_url().'mod/Uldpadevused/images/bus_stop.png">';
  
  form_view_radio($text2, $wcode, $page, 2, $poll);
  
  form_view_radio($text3, $wcode, $page, 3, $poll);
  echo '<img src="'.elgg_get_site_url().'/mod/Uldpadevused/images/graph.png">';
  
  form_view_radio($text4, $wcode, $page, 4, $poll);
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
  form_view_radio($text1, $wcode, $page, 1, $poll);
  form_view_radio($text2, $wcode, $page, 2, $poll);
  form_view_radio($text3, $wcode, $page, 3, $poll);
  form_view_radio($text4, $wcode, $page, 4, $poll);
  form_view_radio($text5, $wcode, $page, 5, $poll);
  form_view_radio($text6, $wcode, $page, 6, $poll); 
}
//make appropriate buttons in the end
form_view_buttons($wcode, $page, $maxp, $poll);

function form_view_radio($label, $wcode, $page, $question, $poll)
{
  echo elgg_view_field([
    '#label' => $label,
    'name' => 'q'.$question,
    'value' => $_SESSION[$wcode.'p'.$poll.'p'.$page.'q'.$question],
    'options' => [
      'Jah' => 'jah',
      'Ei' => 'ei',
      'Ei tea' => 'ei tea'
    ],
    '#type' => 'radio',
    'align' => 'horizontal',
    'required' => true
  ]);
}