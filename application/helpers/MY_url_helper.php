<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// ------------------------------------------------------------------------

/**
 *  Base URL Lang
 * 
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('lang_base_url'))
{
	function lang_base_url()
	{
		$CI =& get_instance();
		return base_url(). $CI->config->item('language_abbr').'/';
	}
}
// ------------------------------------------------------------------------

/**
 *  Office Base URL
 * 
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('office_base_url'))
{
	function office_base_url()
	{
		$CI =& get_instance();
						$abb = $CI->config->item('language_abbr');
		$url= $CI->config->base_url() .$abb.'/'.  $CI->config->item('office_base_url') ;

		return $url;
	}
}
// ------------------------------------------------------------------------

/**
 *  Nearby Base URL
 * 
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('nearby_base_url'))
{
	function nearby_base_url()
	{
		$CI =& get_instance();
				$abb = $CI->config->item('language_abbr');
		$url= $CI->config->base_url() .$abb.'/'.  $CI->config->item('nearby_base_url').'/' ;

		return $url;
	}
}


// ------------------------------------------------------------------------
/**
 *  Contact Base URL
 * 
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('contact_base_url'))
{
	function contact_base_url()
	{
		$CI =& get_instance();
				$abb = $CI->config->item('language_abbr');

		$url= $CI->config->base_url() .$abb.'/'. $CI->config->item('contact_base_url') ;

		return $url;
	}
}


// ------------------------------------------------------------------------

/**
 *  Print Base URL
 * 
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('print_base_url'))
{
	function print_base_url()
	{
		$CI =& get_instance();

		$url= lang_base_url() . $CI->config->item('print').'/' ;

		return $url;
	}
}
// ------------------------------------------------------------------------

/**
 *  Switch Language URL
 * 
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('switch_url'))
{
	function switch_url()
	{

		$CI =& get_instance();
		$current= current_url();
		$uri_string = $CI->uri->uri_string();

		$abb = $CI->config->item('language_abbr');
		empty($uri_string) ? ($index_page = ($abb == 'ar') ? 'en/' : 'ar/') : //index page  
		                     ($index_page = ($abb == 'ar') ? 'en' : 'ar');

        $alt = $CI->config->item('base_url').$index_page.$uri_string;


		//$url= $CI->config->base_url() . $CI->config->item('office_base_url') ;

		return  $alt;
	}
}




// ------------------------------------------------------------------------

/**
 *  Switch Prefex URL
 * 
 *
 * @access	public
 * @param string
 * @return	string
 */
if ( ! function_exists('switch_prefex'))
{
	function switch_prefex()
	{

		$CI =& get_instance();

		$abb = $CI->config->item('language_abbr');
		
      	$index_prefex = ($abb == 'ar') ? 'en' : 'ar';


		return  $index_prefex;
	}
}





?>