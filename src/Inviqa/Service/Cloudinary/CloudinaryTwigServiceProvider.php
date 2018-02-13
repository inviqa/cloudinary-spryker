<?php

namespace Inviqa\Service\Cloudinary;

use Cloudinary;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Spryker\Service\Kernel\AbstractPlugin;
use Twig_Environment;
use Twig_SimpleFunction;

/**
 * @method \Spryker\Service\Cloudinary\CloudinaryConfig getConfig()
 */
class CloudinaryTwigServiceProvider extends AbstractPlugin implements ServiceProviderInterface
{

    public function register(Application $app)
    {
        $app['twig'] = $app->share(
            $app->extend('twig', function (Twig_Environment $twig) {

                $twig->addFunction($this->cloudinaryUrlFunction());

                return $twig;
            })
        );
    }

    public function boot(Application $app)
    {
    }

    private function cloudinaryUrlFunction(): Twig_SimpleFunction
    {
        return new Twig_SimpleFunction('cloudinaryUrl', function (string $publicId, array $parameters = []) {
            $mergedParameters = array_merge($parameters, ['cloud_name' => $this->getConfig()->cloudName()]);
            return Cloudinary::cloudinary_url($publicId, $mergedParameters);
        });
    }

}
