<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * Copyright (c) 2016-2017 Richard Henkenjohann
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 * @copyright 2016-2017 Richard Henkenjohann
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */


/**
 * Register the templates
 */
TemplateLoader::addFiles(
    [
        'mod_box_office' => 'system/modules/onlinetickets/templates/module',
        'j_boxoffice' => 'system/modules/onlinetickets/templates/jquery',
    ]
);
