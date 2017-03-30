<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Renderer\ListRenderer;
use Knp\Menu\Matcher\Voter\UriVoter;

use Symfony\Component\HttpFoundation\Request;
  
class Builder implements ContainerAwareInterface
{
    
    use ContainerAwareTrait;
    private $request;
    
    public function userMenu(FactoryInterface $factory, array $options)
    {

        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');
        /*
        You probably want to show user specific information such as the username here. That's possible! Use any of the below methods to do this.
        if($this->container->get('security.context')->isGranted(array('ROLE_ADMIN', 'ROLE_USER'))) {} // Check if the visitor has any authenticated roles
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername(); // Get username of the current logged in user
        */
        $securityContext = $this->container->get('security.token_storage');
        $user = $securityContext->getToken()->getUser();
        $menu->addChild('logout', array('label' => 'Log Out','route' => 'abcis_logout'))
            ->setExtras(array(
                'dropdown' => false,
                'icon' => 'fa fa-sign-out',
            ));
        
        $menu->addChild('User', array('label' => $user->getUsername()))
            ->setExtras(array(
                'dropdown' => true,
                'icon' => 'fa fa-user',
            ));
        $menu['User']->addChild('Change password', array('route' => 'abcis_login_change_'))
            ->setExtra('icon', 'fa fa-refresh');

        $menu['User']->addChild('Switch users', array('uri' => '#'))
            ->setExtra('icon', 'fa fa-exchange')->setLinkAttributes(array(
                                                        'data-toggle'=>'modal',
                                                        'data-target'=> '.bs-example-modal-lg'
                                                        ));
            
        //$menu['User']['Switch users']->setAttribute('data-toggle', 'modal');
        //$menu['User']['Switch users']->setAttribute('data-target', 'bs-example-modal-lg');
        return $menu;
    }
    
   
   
      
    public function createMenu($menu,$roots){

        foreach ($roots as $key => $root) {
            if($root->getPath()=='#'){
                //$root->getPath(), '', $_SERVER['REQUEST_URI']
                $menu->addChild($root->getName(), array('uri' => $root->getPath(),))
                        ->setExtras(array(
                            'class'=> $root->getCss(),
                            'icon'=> $root->getIcon(),
                            'id'=>$root->getId()
                        ));
                /*$menu[$root->getName()]->setAttribute('class', $root->getCss());
                $menu[$root->getName()]->setAttribute('icon', $root->getIcon());
                $menu[$root->getName()]->setAttribute('id', $root->getId());*/
            }else{
                if($root->getDefaultOption()){
                    $string = utf8_encode(stripslashes(chop(trim($root->getDefaultOption()))));
                    $params = json_decode($string,true);
                }else{
                    $params = null;
                    
                }
                if($menu and $root and $root->getMenuParent() and $root->getName()){
                    if($this->request->get('_route')==$root->getPath()){
                        $current = true;
                    }else{
                        $current = false;
                    }
                    $menu[$root->getMenuParent()->getName()]->addChild($root->getName(), array(
                        'uri' => $root->getPath(),
                        'route' => $root->getPath(),
                        'routeParameters' => $params
                    ));//->setCurrent($current);
                    
                }
                /*}else{
                    if($menu and $root->getMenuParent() and $root->getName())
                    $menu[$root->getMenuParent()->getName()]->addChild($root->getName(), array(
                        'route' => $root->getPath(),
                    ));
                } */  
            }
            
        }
        
        return $menu;
    }
    
    
    
}
