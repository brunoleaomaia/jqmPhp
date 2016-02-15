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
namespace jqmPhp;

use jqmPhp\Tag\Body;
use jqmPhp\Tag\Head;
use jqmPhp\Tag\Html;
use jqmPhp\Tag\Page;


/**
 * jqmPhp - HTML code generator for jQuery Mobile Framework
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
class Container
{
    /**
     * Default jQuery Mobile CSS path
     *
     * @var string
     */
    const CSS = '//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css';

    /**
     * Default Doctype
     *
     * @var string
     */
    const DOCTYPE = 'html';

    /**
     * Default jQuery path
     *
     * @var string
     */
    const JQUERY_PATH = '//code.jquery.com/jquery-1.8.3.min.js';

    /**
     * Default jQuery Mobile path
     *
     * @var string
     */
    const JQUERY_MOBILE_PATH = '//code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js';

    /**
     * Default XML namespace
     *
     * @var string
     */
    const XMLNS = 'http://www.w3.org/1999/xhtml';

    /**
     * Default Charset
     *
     * @var string
     */
    const CHARSET = 'UTF-8';

    /**
     * Default Viewport
     *
     * @var string
     */
    const VIEWPORT = 'width=device-width, initial-scale=1';

    /**
     * @var string
     */
    const TITLE = 'JQuery Mobile Application';
    /**
     * @var Html
     */
    private $html;

    /**
     *
     * @param string $doctype
     * @param string $xmlns
     * @param string $charset
     * @param string $title
     * @param string $css
     * @param string $jq
     * @param string $jqm
     */
    public function __construct(
        $doctype = self::DOCTYPE,
        $xmlns = self::XMLNS,
        $charset = self::CHARSET,
        $title = self::TITLE,
        $css = self::CSS,
        $jq = self::JQUERY_PATH,
        $jqm = self::JQUERY_MOBILE_PATH
    ) {
        $this->html = new Html($doctype, $xmlns, $charset, $title, $css, $jq, $jqm);
    }

    /**
     *
     * @return string
     */
    public function __toString()
    {
        return $this->html()->__toString();
    }

    /**
     * Gets the 'HTML' element (html).
     *
     * @return Html
     */
    public function html()
    {
        return $this->html;
    }

    /**
     * Gets the 'HEAD' element
     *
     * @return Head
     */
    public function head()
    {
        return $this->html()->head();
    }

    /**
     * Gets the 'BODY' element
     *
     * @return Body
     */
    public function body()
    {
        return $this->html()->body();
    }

    /**
     * Adds a Page to the pages collection of HTML Body element
     *
     * @param Page $page
     * @param bool $returnAdded
     * @return self|Page
     */
    public function addPage(Page $page, $returnAdded = false)
    {
        $this->html()->body()->addPage($page);

        return $returnAdded === true ? $page : $this;
    }

    /**
     * Adds a Page (page) to the pages collection of HTML Body element
     *
     * @param string $id
     * @param string $title
     * @param string $content
     * @param boolean
     * @return self|Page
     */
    public function addBasicPage($id, $title, $content, $returnAdded = false)
    {
        $page = new Page($id);
        $page->title($title)->addContent($content);
        $this->html()->body()->addPage($page);
        if ($returnAdded === true) {
            return $page;
        }
        return $this;
    }

    /**
     * Gets the Pages collection in HTML Body
     *
     * @return Collection
     */
    public function pages()
    {
        return $this->html()->body()->pages();
    }
}