<?php
namespace Tests;

trait TestAssertionsTrait
{
    public function assertStringContains($string, $search)
    {
        if(is_array($search)) {
            foreach($search as $s) {
                return $this->assertStringContains($string, $s);
            }
        }

        return $this->assertTrue(strpos($string, $search) >= 0);
    }
}
