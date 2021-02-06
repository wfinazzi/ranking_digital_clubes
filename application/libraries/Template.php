<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Template
{
	function show($view, $data = array())
	{
		$CI = &get_instance();

		$CI->load->view('header', $data);

		$CI->load->view($view, $data);

		$CI->load->view('footer', $data);

		$CI->load->view('scripts', $data);
	}
}
