<?php

namespace DifferDev\Logger\Writter;

use DifferDev\Logger\Interface\Writter;

class Console implements Writter
{
    public function success(string $message): void
    {
        echo $message;
    }
    public function warning(string $message): void
    {
        echo $message;
    }

    public function error(string $message): void
    {
        echo $message;
    }
}