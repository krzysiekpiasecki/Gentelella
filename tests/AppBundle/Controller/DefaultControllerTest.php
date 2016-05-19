<?php

namespace tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @coversDefaultClass AppBundle\Controller\DefaultController
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * Test switching between template and admin pages.
     */
    public function testSwitchToTemplate()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'admin/index');

        $link = $crawler
            ->filter('a:contains("Template")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $link = $crawler
            ->filter('a:contains("Site")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @covers ::redirectAction
     */
    public function testRedirect()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
    }

    /**
     * @dataProvider templatePages
     * @covers ::templateAction
     *
     * @param string $path
     * @param int    $statusCode
     */
    public function testTemplate($path, $statusCode)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', sprintf('/%s', $path));
        $this->assertEquals($statusCode, $client->getResponse()->getStatusCode());
    }

    /**
     * @dataProvider adminPages
     * @covers ::adminAction
     *
     * @param string $path
     * @param int    $statusCode
     */
    public function testAdmin($path, $statusCode)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', sprintf('/%s', $path));
        $this->assertEquals($statusCode, $client->getResponse()->getStatusCode());
    }

    /**
     * @return array
     */
    public function templatePages()
    {
        return [
            ['gentelella', 200],
            ['gentelella/calendar', 200],
            ['gentelella/chartjs', 200],
            ['gentelella/chartjs2', 200],
            ['gentelella/contacts', 200],
            ['gentelella/e_commerce', 200],
            ['gentelella/echarts', 200],
            ['gentelella/fixed_sidebar', 200],
            ['gentelella/form', 200],
            ['gentelella/form_advanced', 200],
            ['gentelella/form_buttons', 200],
            ['gentelella/form_upload', 200],
            ['gentelella/form_validation', 200],
            ['gentelella/form_wizards', 200],
            ['gentelella/general_elements', 200],
            ['gentelella/glyphicons', 200],
            ['gentelella/icons', 200],
            ['gentelella/inbox', 200],
            ['gentelella/index', 200],
            ['gentelella/index2', 200],
            ['gentelella/index3', 200],
            ['gentelella/invoice', 200],
            ['gentelella/level2', 200],
            ['gentelella/login', 200],
            ['gentelella/map', 200],
            ['gentelella/media_gallery', 200],
            ['gentelella/morisjs', 200],
            ['gentelella/other_charts', 200],
            ['gentelella/page_404', 200],
            ['gentelella/page_500', 200],
            ['gentelella/plain_page', 200],
            ['gentelella/pricing_tables', 200],
            ['gentelella/profile', 200],
            ['gentelella/project_detail', 200],
            ['gentelella/projects', 200],
            ['gentelella/sign_up', 200],
            ['gentelella/tables', 200],
            ['gentelella/tables_dynamic', 200],
            ['gentelella/typography', 200],
            ['gentelella/widgets', 200],
            ['gentelella/xx', 200],
            ['gentelella/undefined', 404],
        ];
    }

    /**
     * @return array
     */
    public function adminPages()
    {
        return [
            ['admin', 200],
            ['admin/calendar', 200],
            ['admin/chartjs', 200],
            ['admin/chartjs2', 200],
            ['admin/contacts', 200],
            ['admin/e_commerce', 200],
            ['admin/echarts', 200],
            ['admin/fixed_sidebar', 200],
            ['admin/form', 200],
            ['admin/form_advanced', 200],
            ['admin/form_buttons', 200],
            ['admin/form_upload', 200],
            ['admin/form_validation', 200],
            ['admin/form_wizards', 200],
            ['admin/general_elements', 200],
            ['admin/glyphicons', 200],
            ['admin/icons', 200],
            ['admin/inbox', 200],
            ['admin/index', 200],
            ['admin/index2', 200],
            ['admin/index3', 200],
            ['admin/invoice', 200],
            ['admin/level2', 200],
            ['admin/login', 200],
            ['admin/map', 200],
            ['admin/media_gallery', 200],
            ['admin/morisjs', 200],
            ['admin/other_charts', 200],
            ['admin/page_404', 200],
            ['admin/page_500', 200],
            ['admin/plain_page', 200],
            ['admin/pricing_tables', 200],
            ['admin/profile', 200],
            ['admin/project_detail', 200],
            ['admin/projects', 200],
            ['admin/sign_up', 200],
            ['admin/tables', 200],
            ['admin/tables_dynamic', 200],
            ['admin/typography', 200],
            ['admin/widgets', 200],
            ['admin/xx', 200],
            ['admin/undefined', 404],
        ];
    }
}
