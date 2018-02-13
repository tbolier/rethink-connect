<?php
declare(strict_types = 1);

namespace TBolier\RethinkQL\Query\Aggregation;

use TBolier\RethinkQL\Message\MessageInterface;
use TBolier\RethinkQL\Query\QueryInterface;
use TBolier\RethinkQL\RethinkInterface;
use TBolier\RethinkQL\Types\Term\TermType;

class OrderBy extends AbstractAggregation
{
    /**
     * @var string
     */
    private $key;

    /**
     * @var QueryInterface
     */
    private $query;

    /**
     * @param RethinkInterface $rethink
     * @param MessageInterface $message
     * @param QueryInterface $query
     * @param $key
     */
    public function __construct(
        RethinkInterface $rethink,
        MessageInterface $message,
        QueryInterface $query,
        string $key
    ) {
        parent::__construct($rethink, $message);

        $this->query = $query;
        $this->key = $key;
        $this->rethink = $rethink;
        $this->message = $message;
    }

    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        return [
            TermType::ORDER_BY,
            [
                $this->query->toArray(),
                [
                    TermType::DATUM,
                    $this->key,
                ],
            ],
        ];
    }
}
