<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
include dirname(dirname(__FILE__)) . '/vendor/autoload.php';

use jqmPhp\Attribute;
use jqmPhp\Container as JqmContainer;
use jqmPhp\Tag\Button;
use jqmPhp\Tag\Checkboxgroup;
use jqmPhp\Tag\Form;
use jqmPhp\Tag\Input;
use jqmPhp\Tag\Input\Range;
use jqmPhp\Tag\Navbar;
use jqmPhp\Tag\Option;
use jqmPhp\Tag\Page;
use jqmPhp\Tag\Radiogroup;
use jqmPhp\Tag\Select;
use jqmPhp\Tag\Slider;
use jqmPhp\Tag\Textarea;


/**
 * Create a new Php object.
 */
$j = new JqmContainer();

/**
 * Config 'html' and 'head' tag.
 */
$j->head()->title('Example 4');

/**
 * Create and config a page object.
 */
$p = new Page('example-4');
$p->theme('b')->title('Example 4');
$p->header()->theme('a')->add(
    new Button('', array(new Attribute('data-iconpos', 'notext')), array(), 'a', 'index.php', '', 'home')
);

/**
 * Create and config a new navbar object and add items.
 */
$nav = $p->header()->add(new Navbar(), true);
$nav->add(new Button('', array(), array(), 'a', 'example-1.php', 'EX1', '', false));
$nav->add(new Button('', array(), array(), 'a', 'example-2.php', 'Ex2', '', false));
$nav->add(new Button('', array(), array(), 'a', 'example-3.php', 'EX3', '', false));
$nav->add(new Button('', array(), array(), 'a', '#', 'EX4', '', true));
$nav->add(new Button('', array(), array(), 'a', 'example-5.php', 'EX5', '', false));

/**
 * Confif page footer (Footer).
 */
$p->footer()->addButton('EX1', 'example-1.php', '', 'arrow-l');
$p->footer()->addButton('EX2', 'example-2.php', '', 'arrow-l');
$p->footer()->addButton('EX3', 'example-3.php', '', 'arrow-l');
$p->footer()->addButton('EX4', '#', '', 'check', true);
$p->footer()->addButton('EX5', 'example-5.php', '', 'arrow-r');
$p->footer()->group(true)->uiBar(true)->theme('a');

/**
 * Create and config a new form object and add items.
 */
$p->content()->add('<h1>Adding Form Elements</h1>');
$form = $p->addContent(new Form(), true);
$form->action('example-4.php?rand=' . rand(0, 9999))->method('POST');

/**
 * Add some input objects.
 */
$form->add('<h3>Text Inputs</h3>');
$form->add(new Input('uid', 'uid', 'text', '', 'Username:', '', true));
$form->add(new Input('pwd', 'pwd', 'password', '', 'Password:', '', true));
$form->add(new Input('find', 'find', 'search', '', 'Search:', '', true));

/**
 * Add a textarea object.
 */
$form->add('<h3>Textarea</h3>');
$form->add(new Textarea('msg', 'msg', '', '80', '4', 'Comments:', '', true));

/**
 * Add a jqmRange object.
 */
$form->add('<h3>Range Input Type</h3>');
$form->add(new Range('age', 'age', '18', '18', '80', 'Age:', '', true));

/**
 * Add a select object with some option objects.
 */
$form->add('<h3>Select</h3>');
$sel = $form->add(new Select('country', 'country', 'Language:'), true);
$sel->add(new Option('English', 'en', true));
$sel->add(new Option('Spanish', 'es', false));
$sel->add(new Option('Portuguese', 'pt', false));
$sel->add(new Option('Other', '', false));
$sel->fieldContain(true);

/**
 * Add and config a select object with some option objects.
 */
$form->add('<h3>Select Inline</h3>');
$sex = $form->add(new Select('sex', 'sex', 'Sex:', array(), array(), true), true);
$sex->addOption('Male', 'male', true);
$sex->addOption('Female', 'female', false);
$sex->inline(true)->icon('grid')->theme('a');

/**
 * Add a slider object.
 */
$form->add('<h3>Select Slider</h3>');
$form->add(new Slider('yesno', 'yesno', 'Accept:', true, 'Yes', '1', 'No', '0', '', true));

/**
 * Add and config a radiogroup object.
 */
$form->add('<h3>Radio Group</h3>');
$rg = $form->add(new Radiogroup('plan', 'plan', 'Select your plan:'), true);
$rg->addRadio('Silver', '0');
$rg->addRadio('Gold', '1');
$rg->addRadio('Diamond', '3', '', true);
$rg->fieldContain(true);

/**
 * Add and config a jqmCheckgroup object.
 */
$form->add('<h3>Checkbox Group</h3>');
$cg = $form->add(new Checkboxgroup(), true);
$cg->legend('Favorite Search Engine:');
$cg->addCheckbox('se1', 'se1', 'Bing');
$cg->addCheckbox('se2', 'se2', 'Google');
$cg->addCheckbox('se3', 'se3', 'Yahoo')->fieldContain(true);

/**
 * Add a new input object (submit button).
 */
//$form->add(new input('', '', 'submit', 'Send Now', '', 'b'));

/**
 * Add and config a button object with data-rel="dialog".
 */
$send = $form->add(new Button(), true);
$send->text('Send Now')->href('example-1.php?rand=' . rand(0, 9999))->attribute('data-rel', 'dialog');

/**
 * Add the page to jqmPhp object.
 */
$j->addPage($p);

/**
 * Generate the HTML code.
 */
echo $j;
?>