<?php
declare(strict_types=1);

namespace TBolier\RethinkQL\Query;

use TBolier\RethinkQL\Types\Query\QueryType;

class Message implements MessageInterface
{
    /**
     * @var int
     */
    private $queryType;

    /**
     * @var QueryInterface
     */
    private $query;

    /**
     * @var OptionsInterface
     */
    private $options;

    /**
     * @param int $queryType
     * @param QueryInterface $query
     * @param array $options
     */
    public function __construct(int $queryType = null, QueryInterface $query = null, array $options = null)
    {
        $this->queryType = $queryType ?? QueryType::START;
        $this->query = $query ?? new Query([]);
        $this->options = $options ?? [];
    }

    /**
     * @inheritdoc
     */
    public function getQueryType(): int
    {
        return $this->queryType;
    }

    /**
     * @inheritdoc
     */
    public function setQueryType(int $queryType): MessageInterface
    {
        $this->queryType = $queryType;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getQuery(): QueryInterface
    {
        return $this->query;
    }

    /**
     * @inheritdoc
     */
    public function setQuery(QueryInterface $query): MessageInterface
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getOptions(): OptionsInterface
    {
        return $this->options;
    }

    /**
     * @inheritdoc
     */
    public function setOptions(OptionsInterface $options): MessageInterface
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function toArray(): array
    {
        return [
            $this->queryType,
            $this->getQuery(),
            (object)$this->getOptions()
        ];
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }
}
