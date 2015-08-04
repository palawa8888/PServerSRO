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
            'factories'  => [
                'fortressGuildViewSro' => function ( AbstractPluginManager $pluginManager ) {
                    return new View\Helper\Fortress( $pluginManager->getServiceLocator() );
                },
                'rankingJobTraderViewSro' => function ( AbstractPluginManager $pluginManager ) {
                    return new View\Helper\RankingJobTrader( $pluginManager->getServiceLocator() );
                },
                'rankingJobHunterViewSro' => function ( AbstractPluginManager $pluginManager ) {
                    return new View\Helper\RankingJobHunter( $pluginManager->getServiceLocator() );
                },
                'rankingJobThievesViewSro' => function ( AbstractPluginManager $pluginManager ) {
                    return new View\Helper\RankingJobThieves( $pluginManager->getServiceLocator() );
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
        return [];
    }

}
