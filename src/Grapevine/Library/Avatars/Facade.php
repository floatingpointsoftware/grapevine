<?php
namespace FloatingPoint\Grapevine\Library\Avatars;

class Facade extends \Illuminate\Support\Facades\Facade
{
	protected static function getFacadeAccessor()
    {
        return 'avatar';
    }
}
