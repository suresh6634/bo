<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabil_format extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */


    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $baseUrl = base_url();
        $this->load->vars('base_url', $baseUrl);
        $this->data = null;
        date_default_timezone_set('Asia/Singapore');
    }

    public function index()
    {
        $jabil_mpns_column = $this->input->post('jabil_mpns');
        $format = "";
        if (isset($jabil_mpns_column) && !empty($jabil_mpns_column)) {
            //$format = $this->input->post('format');
            $debug = $this->input->post('debug');
            $jabil_mpn_rows = explode(PHP_EOL, $jabil_mpns_column);

            foreach ($jabil_mpn_rows as $jabil_mpn_row) {
                $mpn_row[] = explode(" ", $jabil_mpn_row);

            }

            foreach ($mpn_row as $mpn) {
                $mpns[] = $mpn[0];
            }

            $this->data["jabil_mpn_output"] = $mpns;

            $this->data["debug"] = $debug;
        }
        $this->load->view('jabil_format_view', $this->data);
    }
}