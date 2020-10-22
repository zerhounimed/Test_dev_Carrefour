<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Response;

class TokenControllerTest extends ApiTestCase
{
    private $client;

    public function testPOSTCreateToken()
    {
        $this->createUser('aimee.riou', 'test1234');
        $response = new Response();
        $response->setContent(json_encode(array(
            'username' => 'aimee.riou',
            'password' => 'test1234',
        )));
        $response = $this->client->$_POST ('/api/tokens', [
            'auth' => ['aimee.riou', 'test1234']
        ]);

        $response->headers->set('Content-Type', 'application/json');

        $this->assertEquals(200, $response->getStatusCode());
        $this->asserter()->assertResponsePropertyExists(
            $response,
            'token'
        );
    }

    private function createUser(string $username, string $password)
    {
        $user = New User();

        $user->setUsername($username);
        $user->setPassword($password);


    }

}
