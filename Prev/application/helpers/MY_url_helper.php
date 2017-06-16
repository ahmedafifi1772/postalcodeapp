<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


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
		$url= $CI->config->base_url() . $CI->config->item('office_base_url') ;

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
		$url= $CI->config->base_url() . $CI->config->item('nearby_base_url').'/' ;

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
		$url= $CI->config->base_url() . $CI->config->item('contact_base_url') ;

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
		$url= $CI->config->base_url() . $CI->config->item('print').'/' ;

		return $url;
	}
}

?>