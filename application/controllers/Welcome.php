<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('max_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$result['info'] = $this->max_model->list();
		$this->load->view('addlisting',$result);
	}

	public function insert($id=NULL)
	{	
			$req = array(
				'max_first_name' => $_REQUEST['max_first_name'],
				'max_last_name' => $_REQUEST['max_last_name']);
			if (isset($_REQUEST['id'])) {
				$this->max_model->savedata($req,'ajax',$_REQUEST['id']);
				$idx = $_REQUEST['id'];
			} else {
				$idx = $this->max_model->savedata($req,'ajax');
			}
			if(isset($idx)) {
			echo '<tr><td>'.$idx.'</td><td>'.$_REQUEST['max_first_name'].'</td><td>'.$_REQUEST['max_last_name'].'</td><td></td><td><a href="http://localhost/maxtra/index.php/welcome/edit/'.$idx.'" class="btn btn-primary mr-1" id="edit">Edit</a><button type="button" class="btn btn-danger">Delete</button></td></tr>';
          }
	}

	public function edit($id)
	{
		if (isset($_REQUEST['savedata'])) {
			$req = array(
				'max_first_name' => $_REQUEST['max_first_name'],
				'max_last_name' => $_REQUEST['max_last_name']);
			if (isset($_REQUEST['id'])) {
				$this->max_model->savedata($req,'ajax',$_REQUEST['id']);
			} else {
				$idx = $this->max_model->savedata($req,'ajax');
			}
			if(isset($idx)) {
			echo '<tr>
              <td>'.$idx.'</td>
              <td>'.$_REQUEST['max_first_name'].'</td>
              <td>'.$_REQUEST['max_last_name'].'</td>
              <td>'.$_REQUEST['max_image'].'</td>
              <td><a href="http://localhost/maxtra/index.php/welcome/edit/'.$idx.'" class="btn btn-primary mr-1" id="edit">Edit</a><button type="button" class="btn btn-danger">Delete</button></td>
              </tr>';
          }
		}

		$data['info'] = $this->max_model->list();
		$data['infomax'] = $this->max_model->displaydata($id);
		$this->load->view('editlisting',$data);
	}

	public function listing()
	{
		$result['info'] = $this->max_model->list();
		$this->load->view('addlisting',$result);
	}

	public function deleteme($id)
	{
		$this->max_model->hard_delete('ajax',$id);
		redirect('http://localhost/maxtra/');
	}

	public function maximage()
	{	
		if(isset($_FILES['upimg']) && $_FILES['upimg']['size'] > 0){
			$imgname = $_FILES['upimg']['name'];
			move_uploaded_file($_FILES['upimg']['tmp_name'], 'assets/img/'.$imgname);
			$data = array('max_image' => $imgname);
			$this->max_model->savedata($data,'ajax',$_REQUEST['aid']);
		}
		redirect('http://localhost/maxtra/');
	}
}
