<?php

/**
 * @author Grigorii Sokolik <g.sokol99@g-sokol.info>
 */

use PHPUnit\Framework\TestCase;

/**
 * EnvironmentsTest
 */
class EnvironmentsTest extends TestCase
{
    public function testDev()
    {
        $target = new Environments("dev");
        $this->assertEquals(
            Environments::developmentHost,
            $target->getHost()
        );
        $this->assertEquals(
            Environments::developmentScript,
            $target->getScript()
        );
    }

    public function testElse()
    {
        $target = new Environments("anything else");
        $this->assertEquals(
            Environments::productionHost,
            $target->getHost()
        );
        $this->assertEquals(
            Environments::productionScript,
            $target->getScript()
        );
    }
}
