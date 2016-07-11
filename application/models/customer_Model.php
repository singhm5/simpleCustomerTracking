<?php

class customer_Model extends CI_Model
{
    public function getAll()
    {
        return $this->db->query('SELECT `customer_id`, `CompanyName`, `ContactName`, `ContactTitle`, `Address`, `City`, `region`, `postal_code`, `country`, `phone`, `fax` FROM `customers`');
    }

    public function store($data)
    {
        $this->db->insert('customers', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function showEdit($customer_id)
    {
        $customers = $this->db->query('SELECT `customer_id`, `CompanyName`, `ContactName`, `ContactTitle`, `Address`, `City`, `region`, `postal_code`, `country`, `phone`, `fax` FROM `customers` WHERE customer_id = ? LIMIT 1', array($customer_id));

        return $customers;
    }

    public function update($data, $customer_id)
    {
        $this->db->where('customer_id', $customer_id)->update('customers', $data);

        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function destroy($customer_id)
    {
        $this->db->delete('customers', array('customer_id' => $customer_id));

        return ($this->db->affected_rows() != 1) ? false : true;
    }
}