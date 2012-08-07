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
 * This class represents the 'li' tag.
 * @class jqmListitem
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
class jqmListitem extends jqmTag {
    private $_divider;
    private $_title;
    private $_href;
    private $_rel;
    private $_target;
    private $_count;
    private $_icon;
    private $_isThumb;
    private $_subTitle;
    private $_splitHref;
    private $_splitRel;
    private $_splitTarget;
    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param bool $divider
     * @param string $title
     * @param string $href
     * @param string $count
     * @param string $img
     * @param string $subTitle
     * @param bool $isThumb
     * @param string $splitHref
     */
    function __construct($id='', $attributes=array(), $items=array(), $divider=false, $title='', $href='', $count='', $img='', $subTitle='', $isThumb=false, $splitHref='', $rel='', $target='', $splitRel='', $splitTarget='') {
        parent::__construct('li', $id, $attributes, $items);
        $this->_divider = $this->attribute('data-role', (($divider) ? 'list-divider' : ''), true);
        $this->_title = $title;
        $this->_href = $href;
        $this->_rel = $rel;
        $this->_target = $target;
        $this->_count = $count;
        $this->_img = $img;
        $this->_subTitle = $subTitle;
        $this->_isThumb = $isThumb;
        $this->_splitHref = $splitHref;
        $this->_splitRel = $splitRel;
        $this->_splitTarget = $splitTarget;
    }
    /**
     * Gets and sets the divider property (data-role="list-divider").
     * @param bool $value
     * @return bool|jqmListitem
     */
    function divider() {
        $args = func_get_args();
        if (count($args) == 0) return ($this->_divider->value()=='list-divider') ? true : false;
        $this->_divider->value(($args[0]) ? 'list-divider' : '');
        return $this;
    }
    /**
     * Gets and sets the title property.
     * @param string $value
     * @return string|jqmListitem
     */
    function title() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_title;
        $this->_title = $args[0];
        return $this;
    }
    /**
     * Gets and sets the href property.
     * @param string $value
     * @return string|jqmListitem
     */
    function href() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_href;
        $this->_href = $args[0];
        return $this;
    }
    /**
     * Gets and sets the rel property.
     * @param string $value
     * @return string|jqmListitem
     */
    function rel() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_rel;
        $this->_rel = $args[0];
        return $this;
    }
    /**
     * Gets and sets the target property.
     * @param string $value
     * @return string|jqmListitem
     */
    function target() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_target;
        $this->_target = $args[0];
        return $this;
    }
    /**
     * Gets and sets the count property (class="ui-li-count").
     * @param string $value
     * @return string|jqmListitem
     */
    function count() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_count;
        $this->_count = $args[0];
        return $this;
    }
    /**
     * Gets and sets the image property.
     * @param string $value
     * @return string|jqmListitem
     */
    function img() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_img;
        $this->_img = $args[0];
        return $this;
    }
    /**
     * Gets and sets the subTitle property.
     * @param string $value
     * @return string|jqmListitem
     */
    function subTitle() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_subTitle;
        $this->_subTitle = $args[0];
        return $this;
    }
    /**
     * Gets and sets the isThumb property.
     * If isThumb is false class="ui-li-icon" is added to html 'img' tag.
     * @param bool $value
     * @return bool|jqmListitem
     */
    function isThumb() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_isThumb;
        $this->_isThumb = $args[0];
        return $this;
    }
    /**
     * Gets and sets the splitHref property.
     * @param string $value
     * @return string|jqmListitem
     */
    function splitHref() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_splitHref;
        $this->_splitHref = $args[0];
        return $this;
    }
    function splitRel() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_splitRel;
        $this->_splitRel = $args[0];
        return $this;
    }
    /**
     * Gets and sets the target property.
     * @param string $value
     * @return string|jqmListitem
     */
    function splitTarget() {
        $args = func_get_args();
        if (count($args) == 0) return $this->_splitTarget;
        $this->_splitTarget = $args[0];
        return $this;
    }
    /**
     * @access private
     * @return string
     */
    function openTag() {
        $string = parent::openTag();
        if ($this->_img != '') $string.= '<img src="'.$this->_img.'"'.(($this->_isThumb) ? '': ' class="ui-li-icon"').'/>';
        if ($this->_isThumb) $string.= '<h3>';
        if ($this->_href != '') { 
            $string.= '<a href="'.$this->_href.'"';
            if ($this->_rel) $string.= ' rel="'.$this->_rel.'"';
            if ($this->_target) $string.= ' target="'.$this->_target.'"';
            $string.= '>';
        }
        $string.= $this->_title; if ($this->_href != '') $string.= '</a>';
        if ($this->_isThumb) $string.= '</h3>';
        if ($this->_subTitle != '') $string.= '<p>'.$this->_subTitle.'</p>';
        if ($this->_splitHref != '') { 
            $string.= '<a href="'.$this->_splitHref.'"';
            if ($this->_splitRel) $string.= ' rel="'.$this->_splitRel.'"';
            if ($this->_splitTarget) $string.= ' target="'.$this->_splitTarget.'"';
            $string.= '></a>';
        }
        return $string;
    }
    /**
     * @access private
     * @return string
     */
    function closeTag() {
        $string = '';
        if ($this->_count != '') $string.= '<span class="ui-li-count">'.$this->_count.'</span>';
        $string.= parent::closeTag();
        return $string;
    }
}
?>