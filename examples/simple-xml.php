<?php
/**
 * Simple XML Load File to Listview
 * @package jqmPhp
 * @filesource
 */

/**
 * Include the jqmPhp class.
 */
include '../lib/jqmPhp.php';

/**
 * Create a new Php object.
 */
$jqmPhp = new Php();

/**
 * Create a new page object.
 */
$p = new Page('simple-xml');
$p->theme('b');
$p->title('Cars');
$bt = $p->header()->addButton('', 'index.php', 'b', 'home', false, false, true);
$bt->rel('external')->attribute('data-iconpos', 'notext');

/**
 * Adding Listview to page.
 */
$lv = $p->addContent(new Listviem(), true);
$lv->filter(true);

/**
 * Reading XML;
 */
$xml = @simplexml_load_file('cars.xml') or die ("error loading xml file.");
foreach ($xml->brandGroup as $brandGroup) {
    /**
     * Adding Dividers.
     */
    $lv->addDivider($brandGroup->name);
    foreach ($brandGroup->brand as $brand) {
        /**
         * Creating a new Listview. This will be added as a nested item.
         */
        $lv_cars = new Listview();
        foreach ($brand->car as $car) {
            $lv_cars->addBasic($car, '#');
        }
        /**
         * Adding Nested Item (Other Listview);
         */
        $lv->addNested($brand->name, $lv_cars);
    }
}

/**
 * Adding Source Code Links.
 */
$list = new Listview();
$li = $list->addBasic('cars.xml', 'cars.xml', '', true);
$li->rel('external')->target('_blank');
$li = $list->addBasic('simple-xml.php', 'simple-xml.php.txt', '', true);
$li->rel('external')->target('_blank');
$lv->addDivider('S');
$lv->addNested('Source Code', $list);

/**
 * Add the page to jqmPhp object.
 */
$jqmPhp->addPage($p);

/**
 * Generate the HTML code.
 */
echo $jqmPhp;
?>