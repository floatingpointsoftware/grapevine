<?php
namespace Tests;

trait TestAssertionsTrait
{
    public function assertStringContains($string, $search)
    {
        if (is_array($search)) {
            foreach ($search as $s) {
                return $this->assertStringContains($string, $s);
            }
        }

        return $this->assertTrue(strpos($string, $search) >= 0);
    }

    public function assertUsesTrait($trait, $class)
    {
        if (is_array($trait)) {
            foreach ($trait as $t) {
                return $this->assertUsesTrait($t, $class);
            }
        }

        $traits = class_uses($class);
        $this->assertTrue(in_array($trait, $traits));
    }

    public function assertRespondsTo($method, $class)
    {
        if(is_array($method)) {
            foreach($method as $m) {
                $this->assertArrayHasValue($m, get_class_methods($class));
            }
        } else {
            $this->assertArrayHasValue($method, get_class_methods($class));
        }
    }

    public function assertArrayHasValue($value, $array)
    {
        $hasValue = false;

        while($next = array_pop($array)) {
            $hasValue = ($hasValue || ($next == $value));
        }

        $this->assertTrue($hasValue);
    }
}
