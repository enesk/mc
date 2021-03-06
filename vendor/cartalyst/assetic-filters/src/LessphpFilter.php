<?php

/**
 * Part of the Assetic Filters package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Assetic Filters
 * @version    1.0.2
 * @author     Cartalyst LLC
 * @license    BSD License (3-clause)
 * @copyright  (c) 2011-2015, Cartalyst LLC
 * @link       http://cartalyst.com
 */

namespace Cartalyst\AsseticFilters;

use Assetic\Asset\AssetInterface;
use Assetic\Filter\LessphpFilter as AsseticLessphpFilter;

class LessphpFilter extends AsseticLessphpFilter
{
    /**
     * Filters an asset after it has been loaded.
     *
     * @param  \Assetic\Asset\AssetInterface  $asset
     * @return void
     */
    public function filterLoad(AssetInterface $asset)
    {
        $max_nesting_level = ini_get('xdebug.max_nesting_level');

        $memory_limit = ini_get('memory_limit');

        if ($max_nesting_level && $max_nesting_level < 200) {
            ini_set('xdebug.max_nesting_level', 200);
        }

        if ($memory_limit && $memory_limit < 256) {
            ini_set('memory_limit', '256M');
        }

        $root = $asset->getSourceRoot();
        $path = $asset->getSourcePath();

        $dirs = array();

        $lc = new \Less_Parser(array(
            'compress'     => true,
        ));

        if ($root && $path) {
            $dirs[] = dirname($root.'/'.$path);
        }

        foreach ($this->loadPaths as $loadPath) {
            $dirs[] = $loadPath;
        }

        $lc->SetImportDirs($dirs);

        $url = parse_url(url());

        $absolutePath = str_replace(public_path(), '', $root);

        if (isset($url['path'])) {
            $absolutePath = $url['path'] . $absolutePath;
        }

        $lc->parseFile($root.'/'.$path, $absolutePath);

        $asset->setContent($lc->getCss());
    }
}
