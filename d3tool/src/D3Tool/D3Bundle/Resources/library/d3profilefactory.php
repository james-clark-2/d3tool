<?php

namespace D3Tool\D3Bundle\Resources\Library;

class D3ProfileFactory
{
    private $profile_addr = 'battle.net/api/d3/profile/';
    
    public function buildProfileURL ($username, $location = 'us')
    {
        $profile_url = $location.'.'.$this->profile_addr.$username.'/';
        
        //Change '#' to '-'
        $profile_url = str_replace('#', '-', $profile_url);
        
        return $profile_url;
    }
    
    public function getProfile ($username, $location = 'us')
    {
        $profile_url = $this->buildProfileURL($username, $location);
        
        //Change '#' to '-' if present
        $profile_url = str_replace('#', '-', $profile_url);
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $profile_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT => 'd3tool'
        ));

        $result = curl_exec($curl);
        
        /*
        $code = curl_getinfo($curl);
        
        if ($code != '200')
        {
            print_r("Error code ".$code."from $profile_url<br/>$response");
            return '';
        }
        */

        curl_close($curl);
        
        return $result;
    }
    
    private function idIsValid ($bnet_id)
    {
        $regex = '/^[\p{L}\p{Mn}][\p{L}\p{Mn}0-9]{2,11}-[0-9]{4,5}+$/u';
        
        return preg_match($regex, $bnet_id) === 1;
        
    }
    
    private function localeIsValid ($locale)
    {
        return $locale == 'us' || $locale == 'eu';
    }
}
?>
