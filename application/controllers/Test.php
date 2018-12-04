<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
     * This is a sample code updated by WangQiang
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
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('multiple', 'Multiple', 'required');

        $this->data["multiple"] = $this->input->post('multiple');
        $this->data["debug"] = $this->input->post('debug');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('test_view', $this->data);
        }
        else
        {
            $multiple_each_line = explode(PHP_EOL, $this->data["multiple"]);
            unset($multiple_each_line[0]);
            $this->data["multiple_each_line"] = $multiple_each_line;
            $this->load->view('test_view', $this->data);
        }

    }

    public function code39($barcode_text) {
        $this->load->helper('barcode');
        barcode( "", $barcode_text, 40, "horizontal", "code39", true, 1.5);
    }
}