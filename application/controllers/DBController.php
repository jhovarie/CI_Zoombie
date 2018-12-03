<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class DBController extends CI_Controller {
		
		public function index($pg=0) {
			$keywordsearch = "";
			$this->load->model('model_products');
			$perpage = 5;
			$querysearch = $this->model_products->search_products_pg($keywordsearch,$perpage,$pg);
			$data['products'] = $querysearch;
			$this->load->library('pagination');
			$config['base_url'] = 'http://localhost/ci_zoombie/index.php/DBController/index';
			$config['total_rows'] = count($this->model_products->search_products_pg2($keywordsearch));
			$config['per_page'] = $perpage;
			$this->pagination->initialize($config);
			//echo $this->pagination->create_links();
			$this->load->view('dbcrud/index', $data);
		}

		public function create() {
			$this->load->view('dbcrud/create');
		}

		public function insert() {
			$this->load->model('model_products');
			$this->load->library('form_validation');

			$productarray = array(
				'id' => NULL,
				'product' => $this->input->post('product'),
				'price' => $this->input->post('price'),
				'quantity' => $this->input->post('quantity')
			);
			echo "<pre>";
			print_r($productarray);
			echo "</pre>";
			/*
			$this->form_validation->set_rules('email', 'E-email', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			$this->form_validation->set_rules('url', 'URL', 'required');
			*/
			//$this->form_validation->set_message('rule1', 'Barik Error Message');
			$this->form_validation->set_rules('product', '', 'required|trim',
        			array('required' => 'Product Name is Empty')
			);
			$this->form_validation->set_rules('price', '', 'required|trim',
        			array('required' => 'Price is Empty')
			);
			$this->form_validation->set_rules('quantity', '', 'required|trim',
        			array('required' => 'Quantity is Empty')
			);

			if($this->form_validation->run() == FALSE)
			{
				echo "<b><font color='red'>FAILED TO INSERT</font></b> ".validation_errors();
			} else {
				$this->model_products->insert_products($productarray);
				echo "<b><font color='green'>INSERT SUCCESSFUL</font></b>";
			}
			echo '<br/><a href="'.base_url().'DBController/index">Back</a>';
		}

		public function edit($id = null) {
			$this->load->model('model_products');
			$data['products'] = $this->model_products->getproductwhereid($id);
			$this->load->view('dbcrud/edit.php',$data);
		}

		public function update() {
			$this->load->model('model_products');
			$this->load->library('form_validation');

			$productarray = array(
				'id' => $this->input->post('id'),
				'product' => $this->input->post('product'),
				'price' => $this->input->post('price'),
				'quantity' => $this->input->post('quantity')
			);
			echo "<pre>";
			print_r($productarray);
			echo "</pre>";

			$this->form_validation->set_rules('product', '', 'required|trim',
        			array('required' => 'Product Name is Empty')
			);
			$this->form_validation->set_rules('price', '', 'required|trim',
        			array('required' => 'Price is Empty')
			);
			$this->form_validation->set_rules('quantity', '', 'required|trim',
        			array('required' => 'Quantity is Empty')
			);

			if($this->form_validation->run() == FALSE)
			{
				echo "<b><font color='red'>FAILED TO UPDATE</font></b> ".validation_errors();
			} else {
				$this->model_products->update_products($productarray);
				echo "<b><font color='green'>UPDATE SUCCESSFUL</font></b>";
			}
			echo '<br/><a href="'.base_url().'/DBController/index">Back</a>';
		}

		public function delete($id) {
			$this->load->model('model_products');
			$this->model_products->delete_product($id);
			echo "<b><font color='green'>DELETE SUCCESSFUL</font></b>";
			echo '<br/><a href="'.base_url().'/DBController/index">Back</a>';
		}

		public function search($pg = 0) {
			$keyword = "";
		    if(isset($_POST['keyword'])) {
		    	$keyword = $_POST['keyword'];
		    	$newdata = array(
	        			'keyword' => $this->input->post('keyword'),
	            );
	        	$this->session->set_userdata($newdata);
		    } else {
		    	$keyword = $this->session->set_userdata('keyword');
		    }
		    echo "<h1>$keyword</h1>";
			$this->load->model('model_products');
			$perpage = 5;
			$querysearch = $this->model_products->search_products_pg($keyword,$perpage,$pg);
			$data['products'] = $querysearch;
			$this->load->library('pagination');
			$config['base_url'] = 'http://localhost/ci_zoombie/index.php/DBController/search';
			$config['total_rows'] = count($this->model_products->search_products_pg2($keyword));
			$config['per_page'] = $perpage;
			$this->pagination->initialize($config);
			//echo $this->pagination->create_links();
			$this->load->view('dbcrud/search', $data);
		}
	}
?>
