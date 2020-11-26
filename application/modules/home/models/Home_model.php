<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function getSlides()
	{
		return $this->db->order_by('id', 'ASC')->get('slides');
	}

	public function updateconfigs($name, $discord, $realmlist, $expansion, $license)
	{
		$this->load->library('config_writer');
		$blizz = $this->config_writer->get_instance(APPPATH.'config/blizzcms.php', 'config');
		$plus = $this->config_writer->get_instance(APPPATH.'config/plus.php', 'config');

		$blizz->write('website_name', $name);
		$blizz->write('discord_invitation', $discord);
		$blizz->write('realmlist', $realmlist);
		$blizz->write('expansion', $expansion);
		$blizz->write('migrate_status', '0');
		$plus->write('license_plus', $license);
		return true;
	}
}
