<?php 

namespace FloatingPoint\Grapevine\Library\Commands;

interface TranslatorInterface 
{
    /**
     * @return string
     */
    public function toCommandHandler($command);

    /**
     * @return string
     */
    public function toValidator($command);
} 
