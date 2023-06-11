# Magento 2 Module - ServerInfo by Falkone

- [Main Functionalities](#markdown-header-main-functionalities)
- [Installation](#markdown-header-installation)
- [Configuration](#markdown-header-configuration)
- [Usage](#markdown-header-usage)

## Main Functionalities

This Module shows the current PHP settings (like `phpinfo()`) in the Magento Backend as UI Grid in Magento Style.

Important: It shows the PHP Settings from the Backend - if the Frontend uses a different Server oder configuration it may vary.

## Installation

To install the Magento 2 ServerInfo extension please add our repository to your Magento _composer.json_.

    {
        "repositories": [
            {
                "url": "https://github.com/falkone/ServerInfo",
                "type": "vcs"
            }
        ]
    }

After you added our repository you need to require our module by running the command: 

```
composer require falkone/module-serverinfo
```

### Enable module in Magento

To enable our module via Magento 2 CLI go to your Magento root and run:

    bin/magento module:enable --clear-static-content Falkone_ServerInfo

The Magento 2 ServerInfo module should now be installed and ready to use.

Depending on your Magento 2 installation setup, you may want to run following additional commands:

```
bin/magento setup:di:compile
bin/magento setup:static-content:deploy
```

## Configuration

This module requires and provides no configuration. 


## Usage

Login in the Magento Backend and goto `System` > `PHP Info`  

![preview.png](%20_images%2Fpreview.png)

## Issues

Please use GitHub build-in Issue tracker at: https://github.com/falkone/ServerInfo/issues

