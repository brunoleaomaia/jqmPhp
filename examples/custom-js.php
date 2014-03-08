<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
include dirname(dirname(__FILE__)) . '/vendor/autoload.php';
use jqmPhp\Container as JqmContainer;
use jqmPhp\Tag\Input;
use jqmPhp\Tag\Listview;
use jqmPhp\Tag\Page;
use jqmPhp\Tag\Script;
use jqmPhp\Tag;


/**
 * Create a new Php object.
 */
$jqmPhp = new JqmContainer();

/**
 * Adding custom JavaScript to head in jqmPhp
 */
$jqmPhp->head()->title('Custom JS Example');
$jqmPhp->head()->add(new Script('custom.js'));


/**
 * Create a new page object.
 */
$p = new Page('custom-js');
$p->theme('b');
$p->title('Custom JS Example');
$p->header()->theme('a');
$bt = $p->header()->addButton('', 'index.php', 'a', 'home', false, false, true);
$bt->rel('external')->attribute('data-iconpos', 'notext');

/**
 * Adding Content.
 */
$p->addContent('<h1>Adding Custom JavaScript</h1>');
$p->addContent(
    '<p align="justify">To add a custom JS you need add the tag <b>' . htmlspecialchars('<script...></script>') . '</b>'
);
$p->addContent(' to the head object [<b>' . htmlspecialchars('$jqmPhp->head()') . '</b>] in the jqmPhp instance. ');
$p->addContent('To facilitate the addition of JS you can use the class <b>script</b> as example:</p>');
$p->addContent(
    '<pre class="ui-body-c" style="padding:20px;">$jqmPhp = new Php();' . "\n" . '$jqmPhp->head()->add(' . "\n\t" . 'new script(\'custom.js\')' . "\n" . ');</pre>'
);
$p->addContent(new Tag('p', 'p_js', array('class="ui-body-c" style="padding:20px;"'), array('&nbsp;')));


/**
 * Adding Source Code Links.
 */
$list = new Listview();
$list->inset(true)->dividerTheme('a');
$list->addDivider('Source Code');
$li = $list->addBasic('custom.js', 'custom.js', '', true);
$li->rel('external')->target('_blank');
$li = $list->addBasic('custom-js.php', 'custom-js.php.txt', '', true);
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