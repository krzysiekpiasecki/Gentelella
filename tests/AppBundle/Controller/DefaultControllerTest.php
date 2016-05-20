<?php

namespace tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @coversDefaultClass AppBundle\Controller\DefaultController
 */
class DefaultControllerTest extends WebTestCase
{
    /**
     * @covers ::redirectAction
     */
    public function testRedirectToAdminHomepage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $this->assertSame(
            'Redirecting to /admin',
            $crawler
                ->filter('title')
                ->eq(0)
                ->text()
        );
    }

    /**
     * @dataProvider gentelellaPages
     * @covers ::gentelellaAction
     *
     * @param string $path
     */
    public function testGentellelaPages($path)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', sprintf('%s', $path));
        $this->assertTrue($client->getResponse()->getStatusCode() === 200);
    }

    /**
     * @dataProvider gentelellaSwitchablePages
     * @covers ::gentelellaAction
     *
     * @param string $path
     */
    public function testBackIntoTheApp($path)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', sprintf('%s', $path));

        $link = $crawler
            ->filter('a:contains("Back to the application")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(
            'Template preview',
            $crawler->filter('a:contains("Template preview")')->eq(0)->text()
        );
    }

    /**
     * @dataProvider adminPages
     * @covers ::adminAction
     *
     * @param string $path
     */
    public function testAdminPages($path)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', sprintf('%s', $path));
        $this->assertTrue($client->getResponse()->getStatusCode() === 200);
    }

    /**
     * @dataProvider adminBlankPages
     * @covers ::adminAction
     *
     * @param string $path
     */
    public function testBlankPages($path)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', sprintf('%s', $path));
        $this->assertTrue($client->getResponse()->getStatusCode() === 200);
        $this->assertSame(
            'Plain Page',
            $crawler->filter('h3:contains("Plain Page")')->text()
        );
    }

    /**
     * @dataProvider adminPages
     * @covers ::adminAction
     *
     * @param string $path
     */
    public function testGoIntoTemplate($path)
    {
        $client = static::createClient();
        $crawler = $client->request('GET', sprintf('/%s', $path));

        $link = $crawler
            ->filter('a:contains("Template preview")')
            ->eq(0)
            ->link();

        $crawler = $client->click($link);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(
            'Back to the application',
            $crawler->filter('a:contains("Back to the application")')->eq(0)->text()
        );
    }

    /**
     * @return array
     */
    public function gentelellaPages()
    {
        return [
            ['gentelella'],
            ['gentelella/calendar'],
            ['gentelella/chartjs'],
            ['gentelella/chartjs2'],
            ['gentelella/contacts'],
            ['gentelella/e_commerce'],
            ['gentelella/echarts'],
            ['gentelella/fixed_sidebar'],
            ['gentelella/form'],
            ['gentelella/form_advanced'],
            ['gentelella/form_buttons'],
            ['gentelella/form_upload'],
            ['gentelella/form_validation'],
            ['gentelella/form_wizards'],
            ['gentelella/general_elements'],
            ['gentelella/glyphicons'],
            ['gentelella/icons'],
            ['gentelella/inbox'],
            ['gentelella/index'],
            ['gentelella/index2'],
            ['gentelella/index3'],
            ['gentelella/invoice'],
            ['gentelella/level2'],
            ['gentelella/login'],
            ['gentelella/map'],
            ['gentelella/media_gallery'],
            ['gentelella/morisjs'],
            ['gentelella/other_charts'],
            ['gentelella/page_404'],
            ['gentelella/page_500'],
            ['gentelella/plain_page'],
            ['gentelella/pricing_tables'],
            ['gentelella/profile'],
            ['gentelella/project_detail'],
            ['gentelella/projects'],
            ['gentelella/sign_up'],
            ['gentelella/tables'],
            ['gentelella/tables_dynamic'],
            ['gentelella/typography'],
            ['gentelella/widgets'],
            ['gentelella/xx'],
        ];
    }

    /**
     * @return array
     */
    public function gentelellaSwitchablePages()
    {
        return [
            ['gentelella'],
            ['gentelella/calendar'],
            ['gentelella/chartjs'],
            ['gentelella/chartjs2'],
            ['gentelella/contacts'],
            ['gentelella/e_commerce'],
            ['gentelella/echarts'],
            ['gentelella/fixed_sidebar'],
            ['gentelella/form'],
            ['gentelella/form_advanced'],
            ['gentelella/form_buttons'],
            ['gentelella/form_upload'],
            ['gentelella/form_validation'],
            ['gentelella/form_wizards'],
            ['gentelella/general_elements'],
            ['gentelella/glyphicons'],
            ['gentelella/icons'],
            ['gentelella/inbox'],
            ['gentelella/index'],
            ['gentelella/index2'],
            ['gentelella/index3'],
            ['gentelella/invoice'],
            ['gentelella/level2'],
            ['gentelella/map'],
            ['gentelella/media_gallery'],
            ['gentelella/morisjs'],
            ['gentelella/other_charts'],
            ['gentelella/plain_page'],
            ['gentelella/pricing_tables'],
            ['gentelella/profile'],
            ['gentelella/project_detail'],
            ['gentelella/projects'],
            ['gentelella/sign_up'],
            ['gentelella/tables'],
            ['gentelella/tables_dynamic'],
            ['gentelella/typography'],
            ['gentelella/widgets'],
        ];
    }

    /**
     * @return array
     */
    public function adminPages()
    {
        return [
            ['admin'],
            ['admin/calendar'],
            ['admin/chartjs'],
            ['admin/chartjs2'],
            ['admin/contacts'],
            ['admin/e_commerce'],
            ['admin/echarts'],
            ['admin/fixed_sidebar'],
            ['admin/form'],
            ['admin/form_advanced'],
            ['admin/form_buttons'],
            ['admin/form_upload'],
            ['admin/form_validation'],
            ['admin/form_wizards'],
            ['admin/general_elements'],
            ['admin/glyphicons'],
            ['admin/icons'],
            ['admin/inbox'],
            ['admin/index'],
            ['admin/index2'],
            ['admin/index3'],
            ['admin/invoice'],
            ['admin/level2'],
            ['admin/login'],
            ['admin/map'],
            ['admin/media_gallery'],
            ['admin/morisjs'],
            ['admin/other_charts'],
            ['admin/page_404'],
            ['admin/page_500'],
            ['admin/plain_page'],
            ['admin/pricing_tables'],
            ['admin/profile'],
            ['admin/project_detail'],
            ['admin/projects'],
            ['admin/sign_up'],
            ['admin/tables'],
            ['admin/tables_dynamic'],
            ['admin/typography'],
            ['admin/widgets'],
            ['admin/xx'],
        ];
    }

    /**
     * @return array
     */
    public function adminBlankPages()
    {
        return [
            ['admin/calendar'],
            ['admin/chartjs'],
            ['admin/chartjs2'],
            ['admin/contacts'],
            ['admin/e_commerce'],
            ['admin/echarts'],
            ['admin/fixed_sidebar'],
            ['admin/form'],
            ['admin/form_advanced'],
            ['admin/form_buttons'],
            ['admin/form_upload'],
            ['admin/form_validation'],
            ['admin/form_wizards'],
            ['admin/general_elements'],
            ['admin/glyphicons'],
            ['admin/icons'],
            ['admin/inbox'],
            ['admin/index2'],
            ['admin/index3'],
            ['admin/invoice'],
            ['admin/level2'],
            ['admin/login'],
            ['admin/map'],
            ['admin/media_gallery'],
            ['admin/morisjs'],
            ['admin/other_charts'],
            ['admin/page_404'],
            ['admin/page_500'],
            ['admin/plain_page'],
            ['admin/pricing_tables'],
            ['admin/profile'],
            ['admin/project_detail'],
            ['admin/projects'],
            ['admin/sign_up'],
            ['admin/tables'],
            ['admin/tables_dynamic'],
            ['admin/typography'],
            ['admin/widgets'],
            ['admin/xx'],
        ];
    }
}
