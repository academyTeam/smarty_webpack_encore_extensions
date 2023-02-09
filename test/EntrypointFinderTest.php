<?php

namespace AcademyTeam\SmartyWebpackEncore\Extension\Test;

use AcademyTeam\SmartyWebpackEncore\Extension\EntrypointFinder;
use PHPUnit\Framework\TestCase;

class EntrypointFinderTest extends TestCase
{

    public function testEntrypointFinder() {

        $entrypointFinder = new EntrypointFinder();
        $entrypoints = $entrypointFinder->getEntrypoints();

        $this->assertArrayHasKey('css', $entrypoints['app']);
        $this->assertArrayHasKey('js', $entrypoints['app']);

    }

}
