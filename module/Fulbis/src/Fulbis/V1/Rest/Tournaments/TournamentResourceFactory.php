<?php
namespace Fulbis\V1\Rest\Tournaments;

use Fulbis\TableGatewayMapper;
use Fulbis\TableGateway;

class TournamentResourceFactory
{
    public function __invoke($services)
    {
        $db = $services->get('FulbisDb');
        $tableGateway = new TableGateway('tournament', 'Fulbis\V1\Rest\Tournaments\TournamentEntity', $db);
        $mapper = new TableGatewayMapper($tableGateway);
        return new TournamentResource($mapper);
    }
}
