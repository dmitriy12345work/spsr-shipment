<?php

namespace stp\spsr\message;

use stp\spsr\BaseType;

class BaseMessage extends BaseType
{
    protected $sid;

    // useful for logging in external application
    /** @var string */
    protected $rawXml;

    /**
     * Set Session ID
     * @param $sid
     *
     * @return $this
     */
    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    public function isRequiredICN()
    {
        return 'ICN';
    }

    public function isRequiredLogin()
    {
        return 'Login';
    }

    public function setRawXml($rawXml)
    {
        $this->rawXml = $rawXml;

        return $this;
    }

    public function getRawXml()
    {
        return $this->rawXml;
    }
}
