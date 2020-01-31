<?php declare(strict_types=1);

use Symfony\Component\Config\FileLocator;

use Symfony\Component\DependencyInjection\ContainerBuilder;

use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Bridge\ProxyManager\LazyProxy\Instantiator\RuntimeInstantiator;

class CNContainer extends ContainerBuilder 
{  //

    public static function buildContainer($fileRootPath)
    {
        $containerBuilderInstance = new self();
        //Lazy Loading for Services
        $containerBuilderInstance->setProxyInstantiator(new RuntimeInstantiator());
        //$container->setParameter('app_root', $fileRootPath);
        $loader = new YamlFileLoader($containerBuilderInstance,new FileLocator($fileRootPath));
        $loader->load('services.yaml');
        //$containerBuilderInstance->compile();
        return $containerBuilderInstance;
    }

    public function get($id, $invalidBehavior = ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE)
    {
        
        if (strtolower($id) == 'service_container') {
            if (ContainerInterface::EXCEPTION_ON_INVALID_REFERENCE !== $invalidBehavior) 
         	{
                return;
            }
            throw new InvalidArgumentException('The service definition "service_container" does not exist.' );
        }
        
        return parent::get($id, $invalidBehavior);
    }
}