namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GuitarControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->asserReponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Welcome to the Guitar Store!');
    }
}