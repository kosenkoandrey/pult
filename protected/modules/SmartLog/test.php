<?
include_once 'init.php';
use PHPUnit\Framework\TestCase;

class SmartLogTest extends TestCase {
    
    public function testLogDir() {
        $this->assertEquals(true, file_exists(APP::$conf['logs']));
    }
    
}
