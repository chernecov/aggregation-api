<?php

namespace AggregationBundle\Controller;

use AggregationBundle\Model\AggregationRequest;
use AggregationBundle\Model\SingleRequest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Default controller
 *
 * @author Sergey Chernecov <sergey.chernecov@gmail.com>
 */
class DefaultController extends Controller
{
    /**
     * Index action
     *
     * @param Request $request
     *
     * @Route("/")
     *
     * @return void
     */
    public function indexAction(Request $request)
    {
        $client = $this->get('old_sound_rabbit_mq.requester_rpc');
        $serializer = $this->get('jms_serializer');

        $aggregation = $request->getContent();

        /** @var AggregationRequest $aggregationRequest */
        $aggregationRequest = $serializer->deserialize(
            $aggregation,
            AggregationRequest::class,
            'json'
        );

        if (!$aggregationRequest instanceof AggregationRequest) {
            throw new BadRequestHttpException();
        }

        foreach ($aggregationRequest->getRequests() as $request) {
            $client->addRequest(
                $serializer->serialize($request, 'json'),
                'aggregation',
                $request->getId()
            );
        }

        $replies = $client->getReplies();

        foreach ($replies as $reply) {
            print_r($reply->body);
        }

        die();
    }
}
