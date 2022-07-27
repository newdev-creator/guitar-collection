<?php
namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeControllerTest extends WebTestCase
{
    public function testPublicAccess(): void
    {
        $client = static::createClient();

        $client->request('GET', '/');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/collection/');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/post/');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/brand/');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/contact');
        $this->assertResponseIsSuccessful();

        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
    }
}