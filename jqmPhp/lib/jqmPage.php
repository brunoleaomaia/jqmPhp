<?php
/*
 *  jqmPhp - HTML code generator for jQuery Mobile Framework
 *  Copyright (C) 2011  Bruno Maia
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */
/**
 * This file is part of the jqmPhp package.
 * @package jqmPhp
 * @filesource
 */
/**
 * This class represents the 'div' tag (data-role="page").
 * @class jqmPage
 * @author Bruno Maia <brunoleaomaia@gmail.com>
 * @copyright Copyright (c) 2011, Bruno Maia
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @package jqmPhp
 * @version 0.03
 * @since 0.01
 * @link http://www.jqmphp.com/ jqmPhp Website
 * @link http://code.google.com/p/jqmphp/ jqmPhp Project Website
 * @link http://www.jquerymobile.com jQuery Mobile Website
 */
class jqmPage extends jqmTag {
    private $_role;
    private $_header;
    private $_content;
    private $_footer;
    private $_fullscreen;
    private $_nobackbtn;
    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     * @param bool $fullscreen
     * @param bool $nobackbtn
     */
    function __construct($id, $attributes=array(), $items=array(), $theme='', $fullscreen=false, $nobackbtn=false){
        parent::__construct('div', $id, $attributes, '', $theme);
        if (is_array($items)) {
            for ($i = 0; $i < count($items); $i++) {
                if (is_object($items[$i]) && get_class($items[$i]) == 'jqmHeader') { $this->_header = $this->add($items[$i], true); }
                if (is_object($items[$i]) && get_class($items[$i]) == 'jqmContent') { $this->_content = $this->add($items[$i], true); }
                if (is_object($items[$i]) && get_class($items[$i]) == 'jqmFooter') { $this->_footer = $this->add($items[$i], true); }
            }            
        }
        if (!$this->_header) $this->_header = $this->add(new jqmHeader(), true);
        if (!$this->_content) $this->_content = $this->add(new jqmContent(), true);
        if (!$this->_footer) $this->_footer = $this->add(new jqmFooter(), true);
        $this->_role = $this->attribute('data-role', 'page', true);
        $this->_fullscreen = $this->attribute('data-fullscreen', (($fullscreen)?'true':''), true);
        $this->_nobackbtn = $this->attribute('data-nobackbtn', (($nobackbtn)?'true':''), true);
    }
    /**
     * Gets the content of the page (jqmContent).
     * @return jqmContent
     */
    function content() {
        return $this->_content;
    }
    /**
     * Gets the header of the page (jqmHeader).
     * @return jqmHeader
     */
    function header() {
        return $this->_header;
    }
    /**
     * Gets the footer of the page (jqmFooter).
     * @return jqmFooter
     */
    function footer() {
        return $this->_footer;
    }
    /**
     * Gets and sets the fullscreen property (data-fullscreen="true").
     * @param bool $value
     * @return bool|jqmPage
     */
    function fullscreen() {
        $args = func_get_args();
        if (count($args) == 0) return ($this->_fullscreen->value()=='true') ? true : false;
        $this->_fullscreen->value(($args[0]) ? 'true' : '');
        return $this;
    }
    /**
     * Gets and sets the noBackBtn property (data-nobackbtn="true").
     * @param bool $value
     * @return bool|jqmPage
     */
    function noBackBtn() {
        $args = func_get_args();
        if (count($args) == 0) return ($this->_nobackbtn->value()=='true') ? true : false;
        $this->_nobackbtn->value(($args[0]) ? 'true' : '');
        return $this;
    }
    /**
     * Gets and sets the header title.
     * @param bool $value
     * @return bool|jqmPage
     */
    function title() {
        $args = func_get_args();
        if (count($args) == 0) return $this->header()->title();
        $this->header()->title(($args[0]));
        return $this;
    }
    /**
     * Adds an item to the page content (jqmContent).
     * @param mixed $content
     * @param bool $returnAdded
     * @return jqmPage|mixed
     */
    function addContent($content, $returnAdded=false) {
        $this->_content->add($content);
        if($returnAdded) return $content;
        return $this;
    }
    /**
     * @access private
     * @param string $value
     * @return string|jqmPage
     */
    function role() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_role->value();
        $this->_role->value($args[0]);
        return $this;
    }
}
?>