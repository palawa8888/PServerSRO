<?php

use PServerSRO\Service;

return [
    'router' => [
        'routes' => [
            'PServerSRO'  => [
                'type'    => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/sro-tools/',
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'un_stuck' => [
                        'type' => 'segment',
                        'options' => [
                            'route'    => 'un-stuck.html',
                            'defaults' => [
                                'controller'	=> 'PServerSRO\Controller\UnStuck',
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_character' => [
                        'type' => 'segment',
                        'options' => [
                            'route'    => 'admin/character.html',
                            'defaults' => [
                                'controller'	=> 'PServerSRO\Controller\AdminCharacter',
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_smc_log' => [
                        'type' => 'segment',
                        'options' => [
                            'route'    => 'admin/smc-log.html',
                            'defaults' => [
                                'controller'	=> 'PServerSRO\Controller\AdminSMCLog',
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                ],
            ],
            'PServerRanking'  => [
                'may_terminate' => true,
                'child_routes'  => [
                    'sro_ranking_job' => [
                        'type' => 'segment',
                        'options' => [
                            'route'    => 'job/:action[-:page].html',
                            'constraints' => [
                                'action'     => '[a-zA-Z-]+',
                                'page'       => '[0-9]+'
                            ],
                            'defaults' => [
                                'controller'	=> 'PServerSRO\Controller\RankingJob',
                                'page'		    => '1',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'invokables' => [
            'PServerSRO\Controller\AdminCharacter' => 'PServerSRO\Controller\AdminCharacterController',
            'PServerSRO\Controller\AdminSMCLog' => 'PServerSRO\Controller\AdminSMCLogController',
            'PServerSRO\Controller\RankingJob' => 'PServerSRO\Controller\RankingJobController',
            'PServerSRO\Controller\UnStuck' => 'PServerSRO\Controller\UnStuckController',
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'pserversro_unstuck_service' => Service\UnStuck::class,
            'pserversro_ranking_job_service' => Service\RankingJob::class,
            'pserversro_admin_smc_log_service' => Service\AdminSMCLog::class,
            'pserversro_admin_character_service' => Service\AdminCharacter::class,
        ],
        'factories' => [
            Service\RankingJob::class => function($sm) {
                /** @var $sm \Zend\ServiceManager\ServiceLocatorInterface */
                /** @noinspection PhpParamsInspection */
                return new Service\RankingJob($sm->get('gamebackend_dataservice'));
            },
            Service\UnStuck::class => function($sm) {
                /** @var $sm \Zend\ServiceManager\ServiceLocatorInterface */
                /** @noinspection PhpParamsInspection */
                return new Service\UnStuck(
                    $sm->get('gamebackend_dataservice'),
                    $sm->get('pserversro_unstuck_options'),
                    $sm->get('pserverpanel_character_service'),
                    $sm->get('doctrine.entitymanager.orm_sro_shard')
                );
            },
            Service\AdminSMCLog::class => function($sm) {
                /** @var $sm \Zend\ServiceManager\ServiceLocatorInterface */
                /** @noinspection PhpParamsInspection */
                return new Service\AdminSMCLog(
                    $sm->get('doctrine.entitymanager.orm_sro_account'),
                    $sm->get('gamebackend_sro_options')
                );
            },
            Service\AdminCharacter::class => function($sm) {
                /** @var $sm \Zend\ServiceManager\ServiceLocatorInterface */
                /** @noinspection PhpParamsInspection */
                return new Service\AdminCharacter(
                    $sm->get('doctrine.entitymanager.orm_sro_shard'),
                    $sm->get('gamebackend_sro_options')
                );
            },
        ],
    ],
    'view_manager' => [
        'template_map' => [
            'p-server-sro/fortress' => __DIR__ . '/../view/helper/fortress.phtml',
            'p-server-sro/ranking-job-hunter' => __DIR__ . '/../view/helper/ranking-job-hunter.phtml',
            'p-server-sro/ranking-job-thieves' => __DIR__ . '/../view/helper/ranking-job-thieves.phtml',
            'p-server-sro/ranking-job-trader' => __DIR__ . '/../view/helper/ranking-job-trader.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
    'pserver' => [
        'navigation' => [
            'ranking' => [
                'children' => [
                    'top_trader' => [
                        'name'  => 'TopTrader',
                        'route' => [
                            'name' => 'PServerRanking/sro_ranking_job',
                            'params' => [
                                'action' => 'top-trader',
                            ],
                        ],
                    ],
                    'top_hunter' => [
                        'name'  => 'TopHunter',
                        'route' => [
                            'name' => 'PServerRanking/sro_ranking_job',
                            'params' => [
                                'action' => 'top-hunter',
                            ],
                        ],
                    ],
                    'top_thieves' => [
                        'name'  => 'TopThieves',
                        'route' => [
                            'name' => 'PServerRanking/sro_ranking_job',
                            'params' => [
                                'action' => 'top-thieves',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'p-server-sro' => [
        'un_stuck_position' => [
            /** HT position */
            'latest_region' => 23687,
            'world_id' => 1,
            'pos_x' => '1117.602',
            'pos_y' => '244.2866',
            'pos_z' => '136.339',
            'tel_region' => 0,
            'tel_pos_x' => 0,
            'tel_pos_y' => 0,
            'tel_pos_z' => 0,
            'died_region' => 0,
            'died_pos_x' => 0,
            'died_pos_y' => 0,
            'died_pos_z' => 0,
            'tel_world_id' => 1,
            'died_world_id' => 1
        ],
    ],
	'p-server-panel' => [
        'character_panel_navigation' => [
            'unstuck' => [
                'name' => 'UnStuck',
                'route' => [
                    'name' => 'PServerSRO/un_stuck',
                ],
            ],
        ],
    ],
    'p-server-admin' => [
        'navigation' => [
            'admin_user' => [
                'name' => 'UserPanel',
                'route' => [
                    'name' => 'PServerAdmin/user',
                ],
                'children' => [
                    'list' => [
                        'name' => 'UserList',
                        'route' => [
                            'name' => 'PServerAdmin/user',
                        ],
                    ],
                    'character' => [
                        'name' => 'CharacterList',
                        'route' => [
                            'name' => 'PServerSRO/admin_character',
                        ],
                    ],
                ],
            ],
            'admin_log' => [
                'children' => [
                    'PServerSRO\AdminSMCLog' => [
                        'name'  => 'Game',
                        'route' => [
                            'name'   => 'PServerSRO/admin_smc_log',
                        ],
                    ],
                ],
            ],
        ],
    ],
];