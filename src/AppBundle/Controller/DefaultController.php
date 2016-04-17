<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("template/{name}", name="template", defaults={"name": "index"})
     */
    public function previewAction(Request $request, $name)
    {
        return $this->render(sprintf('template/%s.html.twig', $name));
    }

    /**
     * @Route("{name}", name="homepage", defaults={"name": "index"})
     */
    public function indexAction(Request $request, $name)
    {
        if (!$this->get('templating')->exists(sprintf('%s.html.twig', $name))) {
            $name = 'index';
        }

        return $this->render(sprintf('%s.html.twig', $name));
    }
}
