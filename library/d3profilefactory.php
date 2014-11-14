<?php

class D3ProfileFactory
{
    private $location = '';
    private $profile_addr = 'battle.net/api/d3/profile/';
    
    public function __construct ($location = 'us')
    {
        $this->location = $location;
    }
    
    public function getProfile ($username = '')
    {
        $profile_url = $this->location.'.'.$this->profile_addr.$username.'/';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $profile_url,
            CURLOPT_USERAGENT => 'd3tool test'
        ));

        $result = curl_exec($curl);

        curl_close($curl);
        
        return $result;
    }
}
?>
