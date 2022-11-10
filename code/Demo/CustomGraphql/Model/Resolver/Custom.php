<?php


namespace Demo\CustomGraphql\Model\Resolver;

use Magento\Framework\GraphQl\Config\Element\Field;
use Magento\Framework\GraphQl\Query\Resolver\BatchResolverInterface;
use Magento\Framework\GraphQl\Query\Resolver\BatchResponse;
use Magento\Framework\GraphQl\Query\Resolver\BatchResponseFactory;
use Magento\Framework\GraphQl\Query\Resolver\ContextInterface;

class Custom implements BatchResolverInterface
{
    private BatchResponseFactory $responseFactory;

    /**
     * @param BatchResponseFactory $responseFactory
     */
    public function __construct(BatchResponseFactory $responseFactory)
    {
        $this->responseFactory = $responseFactory;
    }

    /**
     * Resolve multiple requests.
     *
     * @param ContextInterface $context
     * @param Field $field
     * @param array $requests
     * @return BatchResponse
     */
    public function resolve(ContextInterface $context, Field $field, array $requests): BatchResponse
    {
        /** @var BatchResponse $response */
        $response = $this->responseFactory->create();
        $response->addResponse($requests, [
            ['message' => 'teste']
        ]);

        return $response;
    }
}
