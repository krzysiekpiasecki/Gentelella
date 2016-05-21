<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Render Gentelella page.
     *
     * @Route("gentelella/{page}", name="gentelella_page", defaults={"page": "index"})
     *
     * @param Request $request
     * @param string  $page
     *
     * @return Response
     */
    public function gentelellaAction(Request $request, $page)
    {
        $templateName = basename(sprintf('gentelella/%s.html.twig', $page));
        if ($templateName !== sprintf('%s.html.twig', $page)) {
            throw $this->createNotFoundException('Page not found');
        }
        if (!$this->get('templating')->exists(sprintf('gentelella/%s', $templateName))) {
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
     * Render admin page.
     *
     * @Route("admin/{page}", name="admin_page", defaults={"page": "plain"})
     *
     * @param Request $request Request
     * @param string  $page    Page name
     *
     * @return Response
     */
    public function adminAction(Request $request, $page = 'plain')
    {
        $templateName = basename(sprintf('admin/pages/%s.html.twig', $page));
        if ($templateName !== sprintf('%s.html.twig', $page)) {
            throw $this->createNotFoundException('Page not found');
        }
        if (!$this->get('templating')->exists(sprintf('admin/pages/%s', $templateName))) {
            $templateName = 'plain.html.twig';
        }

        return $this->render(sprintf('admin/pages/%s', $templateName));
    }

    /**
     * Redirect to admin homepage which is currently index (plain page).
     *
     * @Route("/", name="homepage")
     *
     * @param Request $request Request
     *
     * @return Request
     */
    public function homePageAction(Request $request)
    {
        return $this->redirectToRoute('admin_page', ['page' => 'index']);
    }
}
