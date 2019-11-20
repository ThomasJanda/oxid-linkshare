# Install

## Description

Visualize table relations. The system detect relations which store in the database. Also it contain the relations in a file (not finish till now) to help the system, display the correct relation between the tables.
![](admin.png)

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
        
4. Enable module in the oxid admin area, Extensions => Modules

5. Create table and update views

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