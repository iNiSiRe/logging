<?php

namespace inisire\Logging;

class MessageFormatter implements Contract\MessageFormatter
{
    public function format(string $level, string $message, array $context): string
    {
        return sprintf('[%s, %s] %s %s', date(DATE_ATOM, time()), $level, $message, json_encode($context));
    }
}