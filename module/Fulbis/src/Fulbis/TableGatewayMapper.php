<?php


namespace Fulbis;

use DomainException;
use InvalidArgumentException;
use Traversable;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Stdlib\ArrayUtils;
use Fulbis\V1\Rest\Tournaments\TournamentsCollection as Collection;

/**
 * Mapper implementation using a Zend\Db\TableGateway
 */
class TableGatewayMapper implements MapperInterface
{
    /**
     * @var TableGateway
     */
    protected $table;
    /**
     * @param TableGateway $table
     */
    public function __construct(TableGateway $table)
    {
        $this->table = $table;
    }
    /**
     * @param array|Traversable|\stdClass $data
     * @return Entity
     */
    public function create($data)
    {
        if ($data instanceof Traversable) {
            $data = ArrayUtils::iteratorToArray($data);
        }
        if (is_object($data)) {
            $data = (array) $data;
        }
        if (!is_array($data)) {
            throw new InvalidArgumentException(sprintf(
                'Invalid data provided to %s; must be an array or Traversable',
                __METHOD__
            ));
        }

        $this->table->insert($data);

        $lastId = $this->table->getLastInsertValue();
        $resultSet = $this->table->select(array('id' => $lastId));
        if (0 === count($resultSet)) {
            throw new DomainException('Insert operation failed or did not result in new row', 500);
        }

        return $resultSet->current();
    }
    /**
     * @param string $id
     * @return Entity
     */
    public function fetch($id)
    {
        $resultSet = $this->table->select(array('id' => $id));
        if (0 === count($resultSet)) {
            throw new DomainException('Status message not found', 404);
        }
        return $resultSet->current();
    }
    /**
     * @return Collection
     */
    public function fetchAll()
    {
        return new Collection(new DbTableGateway($this->table));
    }
    /**
     * @param string $id
     * @param array|Traversable|\stdClass $data
     * @return Entity
     */
    public function update($id, $data)
    {
        if (is_object($data)) {
            $data = (array) $data;
        }
        $this->table->update($data, array('id' => $id));
        $resultSet = $this->table->select(array('id' => $id));
        if (0 === count($resultSet)) {
            throw new DomainException('Update operation failed or result in row deletion', 500);
        }
        return $resultSet->current();
    }
    /**
     * @param string $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->table->delete(array('id' => $id));
        if (!$result) {
            return false;
        }
        return true;
    }
}