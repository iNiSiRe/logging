<?php

namespace inisire\Logging;

class Syslog extends Logger
{
    public function __construct(
        string $prefix,
        int $flags,
        int $facility
    )
    {
        parent::__construct();

        openlog($prefix, $flags, $facility);
    }

    protected function doLog(string $level, string $message): void
    {
        $level = LogLevel::fromName($level);

        syslog($level->value, $message);
    }
}