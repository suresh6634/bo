<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barcode extends CI_Controller {

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
        $this->data["base_url"] = base_url();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('part-no', 'Part Number', 'required');
        $this->form_validation->set_rules('po-no', 'P/O Number', 'required');
        $this->form_validation->set_rules('do-no', 'D/O Number', 'required');
        $this->form_validation->set_rules('qty', 'Quantity', 'required');

        $this->data["description"] = $this->input->post('description');
        $this->data["part_no"] = $this->input->post('part-no');
        $this->data["po_no"] = $this->input->post('po-no');
        $this->data["do_no"] = $this->input->post('do-no');
        $this->data["qty"] = $this->input->post('qty');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('barcode_view', $this->data);
        }
        else
        {
            $this->load->view('barcode_view', $this->data);
        }

    }

    public function multiple()
    {
        $this->data["base_url"] = base_url();
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('multiple', 'Multiple', 'required');

        $this->data["multiple"] = $this->input->post('multiple');
        $this->data["debug"] = $this->input->post('debug');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('multiple_view', $this->data);
        }
        else
        {
            $multiple_each_line = explode(PHP_EOL, $this->data["multiple"]);
            unset($multiple_each_line[0]);
            $this->data["multiple_each_line"] = $multiple_each_line;
            $this->load->view('multiple_view', $this->data);

        }

    }

    public function import()
    {
        $this->data['error'] = 0;
        $this->data["file_uploaded"] = 0;
        /*$config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size']      = 1000;*/

        $this->data["debug"] = $this->input->post('debug');

        /*$this->load->library('upload', $config);

        if ($this->upload->do_upload('csv')) { //use this function

            $this->data['error'] = false;
            $upload_data = $this->upload->data();
            $this->data['data'] = $upload_data;
            $this->data['msg'] = 'Image Successfully Uploaded.';

        } else {

            $this->data['msg'] = $this->upload->display_errors('', '<br>');

        }*/

            $this->load->view('import_view', $this->data);


    }

    public function do_import()
    {
        $this->data['error'] = 0;
        $this->data["debug"] = $this->input->post('debug');
        $this->data["file_uploaded"] = $_FILES['csv']['size'];

        if($this->data["file_uploaded"] == 0)
        {
            $this->data['error'] = 1;

            $this->data['error'] = "Please select file to generate barcode";

        } else {

            $csv_mimetypes = array(
                'text/csv',
                'text/plain',
                'application/csv',
                'text/comma-separated-values',
                'application/excel',
                'application/vnd.ms-excel',
                'application/vnd.msexcel',
                'text/anytext',
                'application/octet-stream',
                'application/txt',
            );

            if (in_array($_FILES['csv']['type'], $csv_mimetypes)) {
                $this->data['error'] = 0;
                $this->data['file'] = file_get_contents($_FILES["csv"]["tmp_name"]);

                $multiple_each_line = explode(PHP_EOL, $this->data['file']);
                unset($multiple_each_line[0]);
                $this->data["multiple_each_line"] = $multiple_each_line;


            } else {
                $this->data['error'] = 1;
                $this->data['error'] = "The file '".$_FILES["csv"]["name"]."' uploaded is not a valid CSV";
            }

        }

        $this->load->view('import_view', $this->data);

    }

    public function code39($barcode_text) {
        $this->load->helper('barcode');
        barcode( "", $barcode_text, 30, "horizontal", "code39", true, 1);
    }
}