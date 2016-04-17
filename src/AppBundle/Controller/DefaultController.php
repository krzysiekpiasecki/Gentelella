<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Template homepage.
     *
     * @Route("template/{name}", name="template", defaults={"name": "index"})
     *
     * @param Request $request
     * @param string  $name
     *
     * @return Response
     */
    public function templateAction(Request $request, $name)
    {
        if (!$this->get('templating')->exists(sprintf('template/%s.html.twig', $name))) {
            throw $this->createNotFoundException(
                sprintf(
                    'Page %s not found',
                    $name
                )
            );
        }

        return $this->render(sprintf('template/%s.html.twig', $name));
    }

    /**
     * Admin homepage.
     *
     * @Route("admin/{name}", name="admin_homepage", defaults={"name": "index"})
     *
     * @param Request $request
     * @param string  $name
     *
     * @return Response
     */
    public function adminAction(Request $request, $name)
    {
        if (!$this->get('templating')->exists(sprintf('%s.html.twig', $name))) {
            $name = 'index';
        }

        return $this->render(sprintf('%s.html.twig', $name));
    }

    /**
     * Redirect to admin homepage.
     *
     * @Route("/", name="homepage")
     */
    public function redirectAction(Request $request)
    {
        return $this->redirectToRoute('admin_homepage', [
            'name' => 'index',
        ]);
    }
}
