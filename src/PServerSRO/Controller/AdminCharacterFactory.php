<?php

namespace PServerSRO\Controller;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\View\Renderer\PhpRenderer;
use ZfcDatagrid\Datagrid;

class AdminCharacterFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     * @return AdminCharacterController
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        /** @var \ZfcDatagrid\Datagrid $dataGridService */
        $dataGridService = $container->get(Datagrid::class);

        /** @var \PServerSRO\Service\AdminCharacter $adminCharacterService */
        $adminCharacterService = $container->get('pserversro_admin_character_service');

        /** @var PhpRenderer $viewRenderer */
        $viewRenderer = $container->get(PhpRenderer::class);

        return new AdminCharacterController($dataGridService, $adminCharacterService, $viewRenderer);
    }

}