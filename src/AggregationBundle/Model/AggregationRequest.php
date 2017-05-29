<?php

namespace AggregationBundle\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * Single request
 *
 * @author Sergey Chernecov <sergey.chernecov@gmail.com>
 */
class AggregationRequest
{
    /**
     * Requests
     *
     * @var array|SingleRequest[]
     *
     * @JMS\Type("array<AggregationBundle\Model\SingleRequest>")
     */
    private $requests = [];

    /**
     * Get requests
     *
     * @return array|SingleRequest[]
     */
    public function getRequests()
    {
        return $this->requests;
    }

    /**
     * Set requests
     *
     * @param array|SingleRequest[] $requests
     *
     * @return $this
     */
    public function setRequests(array $requests)
    {
        $this->requests = $requests;
        return $this;
    }

    /**
     * Add request
     *
     * @param SingleRequest $request
     *
     * @return $this
     */
    public function addRequest(SingleRequest $request)
    {
        $this->requests[] = $request;
        return $this;
    }
}
