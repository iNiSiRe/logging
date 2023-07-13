<?php

namespace inisire\Logging;

use Psr\Log\AbstractLogger;

abstract class Logger extends AbstractLogger
{
    private Contract\MessageFormatter $formatter;

    public function __construct()
    {
        $this->formatter = new MessageFormatter();
    }

    public function withFormatter(Contract\MessageFormatter $formatter): void
    {
        $this->formatter = $formatter;
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->doLog($level, $this->formatter->format($level, $message, $context));
    }

    abstract protected function doLog(string $level, string $message): void;
}