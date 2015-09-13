<?php

namespace Slack;

use Guzzle\Http\Client as GuzzleClient;

class Client extends GuzzleClient
{
    public function __construct( $token)
    {
        $url = sprintf($token);
        parent::__construct($url);
        //$this->setDefaultOption('query', array('token' => $token));
    }
}
