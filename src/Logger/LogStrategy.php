<?php

namespace DifferDev\Logger;

use DifferDev\Logger\Interface\Writter;

class LogStrategy implements Writter
{
    public function __construct(
        protected Writter $writter
    ) {
        # code...
    }

    public function success(string $message): void
    {
        $formatedMessage = 'Success: ' . $message . "\n";
        $this->writter->success($formatedMessage);
    }

    public function warning(string $message): void
    {
        $formatedMessage = 'Warning: ' . $message . "\n";
        $this->writter->warning($formatedMessage);
    }

    public function error(string $message): void
    {
        $formatedMessage = 'Error: ' . $message . "\n";
        $this->writter->error($formatedMessage);
    }
}