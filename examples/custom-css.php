<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
include dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use jqmPhp\Container as JqmContainer;
use jqmPhp\Tag\Input;
use jqmPhp\Tag\Link;
use jqmPhp\Tag\Listview;
use jqmPhp\Tag\Page;


/**
 * Adding custom CSS
 * @package jqmPhp
 * @filesource
 */


/**
 * Create a new Php object.
 */
$jqmPhp = new JqmContainer();

/**
 * Adding custom CSS to head in jqmPhp
 */
$jqmPhp->head()->title('Custom CSS Example');
$jqmPhp->head()->add(new Link('custom.css'));


/**
 * Create a new page object.
 */
$p = new Page('custom-css');
$p->theme('b');
$p->title('Custom CSS Example');
$p->header()->theme('a');
$bt = $p->header()->addButton('', 'index.php', 'a', 'home', false, false, true);
$bt->rel('external')->attribute('data-iconpos', 'notext');

/**
 * Adding Content.
 */
$p->addContent('<h1>Adding Custom CSS</h1>');
$p->addContent(
    '<p align="justify">To add a custom CSS you need add the tag <b>' . htmlspecialchars('<link...></link>') . '</b>'
);
$p->addContent(' to the head object [<b>' . htmlspecialchars('$jqmPhp->head()') . '</b>] in the jqmPhp instance. ');
$p->addContent('To facilitate the addition of CSS you can use the class <b>link</b> as example:</p>');
$p->addContent(
    '<pre class="ui-body-c">$jqmPhp = new Php();' . "\n" . '$jqmPhp->head()->add(' . "\n\t" . 'new link(\'custom.css\')' . "\n" . ');</pre>'
);


/**
 * Adding Source Code Links.
 */
$list = new Listview();
$list->inset(true)->dividerTheme('a');
$list->addDivider('Source Code');
$li = $list->addBasic('custom.css', 'custom.css', '', true);
$li->rel('external')->target('_blank');
$li = $list->addBasic('custom-css.php', 'custom-css.php.txt', '', true);
$li->rel('external')->target('_blank');
$p->addContent($list);

/**
 * Add the page to jqmPhp object.
 */
$jqmPhp->addPage($p);

/**
 * Generate the HTML code.
 */
echo $jqmPhp;