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

namespace jqmPhp\Tag;

use jqmPhp\Attribute;
use jqmPhp\Tag;

/**
 * This class represents the 'li' tag.
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
class Listitem extends Tag
{
    private $_divider;
    private $_title;
    private $_href;
    private $_rel;
    private $_target;
    private $_count;
    private $_isThumb;
    private $_subTitle;
    private $_splitHref;
    private $_splitRel;
    private $_splitTarget;

    /**
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
     * @param string $rel
     * @param string $target
     * @param string $splitRel
     * @param string $splitTarget
     */
    public function __construct(
        $id = '',
        array $attributes = array(),
        array $items = array(),
        $divider = false,
        $title = '',
        $href = '',
        $count = '',
        $img = '',
        $subTitle = '',
        $isThumb = false,
        $splitHref = '',
        $rel = '',
        $target = '',
        $splitRel = '',
        $splitTarget = ''
    ) {
        parent::__construct('li', $id, $attributes, $items);
        $this->_divider = $this->addAttribute(
            new Attribute('data-role', $divider === true ? 'list-divider' : ''),
            true
        );
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
     * @param boolean $value
     * @return bool|self
     */
    public function divider()
    {
        if (func_num_args() === 0) {
            return ($this->_divider->value() == 'list-divider') ? true : false;
        }
        $this->_divider->value(func_get_arg(0) === true ? 'list-divider' : '');
        return $this;
    }

    /**
     * Gets and sets the title property.
     * @param string $value
     * @return string|self
     */
    public function title()
    {
        if (func_num_args() === 0) {
            return $this->_title;
        }
        $this->_title = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the href property.
     * @param string $value
     * @return string|self
     */
    public function href()
    {
        if (func_num_args() === 0) {
            return $this->_href;
        }
        $this->_href = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the rel property.
     * @param string $value
     * @return string|self
     */
    public function rel()
    {
        if (func_num_args() === 0) {
            return $this->_rel;
        }
        $this->_rel = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the target property.
     * @param string $value
     * @return string|self
     */
    public function target()
    {
        if (func_num_args() === 0) {
            return $this->_target;
        }
        $this->_target = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the count property (class="ui-li-count").
     * @param string $value
     * @return string|self
     */
    public function count()
    {
        if (func_num_args() === 0) {
            return $this->_count;
        }
        $this->_count = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the image property.
     * @param string $value
     * @return string|self
     */
    public function img()
    {
        if (func_num_args() === 0) {
            return $this->_img;
        }
        $this->_img = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the subTitle property.
     * @param string $value
     * @return string|self
     */
    public function subTitle()
    {
        if (func_num_args() === 0) {
            return $this->_subTitle;
        }
        $this->_subTitle = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the isThumb property.
     * If isThumb is false class="ui-li-icon" is added to html 'img' tag.
     * @param boolean $value
     * @return bool|self
     */
    public function isThumb()
    {
        if (func_num_args() === 0) {
            return $this->_isThumb;
        }
        $this->_isThumb = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the splitHref property.
     * @param string $value
     * @return string|self
     */
    public function splitHref()
    {
        if (func_num_args() === 0) {
            return $this->_splitHref;
        }
        $this->_splitHref = func_get_arg(0);
        return $this;
    }

    public function splitRel()
    {
        if (func_num_args() === 0) {
            return $this->_splitRel;
        }
        $this->_splitRel = func_get_arg(0);
        return $this;
    }

    /**
     * Gets and sets the target property.
     * @param string $value
     * @return string|self
     */
    public function splitTarget()
    {
        if (func_num_args() === 0) {
            return $this->_splitTarget;
        }
        $this->_splitTarget = func_get_arg(0);
        return $this;
    }

    /**
     *
     * @return string
     */
    public function openTag()
    {
        $string = parent::openTag();
        if ($this->_img != '') {
            $string .= '<img src="' . $this->_img . '"' . ($this->_isThumb === true ? '' : ' class="ui-li-icon"') . '/>';
        }
        if ($this->_isThumb) {
            $string .= '<h3>';
        }
        if ($this->_href != '') {
            $string .= '<a href="' . $this->_href . '"';
            if ($this->_rel) {
                $string .= ' rel="' . $this->_rel . '"';
            }
            if ($this->_target) {
                $string .= ' target="' . $this->_target . '"';
            }
            $string .= '>';
        }
        $string .= $this->_title;
        if ($this->_href != '') {
            $string .= '</a>';
        }
        if ($this->_isThumb) {
            $string .= '</h3>';
        }
        if ($this->_subTitle != '') {
            $string .= '<p>' . $this->_subTitle . '</p>';
        }
        if ($this->_splitHref != '') {
            $string .= '<a href="' . $this->_splitHref . '"';
            if ($this->_splitRel) {
                $string .= ' rel="' . $this->_splitRel . '"';
            }
            if ($this->_splitTarget) {
                $string .= ' target="' . $this->_splitTarget . '"';
            }
            $string .= '></a>';
        }

        return $string;
    }

    /**
     *
     * @return string
     */
    public function closeTag()
    {
        $string = '';
        if ($this->_count != '') {
            $string .= '<span class="ui-li-count">' . $this->_count . '</span>';
        }
        $string .= parent::closeTag();
        return $string;
    }
}
