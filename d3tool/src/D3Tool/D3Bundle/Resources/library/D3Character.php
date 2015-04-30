<?php

namespace D3Tool\D3Bundle\Resources\Library;

class D3Character
{
    private $name;
    private $level;
    private $class;
    private $paperDoll = array();
    private $stats = array();
    private $skills = array();
    private $passives = array();
    private $followers = array();
    private $hardcore = false;
    private $gender = 0;
    private $lastUpdate = 0;
    
    public __construct ()
    {
    }
}
?>