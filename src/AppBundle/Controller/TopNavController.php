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

/**
 * Top navigation controller
 */
class TopNavController extends Controller
{
    /**
     * 
     * @Route("/profile", name="app_profile")
     *
     * @param Request $request
     * @return Response
     */
    public function profileAction(Request $request)
    {
        return $this->render('user/pages/profile.html.twig', []);
    }

    /**
     * 
     * @Route("/help", name="app_help")
     *
     * @param Request $request
     * @return Response
     */
    public function helpAction(Request $request)
    {
        return $this->render('user/pages/help.html.twig', []);
    }

    /**
     * 
     * @Route("/settings", name="app_settings")
     *
     * @param Request $request
     * @return Response
     */
    public function settingsAction(Request $request)
    {
        return $this->render('user/pages/settings.html.twig', []);
    }

}
