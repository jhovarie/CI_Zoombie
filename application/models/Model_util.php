<?php

/**
 * Description of Model_common
 *
 * @author jhovarie.guiang
 */
class Model_util extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function insert_record($table, $data) {//the products array gets
        $sql = $this->db->insert_string($table, $data);
        $query = $this->db->query($sql);
        if ($query === TRUE) {
            return TRUE;
        } else {
            $last_query = $this->db->last_query();
            return $last_query;
        }
    }

    function is_exists_record($table, $column1key = null, $column1val = null, $column2key = null, $column2val = null) {
        $data = array(
            $column1key => $column1val,
            $column2key => $column2val,
        );
        $this->db->where($column1key, $data[$column1val]);
        $this->db->where($column2key, $data[$column2val]);
        return $this->db->count_all_results($table) > 0 ? 1 : 0;
    }

    function update_table($table, $data) {
        $this->db->where('id', $data['id']);
        $query = $this->db->update($table, $data);
        if ($query === TRUE) {
            return TRUE;
        } else {
            $last_query = $this->db->last_query();
            return $last_query;
        }
    }

    function update_table_1column($table, $id, $column1key = NULL, $column1value = NULL) {
        $data = array(
            'id' => $id,
            $column1key => $column1value
        );
        $this->db->where('id', $data['id']);
        $query = $this->db->update($table, $data);
        if ($query === TRUE) {
            return TRUE;
        } else {
            $last_query = $this->db->last_query();
            return $last_query;
        }
    }

    function delete_table_row($table, $id) {
        $this->db->delete($table, array('id' => $id));
    }

    //

    function select_record($mysqlquery) {
        //$mysqlquery = 'SELECT firstname FROM users';
        $query = $this->db->query($mysqlquery);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return NULL;
        }
        //to access
        //controller --------------------------------------------------
        //$data['page_header'] = "This is a page header";
        //$mysqlquery = 'SELECT firstname FROM users';
        //$data['yourrecords'] = $this->model_util->select_record($mysqlquery);
        // $this->load->view('welcome_message', $data);
        //views -------------------------------------------------------
        /*
          <h2><?php  $page_header; ?></h2>
          if(!empty($yourrecords)) {
          foreach($yourrecords as $object) {
          echo $object->firstname. '\'s email address is '. $object->email. '<br/>';
          }
          }
         */
    }

    function search_record($table, $column, $keyword) {
        $this->db->like($column, $keyword);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get($table);
        return $query->result();
        //to access
        //controller ------------------------------------------------------------
        //$data['page_header'] = "This is a page header";
        //$data['yourrecords'] = $this->model_util->search_record('mytable','column','value');
        // $this->load->view('welcome_message', $data);
        //views -----------------------------------------------------------------
        /*
          <h2><?php  $page_header; ?></h2>
          if(!empty($yourrecords)) {
          foreach($yourrecords as $object) {
          echo $object->firstname. '\'s email address is '. $object->email. '<br/>';
          }
          }
         */
    }

}
