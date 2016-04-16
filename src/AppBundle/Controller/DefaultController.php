<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("preview/{name}", name="preview", defaults={"name": "index"})
     */
    public function previewAction(Request $request, $name)
    {
        // replace this example code with whatever you need
        return $this->render(sprintf('preview/%s.html.twig', $name));
    }

    /**
     * @Route("{name}", name="homepage", defaults={"name": "index"})
     */
    public function indexAction(Request $request, $name)
    {
        $realPath = sprintf('%s/../', realpath($this->getParameter('kernel.root_dir')));
        if (! is_readable(sprintf('%s/%s.html.twig', $realPath, $name))) {
            $name = "index";
        }
        // replace this example code with whatever you need
        return $this->render(sprintf('%s.html.twig', $name));
    }
}
