<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Exception
 * @subpackage UnitTests
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id$
 */


/**
 * @category   Zend
 * @package    Zend_Exception
 * @subpackage UnitTests
 * @group      Zend_Exception
 * @copyright  Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_ExceptionTest extends PHPUnit\Framework\TestCase
{
    /**
     * @return void
     */
    public function testConstructorDefaults()
    {
        $e = new Zend_Exception();
        $this->assertEquals('', $e->getMessage());
        $this->assertEquals(0, $e->getCode());
        $this->assertNull($e->getPrevious());
    }

    /**
     * @return void
     */
    public function testMessage()
    {
        $e = new Zend_Exception('msg');
        $this->assertEquals('msg', $e->getMessage());
    }

    /**
     * @doesNotPerformAssertions
     * @return void
     */
    public function testStringCodeDoesNotThrowError()
    {
        $e = new Zend_Exception('msg', 'abc');
    }

    /**
     * @return void
     */
    public function testCode()
    {
        $e = new Zend_Exception('msg', 100);
        $this->assertEquals(100, $e->getCode());
    }

    /**
     * @return void
     */
    public function testPrevious()
    {
        $p = new Zend_Exception('p', 0);
        $e = new Zend_Exception('e', 0, $p);
        $this->assertEquals($p, $e->getPrevious());
    }

    /**
     * @return void
     */
    public function testToString()
    {
        $p = new Zend_Exception('p', 0);
        $e = new Zend_Exception('e', 0, $p);
        $s = $e->__toString();
        $this->assertStringContainsString('p', $s);
        $this->assertStringContainsString('Next', $s);
        $this->assertStringContainsString('e', $s);
    }
}
