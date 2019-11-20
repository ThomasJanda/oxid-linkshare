# Install

## Description

Customize the title, image and description which use to show a nice link in WhatsApp, Skype and other messages and websites.

Module was created for Oxid 6.x

## Install
1. Copy files into following directory
        
        source/modules/rs/linkshare
        
2. Add to composer.json at shop root
  
        "autoload": {
            "psr-4": {
                "rs\\linkshare\\": "./source/modules/rs/linkshare"
            }
        },

3. Refresh autoloader files with composer.

        composer dump-autoload

4. Create table and update views

        CREATE TABLE `rs_linkshare` (
         `oxid` char(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
         `rstype` enum('article','category','content') NOT NULL DEFAULT 'article',
         `rstitle` varchar(250) DEFAULT NULL,
         `rstitle_1` varchar(250) DEFAULT NULL,
         `rstitle_2` varchar(250) DEFAULT NULL,
         `rsdescription` varchar(250) DEFAULT NULL,
         `rsdescription_1` varchar(250) DEFAULT NULL,
         `rsdescription_2` varchar(250) DEFAULT NULL,
         `rsimage` varchar(250) DEFAULT NULL,
         `rsimage_1` varchar(250) DEFAULT NULL,
         `rsimage_2` varchar(250) DEFAULT NULL,
         PRIMARY KEY (`oxid`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

5. Enable module in the oxid admin area, Extensions => Modules

6. Fill out the settings in the module and upload images, title and description in the article, categories and cms pages.