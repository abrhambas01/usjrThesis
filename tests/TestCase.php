<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @param bool $runTestInSeparateProcess
     */
    public function setUp($runTestInSeparateProcess)
    {
//        $this->runTestInSeparateProcess = $runTestInSeparateProcess;


    }
}
