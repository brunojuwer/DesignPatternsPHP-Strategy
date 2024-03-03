<?php

use DifferDev\Logger\LogStrategy;
use DifferDev\Logger\MyLogger;

use DifferDev\Logger\Writter\Console;
use DifferDev\Logger\Writter\File;

class MyLoggerTest extends PHPUnit\Framework\TestCase
{
    protected MyLogger $consoleLog;
    
    protected MyLogger $fileLog;

    public function setUp(): void
    {
        chdir(__DIR__);
        $this->consoleLog = new MyLogger(
            new LogStrategy(
                new Console()
            )
        );

         $this->fileLog = new MyLogger(
            new LogStrategy(
                new File('.', 'logs')
            )
        );
    }

    public function tearDown(): void
    {
        if (file_exists('logs')) {
            unlink('logs');
        }
    }

    public function testClassLoggerShouldLogSuccessInConsole()
    {
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Success: Olá mundo via logger\n");

        $this->consoleLog->success($message);
    }


    public function testClassLoggerShouldLogErrorInConsole()
    {
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Error: Olá mundo via logger\n");

        $this->consoleLog->error($message);
    }


    public function testClassLoggerShouldLogWarningInConsole()
    {
        $message = 'Olá mundo via logger';
        
        $this->expectOutputString("Warning: Olá mundo via logger\n");

        $this->consoleLog->warning($message);
    }


    public function testClassLoggerShouldLogSuccessInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->success($message);

        $this->assertFileEquals('fixtures/log_success', 'logs');
    }

    public function testClassLoggerShouldLogErrorInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->error($message);

        $this->assertFileEquals('fixtures/log_error', 'logs');
    }

    public function testClassLoggerShouldLogWarningInFile()
    {
        $message = 'Olá mundo via arquivo';

        $this->fileLog->warning($message);

        $this->assertFileEquals('fixtures/log_warning', 'logs');
    }
}