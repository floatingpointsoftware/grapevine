<?php

namespace FloatingPoint\Grapevine\Library\Commands;

/**
 *  This class provides translation of CommandRequest objects to their associated validator and handler classes
 *  The CommandRequest doesn't bind any methods, so any class can implement it
 *
 * @author Mike Dugan
 */

class Translator implements TranslatorInterface
{
    /**
     * Parses a command object to a command handler
     *
     * @param $command
     * @throws HandlerException
     * @return string
     */
    public function toCommandHandler($command)
    {
        $handler = $this->assembleNamespace(get_class($command), 'Handler');

        if (! class_exists($handler)) {
            throw new HandlerException($handler);
        }

        return $handler;
    }

    /**
     * Parses a command object to a command validator
     *
     * @param $command
     * @return string
     */
    public function toValidator($command)
    {
        return $this->assembleNamespace(get_class($command), 'Validator');
    }

    /**
     * Converts a command object class string to string for Validators and Handlers
     * ie: Dsp\Users\Commands\RegisterUser -> Dsp\Users\Handlers\RegisterUser
     * ie: Dsp\Users\Commands\RegisterUser -> Dsp\Users\Validators\RegisterUser
     *
     * @param string $str
     * @param string $type
     * @return string
     */
    private function assembleNamespace($str, $type)
    {
        $parts = explode('\\', $str);

        //the actual class name
        $class = array_pop($parts);

        //the class's namespace
        $ns = str_replace('Commands', $type . 's', array_pop($parts));

        //reassemble and return
        return implode('\\', $parts) . '\\' . $ns . '\\' . $class;
    }
}
