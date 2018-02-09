<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Main extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Main_model');
	}
	
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
	public function index($id="",$kelas="")
	{
		$data['fbj_28_1'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('id_acara'=>$id,'sesi'=>'1','status'=>0));
		$data['fbj_28_2'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('id_acara'=>$id,'sesi'=>'2','status'=>0));
		$data['fbj_28_3'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('id_acara'=>$id,'sesi'=>'3','status'=>0));
		$data['kelas'] = $kelas;
		$data['id_acara'] = $id;
		
		$data['content'] = 'home.php';
		
		$this->load->view('main.php',$data,'');
	}
	
	public function test($id="",$kelas="")
	{
		$total_fbj = $this->Main_model->get_where('ticket',array('id_acara'=>$id,'kelas'=>$kelas));
		$no = 1;
		foreach ($total_fbj as $value)
		{
			echo $no++.". ";
			echo $value['nama_peserta'];
			echo "<br>";
			$detail_ticket = $this->Main_model->get_where('ticket_detail',array('ticket_id'=>$value['id']));
			foreach($detail_ticket as $ticketD)
			{
				echo $ticketD['jurusan_id'];
				echo "<br>";
				
			}
		}	
	}
	
	public function view($id="",$kelas="")
	{
		$data['getMajor'] = $this->Main_model->join('ticket_detail','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'ticket_detail.jurusan_id=jurusan.id'),array('table'=>'acara_jurusan','parameter'=>'ticket_detail.jurusan_id=acara_jurusan.id_jurusan')));
		$data['fbj_28_1'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('sesi'=>'1','id_acara'=>$id));
		$data['fbj_28_2'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('sesi'=>'2','id_acara'=>$id));
		$data['fbj_28_3'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('sesi'=>'3','id_acara'=>$id));
		$data['kelas'] = $kelas;
		$data['id_acara'] = $id;
		
		$data['content'] = 'list.php';
		$this->load->view('main.php',$data,'');
	}
	
	public function peserta($id="",$kelas=""){
		$data['getPeserta'] = $this->Main_model->get_where('ticket',array('id_acara'=>$id,'kelas'=>$kelas));
		$data['content'] = 'peserta.php';
		$data['kelas'] = $kelas;
		$data['id_acara'] = $id;
		
		$this->load->view('main.php',$data,'');
	}
	
	public function peserta_edit($id="",$kelas="",$id_peserta="")
	{
		$data['getPeserta'] = $this->Main_model->get_where('ticket',array('id_acara'=>$id,'kelas'=>$kelas,'id'=>$id_peserta));
		$data['fbj_28_1'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('id_acara'=>$id,'sesi'=>'1','status'=>0));
		$data['fbj_28_2'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('id_acara'=>$id,'sesi'=>'2','status'=>0));
		$data['fbj_28_3'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('id_acara'=>$id,'sesi'=>'3','status'=>0));
		$data['kelas'] = $kelas;
		$data['id_acara'] = $id;
		$data['id_peserta'] = $id_peserta;
		
		$data['content'] = 'peserta_edit.php';
		
		$this->load->view('main.php',$data,'');
	}
	
	public function lists()
	{
		$data['fbj_28_1'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('tanggal_acara'=>'2018-01-27','sesi'=>'1'));
		$data['fbj_28_2'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('tanggal_acara'=>'2018-01-27','sesi'=>'2'));
		$data['fbj_28_3'] = $this->Main_model->join('acara_jurusan','*,jurusan.id as idJurusan',array(array('table'=>'jurusan','parameter'=>'acara_jurusan.id_jurusan=jurusan.id'),array('table'=>'acara','parameter'=>'acara_jurusan.id_acara=acara.id')),array('tanggal_acara'=>'2018-01-27','sesi'=>'3'));
		$this->load->view('list.php',$data,'');
	}
	
	public function major()
	{		
		$data['acara'] = $this->Main_model->get('acara');
		$data['major'] = $this->Main_model->get('jurusan','','','major','asc');
		$data['content'] = 'major.php';
		$this->load->view('main.php',$data,'');
	}
	
	public function save_major()
	{
		$post = $this->input->post();
		$this->Main_model->insert_data('acara_jurusan',$post);
		redirect('main/major');
	}
	
	public function save_ticket()
	{
		$post = $this->input->post();
		$getMajor = $post['id_jurusan'];
		$sesi1 = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$getMajor[0],'id_acara'=>$post['id_acara'],'kelas'=>$post['kelas']),'','','','ticket.id');
		$sesi2 = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$getMajor[1],'id_acara'=>$post['id_acara'],'kelas'=>$post['kelas']),'','','','ticket.id');
		$sesi3 = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$getMajor[2],'id_acara'=>$post['id_acara'],'kelas'=>$post['kelas']),'','','','ticket.id');
		if (count($sesi1)>79 || count($sesi2)>79 || count($sesi3)>79){
			$this->session->set_flashdata('error', 'Jurusan yang ingin anda masuki sudah penuh. Silahkan registrasi ulang');
			redirect('Main/index/'.$post['id_acara'].'/'.$post['kelas']);
		} else {
			$post['created_date'] = date('Y-m-d H:i:s');
			$getMajor = $post['id_jurusan'];
			unset($post['id_jurusan']);
			$get_id = $this->Main_model->insert_data('ticket',$post);
			foreach($getMajor as $value){
				$ticket['ticket_id'] = $get_id;
				$ticket['jurusan_id'] = $value;
				$this->Main_model->insert_data('ticket_detail',$ticket);
			}
			
			$this->session->set_flashdata('success', 'Anda telah berhasil melakukan registrasi Festival Bedah Jurusan');
			redirect('Main/index/'.$post['id_acara'].'/'.$post['kelas']);		
		}
	}
	
	public function peserta_save()
	{
		$post = $this->input->post();
		print_r($post);
		$getMajor = $post['id_jurusan'];
		$sesi1 = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$getMajor[0],'id_acara'=>$post['id_acara'],'kelas'=>$post['kelas']),'','','','ticket.id');
		$sesi2 = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$getMajor[1],'id_acara'=>$post['id_acara'],'kelas'=>$post['kelas']),'','','','ticket.id');
		$sesi3 = $this->Main_model->join('ticket_detail','*',array(array('table'=>'ticket','parameter'=>'ticket.id=ticket_detail.ticket_id')),array('jurusan_id'=>$getMajor[2],'id_acara'=>$post['id_acara'],'kelas'=>$post['kelas']),'','','','ticket.id');
		if (count($sesi1)>79 || count($sesi2)>79 || count($sesi3)>79){
			$this->session->set_flashdata('error', 'Jurusan yang ingin anda masuki sudah penuh. Silahkan registrasi ulang');
			redirect('Main/peserta_edit/'.$post['id_acara'].'/'.$post['kelas'].'/'.$post['id']);
		} else {
			$this->Main_model->delete_data('ticket_detail',array('ticket_id'=>$post['id']));
			$post['created_date'] = date('Y-m-d H:i:s');
			$getMajor = $post['id_jurusan'];
			unset($post['id_jurusan']);
			$get_id = $this->Main_model->update_data('ticket',$post,array('id'=>$post['id']));
			foreach($getMajor as $value){
				$ticket['ticket_id'] = $post['id'];
				$ticket['jurusan_id'] = $value;
				$this->Main_model->insert_data('ticket_detail',$ticket);
			}
			
			$this->session->set_flashdata('success', 'Anda telah berhasil melakukan registrasi Festival Bedah Jurusan');
			redirect('Main/peserta_edit/'.$post['id_acara'].'/'.$post['kelas'].'/'.$post['id']);		
		}
	}
	
	public function peserta_delete($id)
	{
		$this->Main_model->delete_data('ticket',array('id'=>$id));
		$this->Main_model->delete_data('ticket_detail',array('ticket_id'=>$id));
		$this->load->library('user_agent');
		redirect($this->agent->referrer());
	}
	
	public function save_ticket_siang()
	{
		$post = $this->input->post();
		$post['created_date'] = date('Y-m-d H:i:s');
		$getMajor = $post['id_jurusan'];
		unset($post['id_jurusan']);
		$get_id = $this->Main_model->insert_data('ticket',$post);
		foreach($getMajor as $value){
			$ticket['ticket_id'] = $get_id;
			$ticket['jurusan_id'] = $value;
			$this->Main_model->insert_data('ticket_detail_siang',$ticket);
		}
		$this->session->set_flashdata('success', 'Anda telah berhasil melakukan registrasi Festival Bedah Jurusan');
		redirect('Main/index/'.$post['id_acara'].'/'.$post['kelas']);
	}
	
	
}
