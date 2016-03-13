<?php

namespace PServerSRO;


use Zend\ServiceManager\AbstractPluginManager;

class Module
{
    /**
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../config/module.config.php';
    }

    /**
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/../../src/' . __NAMESPACE__,
                ],
            ],
        ];
    }

    /**
     * @return array
     */
    public function getViewHelperConfig()
    {
        return [
            'factories' => [
                'fortressGuildViewSro' => function (AbstractPluginManager $pluginManager) {
                    $serviceLocator = $pluginManager->getServiceLocator();
                    /** @noinspection PhpParamsInspection */
                    return new View\Helper\Fortress(
                        $serviceLocator->get('pserver_cachinghelper_service'),
                        $serviceLocator->get('gamebackend_dataservice')
                    );
                },
                'rankingJobTraderViewSro' => function (AbstractPluginManager $pluginManager) {
                    $serviceLocator = $pluginManager->getServiceLocator();
                    /** @noinspection PhpParamsInspection */
                    return new View\Helper\RankingJobTrader(
                        $serviceLocator->get('pserver_cachinghelper_service'),
                        $serviceLocator->get('pserversro_ranking_job_service')
                    );
                },
                'rankingJobHunterViewSro' => function (AbstractPluginManager $pluginManager) {
                    $serviceLocator = $pluginManager->getServiceLocator();
                    /** @noinspection PhpParamsInspection */
                    return new View\Helper\RankingJobHunter(
                        $serviceLocator->get('pserver_cachinghelper_service'),
                        $serviceLocator->get('pserversro_ranking_job_service')
                    );
                },
                'rankingJobThievesViewSro' => function (AbstractPluginManager $pluginManager) {
                    $serviceLocator = $pluginManager->getServiceLocator();
                    /** @noinspection PhpParamsInspection */
                    return new View\Helper\RankingJobThieves(
                        $serviceLocator->get('pserver_cachinghelper_service'),
                        $serviceLocator->get('pserversro_ranking_job_service')
                    );
                },
            ]
        ];
    }

    /**
     * Expected to return \Zend\ServiceManager\Config object or array to
     * seed such an object.
     *
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return [
            'aliases' => [
                'pserversro_unstuck_options' => Options\UnStuckPositionOptions::class,
            ],
            'factories' => [
                Options\UnStuckPositionOptions::class => function ($sm) {
                    /** @var $sm \Zend\ServiceManager\ServiceLocatorInterface */
                    $config = $sm->get('Configuration');
                    return new Options\UnStuckPositionOptions($config['p-server-sro']['un_stuck_position']);
                },
            ],
        ];
    }

}
