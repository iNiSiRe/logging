<?php

namespace inisire\Logging\Contract;

interface MessageFormatter
{
    public function format(string $level, string $message, array $context): string;
}