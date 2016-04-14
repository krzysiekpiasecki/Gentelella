<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("gentellela/{name}", name="homepage")
     */
    public function indexAction(Request $request, $name)
    {
        // replace this example code with whatever you need
        return $this->render(
            sprintf('default/%s.html.twig', $name), [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }

}
