<?php
declare(strict_types = 1);

namespace TBolier\RethinkQL\IntegrationTest\Aggregation;

use TBolier\RethinkQL\IntegrationTest\Query\AbstractTableTest;
use TBolier\RethinkQL\Response\ResponseInterface;

class MaxTest extends AbstractTableTest
{
    /**
     * @return void
     * @throws \Exception
     */
    public function testMax(): void
    {
        $this->insertDocumentWithNumber(5, 99);
        $this->insertDocumentWithNumber(4, 77);
        $this->insertDocumentWithNumber(3, 1045);
        $this->insertDocumentWithNumber(2, 4);
        $this->insertDocumentWithNumber(1, 43534);

        /** @var ResponseInterface $res */
        $res = $this->r()
            ->table('tabletest')
            ->max('number')
            ->run();

        /** @var array $array */
        $array = $res->getData();

        $this->assertArraySubset(['number' => 43534], $array);
    }
}
