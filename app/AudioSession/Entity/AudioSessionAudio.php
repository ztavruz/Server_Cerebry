<?php
declare(strict_types=1);

namespace App\AudioSession\Entity;


class AudioSessionAudio
{
    private $id;

    /**
     * @var AudioSession
     */
    private $audioSession;

    /**
     * @var Audio
     */
    private $audio;

    public function __construct(AudioSession $audioSession, Audio $audio)
    {
        $this->audioSession = $audioSession;
        $this->audio = $audio;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return AudioSession
     */
    public function getAudioSession(): AudioSession
    {
        return $this->audioSession;
    }

    /**
     * @return Audio
     */
    public function getAudio(): Audio
    {
        return $this->audio;
    }
}