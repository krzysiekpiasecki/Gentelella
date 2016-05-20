<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Render Gentelella page
     *
     * @Route("gentelella/{page}", name="gentelella_page", defaults={"page": "index"})
     *
     * @param Request $request
     * @param string  $page
     *
     * @return Response
     */
    public function templateAction(Request $request, $page)
    {
        /* @todo Secure it! */
        if (!$this->get('templating')->exists(sprintf('gentelella/%s.html.twig', $page))) {
            throw $this->createNotFoundException(
                sprintf(
                    'Page "%s" not found',
                    $page
                )
            );
        }

        return $this->render(sprintf('gentelella/%s.html.twig', $page));
    }

    /**
     * Display admin pages
     *
     * @Route("admin/{page}", name="admin_page", defaults={"page": "plain"})
     *
     * @param Request $request Request
     * @param string  $page Page name
     *
     * @return Response
     */
    public function adminAction(Request $request, $page = 'plain')
    {
        /* @todo Secure it! */
        if (!$this->get('templating')->exists(sprintf('admin/%s.html.twig', $page))) {
            $page = 'plain';
        }
        return $this->render(sprintf('admin/pages/%s.html.twig', $page));
    }

    /**
     * Redirect to admin homepage which is currently index
     *
     * @Route("/", name="homepage")
     * @param Request $request Request
     */
    public function homePageAction(Request $request)
    {
        return $this->redirectToRoute('admin_page', ['page' => 'index']);
    }
}
