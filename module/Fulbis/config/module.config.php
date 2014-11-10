<?php
return array(
    'router' => array(
        'routes' => array(
            'fulbis.rest.tournament' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/tournaments[/:tournament_id]',
                    'defaults' => array(
                        'controller' => 'Fulbis\\V1\\Rest\\Tournaments\\Controller',
                    ),
                ),
            ),
            'fulbis.rest.teams' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/teams[/:team_id]',
                    'defaults' => array(
                        'controller' => 'Fulbis\\V1\\Rest\\Teams\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'fulbis.rest.tournament',
            1 => 'fulbis.rest.teams',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\TournamentsResource' => 'Fulbis\\V1\\Rest\\Tournaments\\TournamentsResourceFactory',
            'Fulbis\\V1\\Rest\\Teams\\TeamsResource' => 'Fulbis\\V1\\Rest\\Teams\\TeamsResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'Fulbis\\V1\\Rest\\Tournaments\\Controller' => array(
            'listener' => 'Fulbis\\V1\\Rest\\Tournaments\\TournamentsResource',
            'route_name' => 'fulbis.rest.tournament',
            'route_identifier_name' => 'tournament_id',
            'collection_name' => 'tournaments',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Fulbis\\V1\\Rest\\Tournaments\\TournamentEntity',
            'collection_class' => 'Fulbis\\V1\\Rest\\Tournaments\\TournamentsCollection',
            'service_name' => 'Tournaments',
        ),
        'Fulbis\\V1\\Rest\\Teams\\Controller' => array(
            'listener' => 'Fulbis\\V1\\Rest\\Teams\\TeamsResource',
            'route_name' => 'fulbis.rest.teams',
            'route_identifier_name' => 'team_id',
            'collection_name' => 'teams',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => '10',
            'entity_class' => 'Fulbis\\V1\\Rest\\Teams\\TeamEntity',
            'collection_class' => 'Fulbis\\V1\\Rest\\Teams\\TeamsCollection',
            'service_name' => 'Teams',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\Controller' => 'HalJson',
            'Fulbis\\V1\\Rest\\Teams\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\Controller' => array(
                0 => 'application/vnd.fulbis.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
            'Fulbis\\V1\\Rest\\Teams\\Controller' => array(
                0 => 'application/vnd.fulbis.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\Controller' => array(
                0 => 'application/vnd.fulbis.v1+json',
                1 => 'application/json',
            ),
            'Fulbis\\V1\\Rest\\Teams\\Controller' => array(
                0 => 'application/vnd.fulbis.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\TournamentEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'fulbis.rest.tournament',
                'route_identifier_name' => 'tournament_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ObjectProperty',
            ),
            'Fulbis\\V1\\Rest\\Tournaments\\TournamentsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'fulbis.rest.tournament',
                'route_identifier_name' => 'tournament_id',
                'is_collection' => true,
            ),
            'Fulbis\\V1\\Rest\\Teams\\TeamEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'fulbis.rest.teams',
                'route_identifier_name' => 'team_id',
                'hydrator' => 'Zend\\Stdlib\\Hydrator\\ObjectProperty',
            ),
            'Fulbis\\V1\\Rest\\Teams\\TeamsCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'fulbis.rest.teams',
                'route_identifier_name' => 'teams_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Fulbis\\V1\\Rest\\Tournaments\\Controller' => array(
            'input_filter' => 'Fulbis\\V1\\Rest\\Tournaments\\Validator',
        ),
        'Fulbis\\V1\\Rest\\Teams\\Controller' => array(
            'input_filter' => 'Fulbis\\V1\\Rest\\Teams\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Fulbis\\V1\\Rest\\Tournaments\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'error_message' => 'Tournaments name is required.',
            ),
        ),
        'Fulbis\\V1\\Rest\\Teams\\Validator' => array(
            0 => array(
                'name' => 'name',
                'required' => true,
                'filters' => array(),
                'validators' => array(),
                'allow_empty' => false,
                'continue_if_empty' => false,
            ),
        ),
    ),
);
