<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class customer extends CI_Controller
{

    private $requestMethod;
    private $customerId;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('customer_Model');
        $this->load->helper('url');

        $this->requestMethod = $this->input->server('REQUEST_METHOD');
        $this->customerId = $this->uri->segment(2);
    }

    public function index()
    {
        switch ($this->requestMethod) {
            case 'POST':
                $this->store();
                break;
            case 'GET':
                if (is_numeric($this->customerId)) {
                    $this->show();
                } else
                    $this->showAll();
                break;
            case 'PUT':
            case 'PATCH':
                $this->update();
                break;
            case 'DELETE':
                $this->destroy();
                break;
            default:
                $this->output->set_status_header('501');
                echo 'Method Not Implemented: ' . $this->requestMethod;
        }
    }

    public function showAll()
    {
        $customers = $this->customer_Model->getAll();

        if ($customers->num_rows() > 0) {
            $this->output->set_status_header('200');
            print_r(json_encode($customers->result()));
        } else {
            $this->output->set_status_header('204');
            echo 'Sorry no results could be found';
        }
    }

    public function store()
    {
        $fields = array('CompanyName', 'ContactName', 'ContactTitle', 'Address', 'City', 'Region', 'PostalCode', 'Country', 'Phone', 'Fax');

        $insertData = array();
        foreach ($fields as $field) {
            if (!empty($this->input->input_stream($field)))
                $insertData[$field] = $this->input->post($field);
        }

        if (!empty($insertData)) {
            $insertStatus = $this->customer_Model->store($insertData);
        } else {
            $insertStatus = false;
        }

        if ($insertStatus) {
            $this->output->set_status_header('201');
            echo 'Insert successful with id: ' . $this->db->insert_id();
        } else {
            $this->output->set_status_header('400');
            echo 'No data could be updated';
        }
    }

    public function show()
    {
        $customer = $this->customer_Model->showEdit($this->customerId);
        $customer = ($customer->result_array()['0']); //Turns the customer into an array

        if (!empty($customer)) {
            $this->output->set_status_header('200');
            print_r(json_encode($customer));
        } else {
            $this->output->set_status_header('204');
            echo 'Sorry no results could be found';
        }
    }

    public function edit()
    {
        return $this->customer_Model->showEdit($this->customerId);
    }

    public function update()
    {
        $fields = array('CompanyName', 'ContactName', 'ContactTitle', 'Address', 'City', 'Region', 'PostalCode', 'Country', 'Phone', 'Fax');

        foreach ($fields as $field) {
            if (!empty($this->input->input_stream($field)))
                $updateData[$field] = $this->input->input_stream($field);
        }

        $updateStatus = $this->customer_Model->update($updateData, $this->customerId);

        if ($updateStatus) {
            $this->output->set_status_header('200');
            echo 'update successful';
        } else {
            $this->output->set_status_header('400');
            echo 'No data could be updated';
        }
    }

    private function destroy()
    {
        if ($this->customer_Model->destroy($this->customerId)) {
            $this->output->set_status_header('200');
            echo 'Delete successful';
        } else {
            $this->output->set_status_header('400');
            echo 'No data could be deleted';
        }
    }
}
