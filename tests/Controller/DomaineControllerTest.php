<?php

namespace App\Tests\Controller;

// Permet de faire des tests avec des Requetes et Reponses
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class DomaineControllerTest extends WebTestCase
{
    public function testIndexPage()
    {
        // Permet de créer un client
        $client = static::createClient();

        $client->request('GET', '/domaine');

        // Attend un réponse de type 301 dans le cas d'une redirection (auth)
        $this->assertEquals(301, $client->getResponse()->getStatusCode());
    }

    /*public function testH1IndexDomaines() {

        $client = static::createClient();

        $client->request('GET', '/domaine');

        $this->assertSelectorTextContains('h1', 'Liste des Domaines');


    }*/

    public function testAuthPage() {

        $client = static::createClient();
        $client->request('GET', '/domaine');
        $this->assertResponseRedirects('/login');

    }
}
