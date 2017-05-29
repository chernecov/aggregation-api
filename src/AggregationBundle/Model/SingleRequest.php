<?php

namespace AggregationBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Single request
 *
 * @author Sergey Chernecov <sergey.chernecov@gmail.com>
 */
class SingleRequest
{
    /**
     * Id
     *
     * @var string
     *
     * @JMS\Type("string")
     */
    private $id;

    /**
     * Method
     *
     * @var string
     *
     * @JMS\Type("string")
     */
    private $method;

    /**
     * Path
     *
     * @var string
     *
     * @JMS\Type("string")
     */
    private $path;

    /**
     * Get id
     *
     * @return int|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param int|string $id
     *
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Get method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Set method
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod($method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return $this
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }
}
