<?php

use ECidade\Core\CoreBundle;
use PHPUnit\Framework\TestCase;

class CoreTest extends TestCase
{
    public function testBundleInstantiation()
    {
        $bundle = new CoreBundle();
        $this->assertInstanceOf(CoreBundle::class, $bundle);
    }
}
