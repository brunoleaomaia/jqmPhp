<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include dirname(dirname(__FILE__)) . '/vendor/autoload.php';

/**
 * Example 5 - Adding Listviews
 * @package jqmPhp
 * @filesource
 */

use jqmPhp\Attribute;
use jqmPhp\Container as JqmContainer;
use jqmPhp\Tag\Button;
use jqmPhp\Tag\Listview;
use jqmPhp\Tag\Navbar;
use jqmPhp\Tag\Page;

$j = new JqmContainer();

/**
 * Config 'html' and 'head' tag.
 */
$j->head()->title('Example 5');

/**
 * Create and config a page object.
 */
$p = new Page('example-5');
$p->theme('b')->title('Example 5');
$p->header()->theme('a')->add(
    new Button('', array(new Attribute('data-iconpos', 'notext')), array(), 'a', 'index.php', '', 'home')
);
//Get the Button Added and Set Attributes
$p->header()->items()->get(1)->attribute('data-iconpos', 'notext')->attribute('rel', 'external');

/**
 * Create and config a new Navbar object and add items.
 */
$nav = $p->header()->add(new Navbar(), true);
$nav->add(new Button('', array(), array(), 'a', 'example-1.php', 'EX1', '', false));
$nav->add(new Button('', array(), array(), 'a', 'example-2.php', 'Ex2', '', false));
$nav->add(new Button('', array(), array(), 'a', 'example-3.php', 'EX3', '', false));
$nav->add(new Button('', array(), array(), 'a', 'example-4.php', 'EX4', '', false));
$nav->add(new Button('', array(), array(), 'a', '#', 'EX5', '', true));


/**
 * Configure page footer (Footer).
 */
$p->footer()->addButton('EX1', 'example-1.php', '', 'arrow-l');
$p->footer()->addButton('EX2', 'example-2.php', '', 'arrow-l');
$p->footer()->addButton('EX3', 'example-3.php', '', 'arrow-l');
$p->footer()->addButton('EX4', 'example-4.php', '', 'arrow-l');
$p->footer()->addButton('EX5', '#', '', 'check', true);

$p->footer()->group(true)->uiBar(true)->theme('a');

/**
 * Create and config a new listview object and add Basic Items.
 */
$p->addContent('<h1>Adding Listviews</h1>');
$p->addContent('<h3>Basic</h3>');
$list1 = new Listview();
$list1->addDivider('Basic Examples', '2')->inset(true);
$list1->addBasic('Example 1', 'example-1.php');
$list1->addBasic('Example 2', 'example-2.php');
$list1->addDivider('Advanced Examples', '3')->inset(true);
$list1->addBasic('Example 3', 'example-3.php');
$list1->addBasic('Example 4', 'example-4.php');
$list1->addBasic('Example 5', '#');
$p->addContent($list1);

echo $j->addPage($p);
exit;

/**
 * Create and config a new listview object and add Icon Items.
 */
$p->addContent('<h3>Icon</h3>');
$list2 = new Listview();
$list2->inset(true)->addDivider('Animals')->dividerTheme('a');
$list2->addIcon('Dogs', '#', 'images/dog.png', '13');
$list2->addIcon('Cats', '#', 'images/cat.png', '10');
$p->addContent($list2);

/**
 * Create and config a new listview object and add Thumbnails Items.
 */
$p->addContent('<h3>Thumbnails</h3>');
$list3 = new Listview();
$list3->inset(true);
$list3->addThumb('YouTube', 'www.youtube.com', 'http://www.youtube.com', 'images/youtube.png');
$list3->addThumb('Flickr', 'www.flickr.com', 'http://www.flickr.com', 'images/flickr.png');
$list3->addThumb('Picasa', 'picasaweb.google.com', 'http://picasaweb.google.com', 'images/picasa.png');
$list3->addThumb('Feedburner', 'www.feedburner.com', 'http://www.feedburner.com', 'images/feedburner.png');
$p->addContent($list3);

/**
 * Create and config a new listview object and add Split Items.
 */
$p->addContent('<h3>Split</h3>');
$list4 = new Listview();
$list4->inset(true)->splitIcon('gear')->splitTheme('c');
$list4->addDivider('Unread Messages', '11')->dividerTheme('c')->countTheme('b');
$list4->addSplit('Account 1', '#', '#', '09');
$list4->addSplit('Account 2', '#', '#', '02');
$list4->addSplit('Account 3', '#', '#', '00');
$p->addContent($list4);

/**
 * Create and config a new listview object and add Nested Items.
 */
$p->addContent('<h3>Nested</h3>');
$list5 = new Listview();
$list5->inset(true)->theme('a');
$list5->addDivider('Cars');
$fiat = new Listview();
$fiat->addBasic('Bravo', 'example-5.php');
$fiat->addBasic('Linea', 'example-5.php');
$fiat->addBasic('Punto', 'example-5.php');
$list5->addNested('Fiat', $fiat);
$gm = new Listview();
$gm->addBasic('Celta', 'example-5.php');
$gm->addBasic('Agile', 'example-5.php');
$gm->addBasic('Vectra', 'example-5.php');
$list5->addNested('GM', $gm);
$honda = new Listview();
$honda->addBasic('Fit', 'example-5.php');
$honda->addBasic('City', 'example-5.php');
$honda->addBasic('Civic', 'example-5.php');
$list5->addNested('Honda', $honda);
$p->addContent($list5);

/**
 * Add the page to jqmPhp object.
 */
$j->addPage($p);

/**
 * Generate the HTML code.
 */
echo $j;
