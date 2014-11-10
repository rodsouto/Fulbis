<?php

namespace Fulbis;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\TableGateway\TableGateway as ZFTableGateway;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;

/**
 * Custom TableGateway instance for Fulbis
 *
 * Creates a HydratingResultSet seeded with an ObjectProperty hydrator and Entity instance.
 */
class TableGateway extends ZFTableGateway
{
    public function __construct($table, $entityClass, AdapterInterface $adapter, $features = null)
    {
        $resultSet = new HydratingResultSet(new ObjectPropertyHydrator(), new $entityClass);
        return parent::__construct($table, $adapter, $features, $resultSet);
    }
}