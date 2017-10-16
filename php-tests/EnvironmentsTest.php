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
        $target = new Environment("dev");
        $this->assertEquals(
            Environment::developmentHost,
            $target->getHost()
        );
        $this->assertEquals(
            Environment::developmentScript,
            $target->getScript()
        );
    }

    public function testElse()
    {
        $target = new Environment("anything else");
        $this->assertEquals(
            Environment::productionHost,
            $target->getHost()
        );
        $this->assertEquals(
            Environment::productionScript,
            $target->getScript()
        );
    }
}
