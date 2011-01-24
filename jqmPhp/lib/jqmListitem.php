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
 * This class represents the 'li' tag.
 * @class jqmListitem
 * @author Bruno Maia <brunoleaomaia@gmail.com>
 * @copyright Copyright (c) 2011, Bruno Maia
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License
 * @package jqmPhp
 * @version 0.01
 * @link http://code.google.com/p/jqmphp/ jqmPhp Project Website
 * @link http://www.jquerymobile.com jQuery Mobile Website
 */
class jqmListitem extends jqmTag {
    private $_divider;
    private $_title;
    private $_href;
    private $_count;
    private $_icon;
    private $_isThumb;
    private $_subTitle;
    private $_splitHref;
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
    function __construct($id='', $attributes=array(), $items=array(), $divider=false, $title='', $href='', $count='', $img='', $subTitle='', $isThumb=false, $splitHref='') {
        parent::__construct('li', $id, $attributes, $items);
        $this->_divider = $this->attribute('data-role', (($divider) ? 'list-divider' : ''), true);
        $this->_title = $title;
        $this->_href = $href;
        $this->_count = $count;
        $this->_img = $img;
        $this->_subTitle = $subTitle;
        $this->_isThumb = $isThumb;
        $this->_splitHref = $splitHref;
    }
    /**
     * Gets and sets the divider property (data-role="list-divider").
     * @param bool $value
     * @return bool|jqmListitem
     */
    function divider() {
        if (func_num_args() == 0) return ($this->_divider->value()=='list-divider') ? true : false;
        $this->_divider->value((func_get_arg(0)) ? 'list-divider' : '');
        return $this;
    }
    /**
     * Gets and sets the title property.
     * @param string $value
     * @return string|jqmListitem
     */
    function title() {
        if (func_num_args() == 0) return $this->_title;
        $this->_title = func_get_arg(0);
        return $this;
    }
    /**
     * Gets and sets the href property.
     * @param string $value
     * @return string|jqmListitem
     */
    function href() {
        if (func_num_args() == 0) return $this->_href;
        $this->_href = func_get_arg(0);
        return $this;
    }
    /**
     * Gets and sets the count property (class="ui-li-count").
     * @param string $value
     * @return string|jqmListitem
     */
    function count() {
        if (func_num_args() == 0) return $this->_count;
        $this->_count = func_get_arg(0);
        return $this;
    }
    /**
     * Gets and sets the image property.
     * @param string $value
     * @return string|jqmListitem
     */
    function img() {
        if (func_num_args() == 0) return $this->_img;
        $this->_img = func_get_arg(0);
        return $this;
    }
    /**
     * Gets and sets the subTitle property.
     * @param string $value
     * @return string|jqmListitem
     */
    function subTitle() {
        if (func_num_args() == 0) return $this->_subTitle;
        $this->_subTitle = func_get_arg(0);
        return $this;
    }
    /**
     * Gets and sets the isThumb property.
     * If isThumb is false class="ui-li-icon" is added to html 'img' tag.
     * @param bool $value
     * @return bool|jqmListitem
     */
    function isThumb() {
        if (func_num_args() == 0) return $this->_isThumb;
        $this->_isThumb = func_get_arg(0);
        return $this;
    }
    /**
     * Gets and sets the splitHref property.
     * @param string $value
     * @return string|jqmListitem
     */
    function splitHref() {
        if (func_num_args() == 0) return $this->_splitHref;
        $this->_splitHref = func_get_arg(0);
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
        if ($this->_href != '') $string.= '<a href="'.$this->_href.'">';
        $string.= $this->_title; if ($this->_href != '') $string.= '</a>';
        if ($this->_isThumb) $string.= '</h3>';
        if ($this->_subTitle != '') $string.= '<p>'.$this->_subTitle.'</p>';
        if ($this->_splitHref != '') $string.= '<a href="'.$this->_splitHref.'"></a>';
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