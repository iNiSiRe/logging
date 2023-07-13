<?php

namespace inisire\Logging;

enum LogLevel: int
{
    case EMERGENCY = 0;
    case ALERT     = 1;
    case CRITICAL  = 2;
    case ERROR     = 3;
    case WARNING   = 4;
    case NOTICE    = 5;
    case INFO      = 6;
    case DEBUG     = 7;

    public function toString(): string {
        return self::getName($this);
    }

    public static function getName(self $value): string {
        return match ($value) {
            self::EMERGENCY => 'emergency',
            self::ALERT => 'alert',
            self::CRITICAL => 'critical',
            self::ERROR => 'error',
            self::WARNING => 'warning',
            self::NOTICE => 'notice',
            self::INFO => 'info',
            self::DEBUG => 'debug',
        };
    }

    public static function fromName(string $name): self
    {
        return match ($name) {
            'emergency' => self::EMERGENCY,
            'alert' => self::ALERT,
            'critical' => self::CRITICAL,
            'error' => self::ERROR,
            'warning' => self::WARNING,
            'notice' => self::NOTICE,
            'info' => self::INFO,
            'debug' => self::DEBUG,
            default => throw new \InvalidArgumentException(sprintf('Level with name "%s" not exists', $name))
        };
    }
}