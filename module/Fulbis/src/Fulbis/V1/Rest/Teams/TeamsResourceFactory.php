<?php
namespace Fulbis\V1\Rest\Teams;

use Fulbis\TableGatewayMapper;
use Fulbis\TableGateway;

class TeamsResourceFactory
{
    public function __invoke($services)
    {
        $db = $services->get('FulbisDb');
        $tableGateway = new TableGateway('team', 'Fulbis\V1\Rest\Teams\TeamEntity', $db);
        $mapper = new TableGatewayMapper($tableGateway);
        return new TeamsResource($mapper);
    }
}
