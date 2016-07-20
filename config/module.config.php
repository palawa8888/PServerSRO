<?php

use PServerSRO\Controller;
use PServerSRO\Options;
use PServerSRO\View\Helper;
use PServerSRO\Service;

return [
    'router' => [
        'routes' => [
            'PServerSRO'  => [
                'type'    => 'Literal',
                'options' => [
                    'route'    => '/sro-tools/',
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'un_stuck' => [
                        'type' => 'Segment',
                        'options' => [
                            'route'    => 'un-stuck.html',
                            'defaults' => [
                                'controller'	=> 'PServerSRO\Controller\UnStuck',
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_character' => [
                        'type' => 'Segment',
                        'options' => [
                            'route'    => 'admin/character.html',
                            'defaults' => [
                                'controller'	=> 'PServerSRO\Controller\AdminCharacter',
                                'action'		=> 'index'
                            ],
                        ],
                    ],
                    'admin_smc_log' => [
                        'type' => 'Segment',
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
                        'type' => 'Segment',
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
        'aliases' => [
            'PServerSRO\Controller\AdminCharacter' => Controller\AdminCharacterController::class,
            'PServerSRO\Controller\AdminSMCLog' => Controller\AdminSMCLogController::class,
            'PServerSRO\Controller\RankingJob' => Controller\RankingJobController::class,
            'PServerSRO\Controller\UnStuck' => Controller\UnStuckController::class,
        ],
        'factories' => [
            Controller\AdminCharacterController::class => Controller\AdminCharacterFactory::class,
            Controller\AdminSMCLogController::class => Controller\AdminSMCLogFactory::class,
            Controller\RankingJobController::class => Controller\RankingJobFactory::class,
            Controller\UnStuckController::class => Controller\UnStuckFactory::class,
        ],
    ],
    'service_manager' => [
        'aliases' => [
            'pserversro_unstuck_service' => Service\UnStuck::class,
            'pserversro_ranking_job_service' => Service\RankingJob::class,
            'pserversro_admin_smc_log_service' => Service\AdminSMCLog::class,
            'pserversro_admin_character_service' => Service\AdminCharacter::class,
            'pserversro_unstuck_options' => Options\UnStuckPositionOptions::class,
        ],
        'factories' => [
            Service\RankingJob::class => Service\RankingJobFactory::class,
            Service\UnStuck::class => Service\UnStuckFactory::class,
            Service\AdminSMCLog::class => Service\AdminSMCLogFactory::class,
            Service\AdminCharacter::class => Service\AdminCharacterFactory::class,
            Options\UnStuckPositionOptions::class => Options\UnStuckPositionFactory::class,
        ],
    ],
    'view_helpers' => [
        'aliases' => [
            'fortressGuildViewSro' => Helper\Fortress::class,
            'rankingJobTraderViewSro' => Helper\RankingJobTrader::class,
            'rankingJobHunterViewSro' => Helper\RankingJobHunter::class,
            'rankingJobThievesViewSro' => Helper\RankingJobThieves::class,
        ],
        'factories' => [
            Helper\Fortress::class => Helper\FortressFactory::class,
            Helper\RankingJobTrader::class => Helper\RankingJobTraderFactory::class,
            Helper\RankingJobHunter::class => Helper\RankingJobHunterFactory::class,
            Helper\RankingJobThieves::class => Helper\RankingJobThievesFactory::class,
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