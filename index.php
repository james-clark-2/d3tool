<?php

$btag_name = 'atenhara';
$btag_code = '1797';

$profile_url = 'us.battle.net/api/d3/profile/'.$btag_name.'-'.$btag_code.'/';

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $profile_url,
    CURLOPT_USERAGENT => 'd3tool test'
));

$result = curl_exec($curl);

curl_close($curl);

echo $result;

?>