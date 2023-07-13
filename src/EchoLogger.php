<?php

namespace inisire\Logging;

class EchoLogger extends Logger
{
    protected function doLog(string $level, string $message): void
    {
        echo $message . PHP_EOL;
    }
}