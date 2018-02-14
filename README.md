# Spryker Cloudinary module

A module to speed integration of the Cloudinary service:

- Provides a twig function to convert a Cloudinary public_id + parameter object into the Cloudinary 
url for the resource.

## Installation

### Add the Inviqa repo to your Spryker composer.json

```$xslt
  "repositories": [
    {
      "type": "git",
      "url": "https://github.com/inviqa/cloudinary-spryker"
    }
  ]
```

### Install module

```
composer require inviqa/cloudinary-spryker

```

## Setup

### Add the service to src/Pyz/Yves/Application/YvesBootstrap.php

```$xslt
    protected function registerServiceProviders()
    {
        // Existing service providers...
        $this->application->register(new CloudinaryTwigServiceProvider());
    }
```

### Setup the Inviqa bundle namespace 

config/Shared/config_default.php
```$xslt
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'Pyz', 'Inviqa'
];
```

### Enter your Cloudinary cloud name in Spryker config

```$xslt
$config[CloudinaryConstants::CLOUD_NAME] = 'mycloudname';
```


## Usage

Some Yves twig file:

```
<img src="{{ cloudinaryUrl('my/example/public_id', {width: 100, height: 100}) }}"/>

```
