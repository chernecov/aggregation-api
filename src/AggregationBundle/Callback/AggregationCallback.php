<?php
/*
 * This file is part of the Ecentria software.
 *
 * (c) 2016, Ecentria, Inc
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AggregationBundle\Callback;

use AggregationBundle\Model\AggregationRequest;
use AggregationBundle\Model\SingleRequest;
use JMS\Serializer\Serializer;
use OldSound\RabbitMqBundle\RabbitMq\ConsumerInterface;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * Aggregation callback
 *
 * @author Sergey Chernecov <sergey.chernecov@gmail.com>
 */
class AggregationCallback implements ConsumerInterface
{
    /**
     * Serializer
     *
     * @var Serializer
     */
    private $serializer;

    /**
     * Aggregation callback constructor
     *
     * @param Serializer $serializer
     */
    public function __construct(Serializer $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * Execute
     *
     * @param AMQPMessage $message
     *
     * @return AMQPMessage
     */
    public function execute(AMQPMessage $message)
    {
        try {
            /** @var SingleRequest $request */
            $request = $this->serializer->deserialize(
                $message->body,
                SingleRequest::class,
                'json'
            );
        } catch (\Exception $exception) {
            dump($exception);
        }

        $result = file_get_contents($request->getPath());

        dump($result);

        $message->body = $result;

        return $message;
    }
}
