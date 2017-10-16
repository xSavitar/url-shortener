<?php

/**
 * Class Environments
 * Handles the environment differences between production and development
 */
class Environments
{

    /**
     * @var string The host we are currently working with
     */
    private $host;

    /**
     * @var string The script we are currently working with
     */
    private $script;

    const developmentHost = 'localhost:3000/shortener.php';
    const productionHost = 'tools.wmflabs.org/durl-shortener/shortener.php';
    const developmentScript = 'localhost:3000/php/shorten.php';
    const productionScript = 'tools.wmflabs.org/durl-shortener/php/shorten.php';

    public function __construct( $environment ) {
        $this->setHost( $environment );
        $this->setScript( $environment );
        return $this;
    }

    /**
     * Sets the host based on the environment
     * @param $env
     * @return string
     */
    public function setHost( $env ) {
        if ( $env == "dev" ) {
            $this->host = self::developmentHost;
            return $this;
        }
        $this->host = self::productionHost;
        return $this;
    }

    /**
     * Sets the script based on the environment
     * @param $env
     * @return string
     */
    public function setScript( $env ) {
        if ( $env == "dev" ) {
            $this->script = self::developmentScript;
            return $this;
        }
        $this->script = self::productionScript;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getScript()
    {
        return $this->script;
    }
}
