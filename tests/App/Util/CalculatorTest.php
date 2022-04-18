namespace Tests\App\Util;

use App\Util\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testAdd()
    {
        $calc = new Calculator();
        $result = $calc->add(30, 12);

        // Affirme que votre Calculatrice ajoute les nombres correctement
        $this->assertEquals(42, $result);
    }
}