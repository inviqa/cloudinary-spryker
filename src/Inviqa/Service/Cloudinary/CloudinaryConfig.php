<?php

namespace Inviqa\Service\Cloudinary;

use Inviqa\Shared\Cloudinary\CloudinaryConstants;
use Spryker\Service\Kernel\AbstractBundleConfig;

class CloudinaryConfig extends AbstractBundleConfig
{

    public function cloudName(): string
    {
        return $this->get(CloudinaryConstants::CLOUD_NAME);
    }

}
