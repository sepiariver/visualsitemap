<?php
/* 
 * visualSitemap
 * @package visualSitemap
 * @author YJ Tso @sepiariver
 *
 * GPL2+, no warranties, etc.
 *
 */

$properties = $scriptProperties; 

// OPTIONS
$maxColumns = $modx->getOption('maxColumns', $properties, 10);
$regCss = $modx->getOption('regCss', $properties, true);
$cssFile = $modx->getOption('cssFile', $properties, MODX_ASSETS_URL . 'components/visualsitemap/SlickmapCSS/slickmap.css');
$menu = $modx->getOption('menu', $properties, 'Main');
$menu = (strtolower($menu) === 'util' || strtolower($menu) === 'utility') ? 'Util' : 'Main';
// DEFAULTS
$properties['startId'] = (empty($properties['startId'])) ? 0 : $properties['startId'];
$properties['outerTpl'] = (empty($properties['outerTpl'])) ? 'visualSitemap.outer' . $menu . '.tpl' : $properties['outerTpl'];
$properties['innerTpl'] = (empty($properties['innerTpl'])) ? 'visualSitemap.innerMain.tpl' : $properties['innerTpl'];
$properties['excludeDocs'] = (empty($properties['excludeDocs'])) ? $modx->getOption('site_start') : $properties['excludeDocs'];
$properties['level'] = ($menu === 'Util') ? 1 : 0;
// Set Column Class
$c = $modx->newQuery('modResource');
$c->where(array(
    'parent' => 0,
    'deleted' => false,
    'published' => true,
    'hidemenu' => false,
    'id:!=' => $modx->getOption('site_start'),
));
$count = $modx->getCount('modResource', $c);
$columns = $maxColumns;
if ($count < $maxColumns) $columns = $count;
$properties['outerClass'] = 'col' . $columns;

// Register CSS
if ($regCss) {
    $modx->regClientStartupHTMLBlock('<link rel="stylesheet" type="text/css" media="screen, print" href="' . $cssFile . '" />');
}

// Run Wayfinder
if ($modx->getCount('modSnippet', array('name' => 'Wayfinder'))) {
    
    return $modx->runSnippet('Wayfinder', $properties);
    
} else {
    return 'visualSitemap requires the Wayfinder snippet to be installed.';
}