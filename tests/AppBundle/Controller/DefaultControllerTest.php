<?php

namespace tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @coversDefaultClass AppBundle\Controller\DefaultController
 */
class DefaultControllerTest extends WebTestCase
{

    /**
     * Test switching between template and admin pages
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
     * @param string $path
     * @param int $statusCode
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
     * @param string $path
     * @param int $statusCode
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
            ['template', 200],
            ['template/index', 200],
            ['template/index2', 200],
            ['template/index3', 200],
            ['template/form', 200],
            ['template/form_advanced', 200],
            ['template/form_validation', 200],
            ['template/form_wizards', 200],
            ['template/form_upload', 200],
            ['template/form_buttons', 200],
            ['template/general_elements', 200],
            ['template/media_gallery', 200],
            ['template/typography', 200],
            ['template/icons', 200],
            ['template/glyphicons', 200],
            ['template/widgets', 200],
            ['template/invoice', 200],
            ['template/inbox', 200],
            ['template/calendar', 200],
            ['template/tables', 200],
            ['template/tables_dynamic', 200],
            ['template/chartjs', 200],
            ['template/chartjs2', 200],
            ['template/morisjs', 200],
            ['template/echarts', 200],
            ['template/other_charts', 200],
            ['template/e_commerce', 200],
            ['template/projects', 200],
            ['template/project_detail', 200],
            ['template/contacts', 200],
            ['template/profile', 200],
            ['template/page_404', 200],
            ['template/page_500', 200],
            ['template/plain_page', 200],
            ['template/login', 200],
            ['template/pricing_tables', 200],
            ['template/login', 200],
            ['template/undefined', 404],
        ];
    }

    /**
     * @return array
     */
    public function adminPages()
    {
        return [
            ['admin', 200],
            ['admin/index', 200],
            ['admin/index2', 200],
            ['admin/index3', 200],
            ['admin/form', 200],
            ['admin/form_advanced', 200],
            ['admin/form_validation', 200],
            ['admin/form_wizards', 200],
            ['admin/form_upload', 200],
            ['admin/form_buttons', 200],
            ['admin/general_elements', 200],
            ['admin/media_gallery', 200],
            ['admin/typography', 200],
            ['admin/icons', 200],
            ['admin/glyphicons', 200],
            ['admin/widgets', 200],
            ['admin/invoice', 200],
            ['admin/inbox', 200],
            ['admin/calendar', 200],
            ['admin/tables', 200],
            ['admin/tables_dynamic', 200],
            ['admin/chartjs', 200],
            ['admin/chartjs2', 200],
            ['admin/morisjs', 200],
            ['admin/echarts', 200],
            ['admin/other_charts', 200],
            ['admin/e_commerce', 200],
            ['admin/projects', 200],
            ['admin/project_detail', 200],
            ['admin/contacts', 200],
            ['admin/profile', 200],
            ['admin/page_404', 200],
            ['admin/page_500', 200],
            ['admin/plain_page', 200],
            ['admin/login', 200],
            ['admin/pricing_tables', 200],
            ['admin/login', 200],
        ];
    }
}
