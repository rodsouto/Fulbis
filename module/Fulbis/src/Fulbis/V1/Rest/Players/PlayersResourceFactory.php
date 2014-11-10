<?php
namespace Fulbis\V1\Rest\Players;

use Fulbis\TableGatewayMapper;
use Fulbis\TableGateway;

class PlayersResourceFactory
{
    public function __invoke($services)
    {
        $db = $services->get('FulbisDb');
        $tableGateway = new TableGateway('player', 'Fulbis\V1\Rest\Players\PlayersEntity', $db);
        $mapper = new TableGatewayMapper($tableGateway);
        return new PlayersResource($mapper);
    }
}
