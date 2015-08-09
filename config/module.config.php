<?php

return [
    'router' => [
        'routes' => [
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
            'PServerSRO\Controller\RankingJob' => 'PServerSRO\Controller\RankingJobController',
        ],
    ],
    'service_manager' => [
        'invokables' => [
            'pserversro_ranking_job_service' => 'PServerSRO\Service\RankingJob',
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
    ]
];