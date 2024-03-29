<?php
return [
    'router' => [
        'routes' => [
            'offroad.rest.camisa' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/camisa[/:camisa_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\Camisa\\Controller',
                    ],
                ],
            ],
            'offroad.rest.endereco' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/endereco[/:endereco_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\Endereco\\Controller',
                    ],
                ],
            ],
            'offroad.rest.enderecousuario' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/enderecousuario[/:enderecousuario_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\Enderecousuario\\Controller',
                    ],
                ],
            ],
            'offroad.rest.evento' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/evento[/:evento_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\Evento\\Controller',
                    ],
                ],
            ],
            'offroad.rest.evento-img' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/evento_img[/:evento_img_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\EventoImg\\Controller',
                    ],
                ],
            ],
            'offroad.rest.item-trilha' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/item_trilha[/:item_trilha_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\ItemTrilha\\Controller',
                    ],
                ],
            ],
            'offroad.rest.pagamento' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/pagamento[/:pagamento_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\Pagamento\\Controller',
                    ],
                ],
            ],
            'offroad.rest.refeicao' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/refeicao[/:refeicao_id]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\Refeicao\\Controller',
                    ],
                ],
            ],
            'offroad.rest.usuario' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/usuario[/:IdUsuario]',
                    'defaults' => [
                        'controller' => 'offroad\\V1\\Rest\\Usuario\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'offroad.rest.camisa',
            1 => 'offroad.rest.endereco',
            2 => 'offroad.rest.enderecousuario',
            3 => 'offroad.rest.evento',
            4 => 'offroad.rest.evento-img',
            5 => 'offroad.rest.item-trilha',
            6 => 'offroad.rest.pagamento',
            7 => 'offroad.rest.refeicao',
            8 => 'offroad.rest.usuario',
        ],
    ],
    'zf-rest' => [
        'offroad\\V1\\Rest\\Camisa\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\Camisa\\CamisaResource',
            'route_name' => 'offroad.rest.camisa',
            'route_identifier_name' => 'camisa_id',
            'collection_name' => 'camisa',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\Camisa\CamisaEntity::class,
            'collection_class' => \offroad\V1\Rest\Camisa\CamisaCollection::class,
            'service_name' => 'camisa',
        ],
        'offroad\\V1\\Rest\\Endereco\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\Endereco\\EnderecoResource',
            'route_name' => 'offroad.rest.endereco',
            'route_identifier_name' => 'endereco_id',
            'collection_name' => 'endereco',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\Endereco\EnderecoEntity::class,
            'collection_class' => \offroad\V1\Rest\Endereco\EnderecoCollection::class,
            'service_name' => 'endereco',
        ],
        'offroad\\V1\\Rest\\Enderecousuario\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\Enderecousuario\\EnderecousuarioResource',
            'route_name' => 'offroad.rest.enderecousuario',
            'route_identifier_name' => 'enderecousuario_id',
            'collection_name' => 'enderecousuario',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\Enderecousuario\EnderecousuarioEntity::class,
            'collection_class' => \offroad\V1\Rest\Enderecousuario\EnderecousuarioCollection::class,
            'service_name' => 'enderecousuario',
        ],
        'offroad\\V1\\Rest\\Evento\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\Evento\\EventoResource',
            'route_name' => 'offroad.rest.evento',
            'route_identifier_name' => 'evento_id',
            'collection_name' => 'evento',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\Evento\EventoEntity::class,
            'collection_class' => \offroad\V1\Rest\Evento\EventoCollection::class,
            'service_name' => 'evento',
        ],
        'offroad\\V1\\Rest\\EventoImg\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\EventoImg\\EventoImgResource',
            'route_name' => 'offroad.rest.evento-img',
            'route_identifier_name' => 'evento_img_id',
            'collection_name' => 'evento_img',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\EventoImg\EventoImgEntity::class,
            'collection_class' => \offroad\V1\Rest\EventoImg\EventoImgCollection::class,
            'service_name' => 'evento_img',
        ],
        'offroad\\V1\\Rest\\ItemTrilha\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\ItemTrilha\\ItemTrilhaResource',
            'route_name' => 'offroad.rest.item-trilha',
            'route_identifier_name' => 'item_trilha_id',
            'collection_name' => 'item_trilha',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\ItemTrilha\ItemTrilhaEntity::class,
            'collection_class' => \offroad\V1\Rest\ItemTrilha\ItemTrilhaCollection::class,
            'service_name' => 'item_trilha',
        ],
        'offroad\\V1\\Rest\\Pagamento\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\Pagamento\\PagamentoResource',
            'route_name' => 'offroad.rest.pagamento',
            'route_identifier_name' => 'pagamento_id',
            'collection_name' => 'pagamento',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\Pagamento\PagamentoEntity::class,
            'collection_class' => \offroad\V1\Rest\Pagamento\PagamentoCollection::class,
            'service_name' => 'pagamento',
        ],
        'offroad\\V1\\Rest\\Refeicao\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\Refeicao\\RefeicaoResource',
            'route_name' => 'offroad.rest.refeicao',
            'route_identifier_name' => 'refeicao_id',
            'collection_name' => 'refeicao',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\Refeicao\RefeicaoEntity::class,
            'collection_class' => \offroad\V1\Rest\Refeicao\RefeicaoCollection::class,
            'service_name' => 'refeicao',
        ],
        'offroad\\V1\\Rest\\Usuario\\Controller' => [
            'listener' => 'offroad\\V1\\Rest\\Usuario\\UsuarioResource',
            'route_name' => 'offroad.rest.usuario',
            'route_identifier_name' => 'idUsuario',
            'collection_name' => 'usuario',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \offroad\V1\Rest\Usuario\UsuarioEntity::class,
            'collection_class' => \offroad\V1\Rest\Usuario\UsuarioCollection::class,
            'service_name' => 'usuario',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'offroad\\V1\\Rest\\Camisa\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\Endereco\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\Enderecousuario\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\Evento\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\EventoImg\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\ItemTrilha\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\Pagamento\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\Refeicao\\Controller' => 'HalJson',
            'offroad\\V1\\Rest\\Usuario\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'offroad\\V1\\Rest\\Camisa\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Endereco\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Enderecousuario\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Evento\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\EventoImg\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\ItemTrilha\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Pagamento\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Refeicao\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Usuario\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'offroad\\V1\\Rest\\Camisa\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Endereco\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Enderecousuario\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Evento\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\EventoImg\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\ItemTrilha\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Pagamento\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Refeicao\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
            'offroad\\V1\\Rest\\Usuario\\Controller' => [
                0 => 'application/vnd.offroad.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \offroad\V1\Rest\Camisa\CamisaEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.camisa',
                'route_identifier_name' => 'camisa_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\Camisa\CamisaCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.camisa',
                'route_identifier_name' => 'camisa_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\Endereco\EnderecoEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.endereco',
                'route_identifier_name' => 'endereco_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\Endereco\EnderecoCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.endereco',
                'route_identifier_name' => 'endereco_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\Enderecousuario\EnderecousuarioEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.enderecousuario',
                'route_identifier_name' => 'enderecousuario_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\Enderecousuario\EnderecousuarioCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.enderecousuario',
                'route_identifier_name' => 'enderecousuario_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\Evento\EventoEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.evento',
                'route_identifier_name' => 'evento_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\Evento\EventoCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.evento',
                'route_identifier_name' => 'evento_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\EventoImg\EventoImgEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.evento-img',
                'route_identifier_name' => 'evento_img_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\EventoImg\EventoImgCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.evento-img',
                'route_identifier_name' => 'evento_img_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\ItemTrilha\ItemTrilhaEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.item-trilha',
                'route_identifier_name' => 'item_trilha_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\ItemTrilha\ItemTrilhaCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.item-trilha',
                'route_identifier_name' => 'item_trilha_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\Pagamento\PagamentoEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.pagamento',
                'route_identifier_name' => 'pagamento_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\Pagamento\PagamentoCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.pagamento',
                'route_identifier_name' => 'pagamento_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\Refeicao\RefeicaoEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.refeicao',
                'route_identifier_name' => 'refeicao_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\Refeicao\RefeicaoCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'offroad.rest.refeicao',
                'route_identifier_name' => 'refeicao_id',
                'is_collection' => true,
            ],
            \offroad\V1\Rest\Usuario\UsuarioEntity::class => [
                'entity_identifier_name' => 'idUsuario',
                'route_name' => 'offroad.rest.usuario',
                'route_identifier_name' => 'idUsuario',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \offroad\V1\Rest\Usuario\UsuarioCollection::class => [
                'entity_identifier_name' => 'idUsuario',
                'route_name' => 'offroad.rest.usuario',
                'route_identifier_name' => 'idUsuario',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'db-connected' => [
            'offroad\\V1\\Rest\\Camisa\\CamisaResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'camisa',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\Camisa\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\Endereco\\EnderecoResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'endereco',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\Endereco\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\Enderecousuario\\EnderecousuarioResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'enderecousuario',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\Enderecousuario\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\Evento\\EventoResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'evento',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\Evento\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\EventoImg\\EventoImgResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'evento_img',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\EventoImg\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\ItemTrilha\\ItemTrilhaResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'item_trilha',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\ItemTrilha\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\Pagamento\\PagamentoResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'pagamento',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\Pagamento\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\Refeicao\\RefeicaoResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'refeicao',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\Refeicao\\Controller',
                'entity_identifier_name' => 'id',
            ],
            'offroad\\V1\\Rest\\Usuario\\UsuarioResource' => [
                'adapter_name' => 'offroadv1',
                'table_name' => 'usuario',
                'hydrator_name' => \Zend\Hydrator\ArraySerializable::class,
                'controller_service_name' => 'offroad\\V1\\Rest\\Usuario\\Controller',
                'entity_identifier_name' => 'idUsuario',
                'table_service' => 'offroad\\V1\\Rest\\Usuario\\UsuarioResource\\Table',
            ],
        ],
    ],
    'zf-content-validation' => [
        'offroad\\V1\\Rest\\Camisa\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\Camisa\\Validator',
        ],
        'offroad\\V1\\Rest\\Endereco\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\Endereco\\Validator',
        ],
        'offroad\\V1\\Rest\\Enderecousuario\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\Enderecousuario\\Validator',
        ],
        'offroad\\V1\\Rest\\Evento\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\Evento\\Validator',
        ],
        'offroad\\V1\\Rest\\EventoImg\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\EventoImg\\Validator',
        ],
        'offroad\\V1\\Rest\\ItemTrilha\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\ItemTrilha\\Validator',
        ],
        'offroad\\V1\\Rest\\Pagamento\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\Pagamento\\Validator',
        ],
        'offroad\\V1\\Rest\\Refeicao\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\Refeicao\\Validator',
        ],
        'offroad\\V1\\Rest\\Usuario\\Controller' => [
            'input_filter' => 'offroad\\V1\\Rest\\Usuario\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'offroad\\V1\\Rest\\Camisa\\Validator' => [
            0 => [
                'name' => 'camTamP',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            1 => [
                'name' => 'camTamM',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            2 => [
                'name' => 'camTamG',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            3 => [
                'name' => 'camTamGG',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            4 => [
                'name' => 'camTamEg',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
        ],
        'offroad\\V1\\Rest\\Endereco\\Validator' => [
            0 => [
                'name' => 'eveRua',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'eveBairro',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'eveCidade',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'eveEstado',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'eveLatitude',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'eveLongitude',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'offroad\\V1\\Rest\\Enderecousuario\\Validator' => [
            0 => [
                'name' => 'useRua',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'useBairro',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'useLatitude',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'useLongitude',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
        ],
        'offroad\\V1\\Rest\\Evento\\Validator' => [
            0 => [
                'name' => 'evenNome',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'evenDataInicial',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'evenDataFinal',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'evenHoraInicial',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            4 => [
                'name' => 'evenHoraFinal',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            5 => [
                'name' => 'evenDescr',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'evenTipoTrilha',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            7 => [
                'name' => 'evenVlrInscri',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            8 => [
                'name' => 'evenVlrAlmoco',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            9 => [
                'name' => 'evenStatusDel',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            10 => [
                'name' => 'evenVlrAtualizadol',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            11 => [
                'name' => 'evenJustifica',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
        ],
        'offroad\\V1\\Rest\\EventoImg\\Validator' => [
            0 => [
                'name' => 'eveImgNome',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'eveImgTipo',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
            2 => [
                'name' => 'eveImgPrin',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
        ],
        'offroad\\V1\\Rest\\ItemTrilha\\Validator' => [
            0 => [
                'name' => 'iteAdesivo',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            1 => [
                'name' => 'iteBebida',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            2 => [
                'name' => 'iteAlmoco',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
        ],
        'offroad\\V1\\Rest\\Pagamento\\Validator' => [
            0 => [
                'name' => 'pagTipo',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'pagValor',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'pagData',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            3 => [
                'name' => 'pagStatus',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'pagQrCode',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
        ],
        'offroad\\V1\\Rest\\Refeicao\\Validator' => [
            0 => [
                'name' => 'refUser',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            1 => [
                'name' => 'refEvento',
                'required' => false,
                'filters' => [],
                'validators' => [],
            ],
            2 => [
                'name' => 'refDesc',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
        ],
        'offroad\\V1\\Rest\\Usuario\\Validator' => [
            0 => [
                'name' => 'usuNome',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            1 => [
                'name' => 'usuCpf',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
            ],
            2 => [
                'name' => 'usuNumCel',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            3 => [
                'name' => 'usuEmail',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            4 => [
                'name' => 'usuTamCamisa',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            5 => [
                'name' => 'usuSenha',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '45',
                        ],
                    ],
                ],
            ],
            6 => [
                'name' => 'usuPrivilegio',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
            7 => [
                'name' => 'usuCheckin',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => 1,
                            'max' => '255',
                        ],
                    ],
                ],
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'offroad\\V1\\Rest\\Usuario\\Controller' => [
                'collection' => [
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
