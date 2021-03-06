<?php
/**
 * Created by PhpStorm.
 * User: Bernd
 * Date: 09.10.2016
 * Time: 13:45
 */

namespace AppBundle\Entity;


class Payload
{
    /**
     * @var string
     */
    public $channel;

    /**
     * @var string
     */
    public $text;

    /**
     * @var string
     */
    public $mrkdwn;

    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $icon_emoji;

    /**
     * @var array
     */
    public $attachments;

    /**
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * @param string $channel
     */
    public function setChannel($channel)
    {
        $this->channel = $channel;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return string
     */
    public function getMrkdwn()
    {
        return $this->mrkdwn;
    }

    /**
     * @param string $mrkdwn
     */
    public function setMrkdwn($mrkdwn)
    {
        $this->mrkdwn = $mrkdwn;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getIconEmoji()
    {
        return $this->icon_emoji;
    }

    /**
     * @param string $icon_emoji
     */
    public function setIconEmoji($icon_emoji)
    {
        $this->icon_emoji = $icon_emoji;
    }

    /**
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param array $attachments
     */
    public function setAttachments($attachments)
    {
        $this->attachments = $attachments;
    }
}