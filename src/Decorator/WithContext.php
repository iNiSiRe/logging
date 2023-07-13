<?php

namespace inisire\Logging\Decorator;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;

class WithContext implements LoggerInterface
{
    use LoggerTrait;

    public function __construct(
        private readonly array $context,
        private readonly LoggerInterface $logger,
    )
    {
    }

    public function log($level, \Stringable|string $message, array $context = []): void
    {
        $this->logger->log($level, $message, array_merge($this->context, $context));
    }
}