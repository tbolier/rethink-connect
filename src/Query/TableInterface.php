<?php
declare(strict_types = 1);

namespace TBolier\RethinkQL\Query;

use TBolier\RethinkQL\Query\Aggregation\AggregationInterface;
use TBolier\RethinkQL\Query\Operation\OperationInterface;

interface TableInterface extends OperationInterface
{
    /**
     * @param string|int $value
     * @return AbstractQuery
     */
    public function get($value): AbstractQuery;

    /**
     * @param int $n
     * @return AggregationInterface
     */
    public function limit($n): AggregationInterface;

    /**
     * @param mixed|QueryInterface $key
     * @return AggregationInterface
     */
    public function orderBy($key): AggregationInterface;
}
