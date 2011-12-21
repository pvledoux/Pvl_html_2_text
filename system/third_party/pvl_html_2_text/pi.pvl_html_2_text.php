<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require("libraries/html2text.php");

$plugin_info = array(
	'pi_name' => 'Pvl HTML to Text',
	'pi_version' => '0.1',
	'pi_author' =>'Pierre-Vincent Ledoux',
	'pi_author_email' =>'ee-addons@pvledoux.be',
	'pi_author_url' => 'http://twitter.com/pvledoux/',
	'pi_author_url' => 'http://www.twitter.com/pvledoux',
	'pi_description' => 'Convert HTML to plain text.',
	'pi_usage' => Pvl_html_2_text::usage()
  );

/**
 * Copyright (c) 2011, Pv Ledoux
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *	* Redistributions of source code must retain the above copyright
 *	   notice, this list of conditions and the following disclaimer.
 *	* Redistributions in binary form must reproduce the above copyright
 *	   notice, this list of conditions and the following disclaimer in the
 *	   documentation and/or other materials provided with the distribution.
 *	* Neither the name of the <organization> nor the
 *	   names of its contributors may be used to endorse or promote products
 *	   derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
 * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
 * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
 * DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
 * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
 * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
 * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */

/**
 * Pvl_html_2_text
 *
 * @copyright	Pv Ledoux 2011
 * @since		20 Dec 2011
 * @author		Pierre-Vincent Ledoux <ee-addons@pvledoux.be>
 * @link		http://www.twitter.com/pvledoux/
 *
 */
class Pvl_html_2_text
{
	/**
 	 * Data returned from the plugin.
	 *
	 * @access	public
	 * @var		array
	 */
	public $return_data	= null;

	private $_ee		= NULL;

	/**
	* Constructor.
	*
	* @access	public
	* @return	void
	*/
	public function __construct()
	{
		$this->_ee =& get_instance();
		$this->return_data = convert_html_to_text($this->_ee->TMPL->tagdata);
	}

	/**
	* Annoyingly, the supposedly PHP5-only EE2 still requires this PHP4
	* constructor in order to function.
	*
	* @access public
	* @return void
	* method first seen used by Stephen Lewis (https://github.com/experience/you_are_here.ee2_addon)
	*/
	function Pvl_html_2_text()
	{
		$this->__construct();
	}

	/**
	 * Usage
	 *
	 * @return string
	 */
	function usage()
	{
			ob_start();

	?>


Pvl Html to Text v. 0.1

This plugin convert HTML to plain text.

Usage:

{exp:pvl_html_2_text}
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	tempor incididunt ut labore et dolore magna aliqua.</p>
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br>
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
{/exp:pvl_html_2_text}

Will output:

	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.

	Lorem ipsum dolor sit amet, consectetur adipisicing elit.
	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

	 <?php

			$buffer = ob_get_contents();
			ob_end_clean();
			return $buffer;
	}
	// --------------------------------------------------------------------

}
/* End of file pi.pvl_html_2_text.php */
/* Location: ./system/expressionengine/third_party/pvl_html_2_text/pi.pvl_html_2_text.php */