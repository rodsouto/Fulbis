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
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'fulbis.rest.tournament',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\TournamentResource' => 'Fulbis\\V1\\Rest\\Tournaments\\TournamentResourceFactory',
        ),
    ),
    'zf-rest' => array(
        'Fulbis\\V1\\Rest\\Tournaments\\Controller' => array(
            'listener' => 'Fulbis\\V1\\Rest\\Tournaments\\TournamentResource',
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
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Fulbis\\V1\\Rest\\Tournaments\\Controller' => array(
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
        ),
    ),
    'zf-content-validation' => array(
        'Fulbis\\V1\\Rest\\Tournaments\\Controller' => array(
            'input_filter' => 'Fulbis\\V1\\Rest\\Tournaments\\Validator',
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
    ),
);
