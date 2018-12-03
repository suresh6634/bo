<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Date_format extends CI_Controller {

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
        $all_dates = $this->input->post('dates');
        $format = "";
        if (isset($all_dates) && !empty($all_dates)) {
            $format = $this->input->post('format');
            $debug = $this->input->post('debug');
            $dates = explode(PHP_EOL, $all_dates);

            foreach ($dates as $date) {
                if(trim($date) != "")
                {
                    $d = new DateTime($date);
                    $formatted_date[] = $d->format($format); // 2017-08-25
                } else {
                    $formatted_date[] = "";
                }
            }

            $this->data["all_dates"] = $all_dates;

            $this->data["formatted_date"] = $formatted_date;
            $this->data["debug"] = $debug;
        }
        $this->data["format"] = $format;
        $this->load->view('date_format_view', $this->data);
    }
}