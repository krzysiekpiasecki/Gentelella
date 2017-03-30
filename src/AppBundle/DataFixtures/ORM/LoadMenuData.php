<?php
namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Menu;



class LoadMenuData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $menu = new Menu();
        $menu->setName('Dashboard');
        $menu->setPath('app_dashboard');
        $menu->setCss('fa fa-home');
        $menu->setStyle('display: none');
        $menu->setSlug('getenelella');
        //$menu->setDescription('');
        $menu->setLabel('Dashboard');
        //$menu->setMenuParent('test');
        $menu->setOrderOption(1);
        $menu->setTipo(1);
        $menu->setStatusOption('r');
        //$menu->setDefaultOption('');
        //$menu->setIcon('');

        $manager->persist($menu);
        $manager->flush();
        
        
        $menu1 = new Menu();
        $menu1->setName('Outlook');
        $menu1->setPath('#');
        $menu1->setCss('fa fa-calendar');
        $menu1->setStyle('display: none');
        $menu1->setSlug('getenelella');
        //$menu1->setDescription('');
        $menu1->setLabel('Outlook');
        //$menu1->setMenuParent('');
        $menu1->setOrderOption(2);
        $menu1->setTipo(1);
        $menu1->setStatusOption('t');
        //$menu1->setDefaultOption('');
        $menu1->setIcon('fa fa-chevron-down');

        $manager->persist($menu1);
        $manager->flush();
        
        
        $menu2 = new Menu();
        $menu2->setName('Calendar');
        $menu2->setPath('app_calendar');
        //$menu2->setCss('');
        //$menu2->setStyle('');
        $menu2->setSlug('getenelella');
        //$menu2->setDescription('');
        $menu2->setLabel('Calendar');
        $menu2->setMenuParent($menu1);
        $menu2->setOrderOption(1);
        $menu2->setTipo(2);
        $menu2->setStatusOption('t');
        //$menu2->setDefaultOption('');
        //$menu2->setIcon('');

        
        $manager->persist($menu2);
        $manager->flush();
        
        
        $menu3 = new Menu();
        $menu3->setName('Contacts');
        $menu3->setPath('app_contacts');
        //$menu3->setCss('');
        //$menu3->setStyle('');
        $menu3->setSlug('getenelella');
        //$menu3->setDescription('test');
        $menu3->setLabel('Contacts');
        $menu3->setMenuParent($menu1);
        $menu3->setOrderOption(2);
        $menu3->setTipo(2);
        $menu3->setStatusOption('t');
        //$menu3->setDefaultOption('test');
        //$menu3->setIcon('test');

        $manager->persist($menu3);
        $manager->flush();
        
        
        
    }
}