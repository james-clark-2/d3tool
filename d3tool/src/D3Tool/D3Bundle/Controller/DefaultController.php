<?php

namespace D3Tool\D3Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use D3Tool\D3Bundle\Resources\Library\D3ProfileFactory;

class DefaultController extends Controller
{
    public function indexAction($locale, $bnet_id)
    {
        $factory = new D3ProfileFactory($locale);
    
        $result = $factory->getProfile($bnet_id);
        
        return $this->render('D3Bundle:Default:index.html.twig', array('locale' => $locale,
                                                                       'url' => $factory->buildProfileURL($bnet_id),
                                                                       'bnet_id' => $bnet_id,
                                                                       'result' => $result));
    }
}
