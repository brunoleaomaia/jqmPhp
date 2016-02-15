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
 * This class represents the 'div' tag (data-role="page").
 *
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
class Page extends Tag
{
    private $_role;

    /**
     * @var Header
     */
    private $_header;

    /**
     * @var Content
     */
    private $_content;

    /**
     * @var Footer
     */
    private $_footer;

    /**
     * @var boolean
     */
    private $_fullscreen;

    /**
     * @var boolean
     */
    private $_nobackbtn;

    /**
     *
     * @param string $id
     * @param array $attributes
     * @param array $items
     * @param string $theme
     * @param boolean $fullscreen
     * @param boolean $nobackbtn
     */
    public function __construct(
        $id,
        array $attributes = array(),
        array $items = array(),
        $theme = '',
        $fullscreen = false,
        $nobackbtn = false
    ) {
        parent::__construct('div', $id, $attributes, $items, $theme);
        if (count($items) > 0) {
            foreach ($items as $item) {
                if ($item instanceof Header) {
                    $this->_header = $this->add($item, true);
                } elseif ($item instanceof Content) {
                    $this->_content = $this->add($item, true);
                } elseif ($item instanceof Footer) {
                    $this->_footer = $this->add($item, true);
                }
            }
        }

        if (!$this->_header) {
            $this->_header = $this->add(new Header(), true);
        }
        if (!$this->_content) {
            $this->_content = $this->add(new Content(), true);
        }
        if (!$this->_footer) {
            $this->_footer = $this->add(new Footer(), true);
        }
        $this->_role = $this->addAttribute(new Attribute('data-role', 'page'), true);
        $this->_fullscreen = $this->addAttribute(
            new Attribute('data-fullscreen', $fullscreen === true ? 'true' : ''),
            true
        );
        $this->_nobackbtn = $this->addAttribute(
            new Attribute('data-nobackbtn', $nobackbtn === true ? 'true' : ''),
            true
        );
    }

    /**
     * Gets the content of the page (content).
     * @return content
     */
    public function content()
    {
        return $this->_content;
    }

    /**
     * Gets the header of the page (header).
     * @return header
     */
    public function header()
    {
        return $this->_header;
    }

    /**
     * Gets the footer of the page (Footer).
     * @return Footer
     */
    public function footer()
    {
        return $this->_footer;
    }

    /**
     * Gets and sets the fullscreen property (data-fullscreen="true").
     * @param boolean $value
     * @return bool|self
     */
    public function fullscreen()
    {
        if (func_num_args() === 0) {
            return ($this->_fullscreen->value() == 'true') ? true : false;
        }
        $this->_fullscreen->value(func_get_arg(0) === true ? 'true' : '');
        return $this;
    }

    /**
     * Gets and sets the noBackBtn property (data-nobackbtn="true").
     * @param boolean $value
     * @return bool|self
     */
    public function noBackBtn()
    {
        if (func_num_args() === 0) {
            return ($this->_nobackbtn->value() == 'true') ? true : false;
        }
        $this->_nobackbtn->value(func_get_arg(0) === true ? 'true' : '');
        return $this;
    }

    /**
     * Gets and sets the header title.
     *
     * @param string $value
     * @return bool|self
     */
    public function title()
    {
        if (func_num_args() === 0) {
            return $this->header()->title();
        }
        $this->header()->title(func_get_arg(0));
        return $this;
    }

    /**
     * Adds an item to the page content (content).
     * @param mixed $content
     * @param boolean $returnAdded
     * @return self|mixed
     */
    public function addContent($content, $returnAdded = false)
    {
        $this->_content->add($content);
        if ($returnAdded === true) {
            return $content;
        }
        return $this;
    }

    /**
     *
     * @param string $value
     * @return string|self
     */
    public function role()
    {
        if (func_num_args() === 0) {
            return $this->_role->value();
        }
        $this->_role->value(func_get_arg(0));
        return $this;
    }
}

