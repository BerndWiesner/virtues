<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 09.10.2016
 * Time: 11:06
 */

namespace AppBundle\Command;


use AppBundle\Entity\Payload;
use AppBundle\VirtueProvider;
use GuzzleHttp\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PostSlackCommand extends Command
{
    /**
     * @var VirtueProvider
     */
    protected $virtueProvider;
    
    /**
     * PostSlackCommand constructor.
     * @param VirtueProvider $virtueProvider
     * @param array $credentials
     */
    public function __construct(VirtueProvider $virtueProvider)
    {
        $this->virtueProvider = $virtueProvider;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setName('app:post:slack')
            ->setDescription('Posts the daily virtue to a sl ack channel.')
            ->addArgument('url', InputArgument::REQUIRED, 'url to contact')
            ->addArgument('channel', InputArgument::OPTIONAL, 'The channel to post to', null);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $payload = $this->createPayload();
        $payload->setUsername('WerteBot');
        $payload->setIconEmoji(':innocent:');
        if ($input->getArgument('channel')) {
            $payload->setChannel($input->getArgument('channel'));
        }

        $this->sendPayload($payload, $input->getArgument('url'));
    }

    /**
     * @return Payload
     */
    protected function createPayload()
    {
        $virtue = $this->virtueProvider->getVirtueForDate(new \DateTime());

        $payload = new Payload();
        $payload->setMrkdwn(true);
        $text = $virtue->getVirtue()->getMotto() .'\n';
        foreach ($virtue->getVirtue()->getSlogans() as $slogan) {
            $text .= ' ~ ' . $slogan->getText() . ' ~\n';
        }

        $attachment = [
            [
                'fallback' => $virtue->getVirtue()->getTitle(),
                'title' => $virtue->getVirtue()->getTitle(),
                'text' => $text,
                'color' => 'good'
            ]
        ];

        $payload->setText('Wert des Tages für den *' . $virtue->getDatum()->format('d.m.Y') . '*');
        $payload->setAttachments($attachment);


        return $payload;
    }

    /**
     * @param Payload $payload
     * @param $url
     */
    protected function sendPayload(Payload $payload, $url)
    {
        $client = new Client();
        $result = $client->post($url, [
            'body' => str_replace('\\\\', '\\', json_encode($payload))
        ]);
    }
}