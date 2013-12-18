<?php
    /**
     * Example 4 - Adding Form Elements
     * @package jqmPhp
     * @filesource
     */

    /**
     * Include the jqmPhp class.
     */
    include '../lib/jqmPhp.php';

    /**
     * Create a new jqmPhp object.
     */
    $j = new jqmPhp();

    /**
     * Config 'html' and 'head' tag.
     */
    $j->head()->title('Example 4');

    /**
     * Create and config a jqmPage object.
     */
    $p = new jqmPage('example-4');
    $p->theme('b')->title('Example 4');
    $p->header()->theme('a')->add(new jqmButton('', array(new jqmAttribute('data-iconpos', 'notext')), '', 'a', 'index.php#', '', 'home'));

    /**
     * Create and config a new jqmNavbar object and add items.
     */
    $nav = $p->header()->add(new jqmNavbar(), true);
    $nav->add(new jqmButton('', '', '', 'a', 'example-1.php#', 'EX1', '', false));
    $nav->add(new jqmButton('', '', '', 'a', 'example-2.php#', 'Ex2', '', false));
    $nav->add(new jqmButton('', '', '', 'a', 'example-3.php#', 'EX3', '', false));
    $nav->add(new jqmButton('', '', '', 'a', '#', 'EX4', '', true));
    $nav->add(new jqmButton('', '', '', 'a', 'example-5.php#', 'EX5', '', false));

    /**
     * Confif page footer (jqmFooter).
     */
    $p->footer()->addButton('EX1', 'example-1.php#', '', 'arrow-l');
    $p->footer()->addButton('EX2', 'example-2.php#', '', 'arrow-l');
    $p->footer()->addButton('EX3', 'example-3.php#', '', 'arrow-l');
    $p->footer()->addButton('EX4', '#', '', 'check', true);
    $p->footer()->addButton('EX5', 'example-5.php#', '', 'arrow-r');
    $p->footer()->group(true)->uiBar(true)->theme('a');

    /**
     * Create and config a new jqmForm object and add items.
     */
    $p->content()->add('<h1>Adding Form Elements</h1>');
    $form = $p->addContent(new jqmForm(), true);
    $form->action('example-4.php?rand='.rand(0, 9999))->method('POST');

    /**
     * Add some jqmInput objects.
     */
    $form->add('<h3>Text Inputs</h3>');
    $form->add(new jqmInput('uid', 'uid', 'text', '', 'Username:', '', true));
    $form->add(new jqmInput('pwd', 'pwd', 'password', '', 'Password:', '', true));
    $form->add(new jqmInput('find', 'find', 'search', '', 'Search:', '', true));

    /**
     * Add a jqmTextarea object.
     */
    $form->add('<h3>Textarea</h3>');
    $form->add(new jqmTextarea('msg', 'msg', '', '80', '4', 'Comments:', '', true));

    /**
     * Add a jqmRange object.
     */
    $form->add('<h3>Range Input Type</h3>');
    $form->add(new jqmRange('age', 'age', '18', '18', '80', 'Age:', '', true));

    /**
     * Add a jqmSelect object with some jqmOption objects.
     */
    $form->add('<h3>Select</h3>');
        $sel = $form->add(new jqmSelect('country', 'country', 'Language:'), true);
        $sel->add(new jqmOption('English', 'en', true));
        $sel->add(new jqmOption('Spanish', 'es', false));
        $sel->add(new jqmOption('Portuguese', 'pt', false));
        $sel->add(new jqmOption('Other', '', false));
        $sel->fieldContain(true);

    /**
     * Add and config a jqmSelect object with some jqmOption objects.
     */
    $form->add('<h3>Select Inline</h3>');
        $sex = $form->add(new jqmSelect('sex', 'sex', 'Sex:', '', '', true), true);
        $sex->addOption('Male', 'male', true);
        $sex->addOption('Female', 'female', false);
        $sex->inline(true)->icon('grid')->theme('a');

    /**
     * Add a jqmSlider object.
     */
    $form->add('<h3>Select Slider</h3>');
    $form->add(new jqmSlider('yesno', 'yesno', 'Accept:', true, 'Yes', '1', 'No', '0', '', true));

    /**
     * Add and config a jqmRadiogroup object.
     */
    $form->add('<h3>Radio Group</h3>');
        $rg = $form->add(new jqmRadiogroup('plan', 'plan', 'Select your plan:'), true);
        $rg->addRadio('Silver', '0');
        $rg->addRadio('Gold', '1');
        $rg->addRadio('Diamond', '3', '', true);
        $rg->fieldContain(true);

    /**
     * Add and config a jqmCheckgroup object.
     */
    $form->add('<h3>Checkbox Group</h3>');
        $cg = $form->add(new jqmCheckboxgroup(), true);
        $cg->legend('Favorite Search Engine:');
        $cg->addCheckbox('se1', 'se1', 'Bing');
        $cg->addCheckbox('se2', 'se2', 'Google');
        $cg->addCheckbox('se3', 'se3', 'Yahoo')->fieldContain(true);

    /**
     * Add a new jqmInput object (submit button).
     */
    //$form->add(new jqmInput('', '', 'submit', 'Send Now', '', 'b'));

    /**
     * Add and config a jqmButton object with data-rel="dialog".
     */
    $send = $form->add(new jqmButton(), true);
    $send->text('Send Now')->href('example-1.php?rand='.rand(0, 9999))->attribute('data-rel', 'dialog');

    /**
     * Add the page to jqmPhp object.
     */
    $j->addPage($p);

    /**
     * Generate the HTML code.
     */
    echo $j;
?>