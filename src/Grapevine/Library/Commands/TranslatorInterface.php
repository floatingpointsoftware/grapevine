<?php 

namespace FloatingPoint\Grapevine\Library\Commands;

interface TranslatorInterface 
{
    public function toCommandHandler($command);

    public function toValidator($command);
} 
