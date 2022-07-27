<?php
namespace App\Tests\Entity;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PostsTest extends KernelTestCase
{
    public function testValidEntity() {
        $posts = (new Post())
            ->setTitle('Titre')
            ->setPresentation('Presentation')
            ->setSynopsis('Synopsis')
            ->setImage('Image')
        ;
        $this->assertEquals('Titre', $posts->getTitle());
        $this->assertEquals('Presentation', $posts->getPresentation());
        $this->assertEquals('Synopsis', $posts->getSynopsis());
        $this->assertEquals('Image', $posts->getImage());

        $this->assertInstanceOf(Post::class, $posts);
    }
}