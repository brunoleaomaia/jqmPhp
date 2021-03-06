<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use jqmPhp\Container as JqmContainer;
use jqmPhp\Tag\Button;
use jqmPhp\Tag\Collapsible;
use jqmPhp\Tag\Controlgroup;
use jqmPhp\Tag\Grid;
use jqmPhp\Tag\Link;
use jqmPhp\Tag\Page;
use jqmPhp\Tag\Script;

/**
 * Example 3 - Adding Objects
 * @package jqmPhp
 * @filesource
 */


/**
 * Create a new JqmContainer object.
 */
$j = new JqmContainer();

/**
 * Config 'html' and 'head' tag.
 */
$j->html()->doctype('html');
$j->head()->title('Example 3');
$j->head()->css('http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.css');
$j->head()->jq('http://code.jquery.com/jquery-1.4.4.min.js');
$j->head()->jqm('http://code.jquery.com/mobile/1.0a2/jquery.mobile-1.0a2.min.js');
$j->head()->add(new Link('css/custom.css')); // Adding a custom CSS.
$j->head()->add(new Script('js/custom.js')); // Adding a custom JavaScript.
//$j->body()->attribute('onload', 'initCustom();');     // Adding a custom attribute to 'body' tag.

/**
 * Create and config a page object.
 * Most methods return the object itself allowing call
 * another method on the object in sequence.
 */
$p = new Page('example-3');
$p->theme('b')
    ->title('Example 3')
    ->header()->addButton('Example 2', 'example-2.php', 'a', 'arrow-l')
    ->addButton('Example 4', 'example-4.php', 'b', 'arrow-r')
    ->theme('a');
/**
 * addContent() is alias to content()->add().
 */
$p->content()->add('<h1>Adding Objects</h1>');
$p->addContent('<h3>Controlgroup and Buttons</h3>');
/**
 * Create and config a new controlgroup object and add items.
 * Most methods of addition have the last parameter $returnAdded.
 * If it is set to 'true' the added object is returned, otherwise
 * the object that called the method is returned.
 */
$cg = $p->content()->add(new Controlgroup(), true);
$cg->dataType('vertical');
$cg->add(new Button('', array(), array(), 'a', 'index.php', 'Home', 'home', false));
$cg->add(new Button('', array(), array(), 'b', 'example-1.php', 'Example 1', 'arrow-l', false));
$cg->add(new Button('', array(), array(), 'b', 'example-2.php', 'Example 2', 'arrow-l', false));
$cg->add(new Button('', array(), array(), 'b', '#', 'Example 3', 'check', true));
$cg->add(new Button('', array(), array(), 'b', 'example-4.php', 'Example 4', 'arrow-r', false));
$cg->add(new Button('', array(), array(), 'b', 'example-5.php', 'Example 5', 'arrow-r', false));

/**
 * Create and config a new collapsible object and add items.
 */
$p->addContent('<h3>Collapsible</h3>');
$cp = $p->addContent(new Collapsible(), true);
$cp->title('Collapsible')->collapsed(true)->add('<p>Collapsed Text.</p>')->theme('a');

/**
 * Create and config a new grid object and add items.
 */
$p->addContent('<h3>Grid</h3>');
$g = $p->addContent(new Grid(), true);
$g->grid('b'); //Sets the grid type (class="ui-grid-b").
$g->blockA()->add('Column A (ui-block-a)')->add(
    new Button('', array(), array(), 'd', 'example-1.php', 'EX1', 'arrow-l')
);
$g->blockB()->add('Column B (ui-block-b)')->add(
    new Button('', array(), array(), 'd', 'example-2.php', 'EX2', 'arrow-l')
);
$g->blockC()->add('Column C (ui-block-c)')->add(
    new Button('', array(), array(), 'd', 'example-4.php', 'EX4', 'arrow-r')
);

/**
 * Create and config a new button object with inline property.
 */
$p->addContent('<h3>Inline</h3>');
$p->addContent(new Button('', array(), array(), 'a', 'example-1.php', 'EX1', 'arrow-l', false, true));
$p->addContent(new Button('', array(), array(), 'a', 'example-2.php', 'EX2', 'arrow-l', false, true));
$p->addContent(new Button('', array(), array(), 'a', '#', 'EX3', 'check', true, true));
$p->addContent(new Button('', array(), array(), 'a', 'example-4.php', 'EX4', 'arrow-r', false, true));
$p->addContent(new Button('', array(), array(), 'a', 'example-5.php', 'EX5', 'arrow-r', false, true));

/**
 * Add the page to jqmPhp object.
 */
$j->addPage($p);

/**
 * Generate the HTML code.
 */
echo $j;
