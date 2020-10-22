<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DomaineControllerTest extends WebTestCase
{
    public function testIndexPage()
    {
        $client = static::createClient();

        $client->request('GET', '/domaine');

        $this->assertEquals(301, $client->getResponse()->getStatusCode());
    }
}
