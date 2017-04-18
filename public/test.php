<?php

interface LoggerInterface
{
    public function log(string $message);
}

class Mailer
{
     /** @var LoggerInterface */
    protected $logger;
    public function setLogger(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function test()
    {
        echo 'Work...';
        $this->logger->log('Finish');
    }
}

$mailer = new Mailer();
$mailer->setLogger(new class implements LoggerInterface {
    public function log(string $message)
    {
        echo $message;
    }
});
$mailer->test();