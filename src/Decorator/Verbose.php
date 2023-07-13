<?php

namespace inisire\Logging\Decorator;

use inisire\Logging\LogLevel;
use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class Verbose implements LoggerInterface
{
    use LoggerTrait;

    public function __construct(
        private readonly LogLevel $level,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $level = LogLevel::fromName($level);

        if ($level->value <= $this->level->value) {
            $this->logger->log($level->toString(), $message, $context);
        }
    }
}