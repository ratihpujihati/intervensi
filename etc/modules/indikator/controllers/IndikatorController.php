<?php
require_once 'Zend/Controller/Action.php';
require_once 'Zend/Session.php';
require_once 'Zend/Auth.php';
require_once "service/sso/Sso_User_Service.php";
require_once "service/penduduk/Data_Penduduk_Service.php";
require_once "service/menu/Menu_Service.php";

class Indikator_IndikatorController extends Zend_Controller_Action {
	
    public function init() {
       // Local to this controller only; affects all actions, as loaded in init:
	   //UNTUK SETTING GLOBAL BASE PATH
		$registry = Zend_Registry::getInstance();
		$this->auth = Zend_Auth::getInstance();	   
		$this->view->baseData = $registry->get('baseData');
		$this->view->basePath = $registry->get('basepath');
		$this->view->procPath = $registry->get('procpath');	 
		$this->sso_serv = Sso_User_Service::getInstance();
		$this->penduduk_serv = Data_Penduduk_Service::getInstance();
		$this->menu_serv = Menu_Service::getInstance();
		
		$ssouserpengguna = new Zend_Session_Namespace('ssouserpengguna');
		$ssouserpassword= new Zend_Session_Namespace('ssouserpassword');
		$ssouserKodeInstansi= new Zend_Session_Namespace('ssouserKodeInstansi');
		$ssouserlevel = new Zend_Session_Namespace('ssouserlevel');
		
		$this->pengguna =$ssouserpengguna->pengguna;			
		$this->password =$ssouserpassword->password;
		$this->KodeInstansi =$ssouserKodeInstansi->KodeInstansi;
		$this->level =$ssouserlevel->level;
    }
	
    public function indexAction() {
	
    }
	
	public function homeAction(){
		$this->view;	
		$this->view->menuKomponen = $this->menu_serv->getKomponen();
		$this->view->menuKomponenSub = $this->menu_serv->getKomponenSub();
		$this->view->menuKomponenSubDetail = $this->menu_serv->getKomponenSubDetail();
		$this->view->kelurahan = $this->menu_serv->getKelurahan();
		$this->view->kecamatan = $this->menu_serv->getKecamatan();
	}
	
	//MENAMPILKAN MENU
	public function menuAction(){
		$this->view->menuKomponen = $this->menu_serv->getKomponen();
		$this->view->menuKomponenSub = $this->menu_serv->getKomponenSub();
		$this->view->menuKomponenSubDetail = $this->menu_serv->getKomponenSubDetail();
		$this->view->kelurahan = $this->menu_serv->getKelurahan();
		$this->view->kecamatan = $this->menu_serv->getKecamatan();
		$this->view->indikatorMax = $this->menu_serv->getIndikatorMax();
		$this->view->indikatorMin = $this->menu_serv->getIndikatorMin();
	}
	
	//------------------------------------------------------------------------INDIKATOR MAXIMUM
	public function indikatormaxjsAction(){
		header('content-type : text/javascript');
		$this->render('indikatormaxjs');
    }
	
	public function indikatormaxmenuAction(){
		$currentPage = $_REQUEST['currentPage']; 
			
		if((!$currentPage) || ($currentPage == 'undefined'))
		{
			$currentPage = 1;
		} 
		
		$kategoriCari 	= $_REQUEST['kategoriCari']; 
		$katakunciCari 	= $_POST['carii'];
		$sortBy			= 'id_indikator';
		$sort			= 'asc';
		
		$dataMasukan = array("kategoriCari" => $kategoriCari,
							"katakunciCari" => $katakunciCari,
							"sortBy" => $sortBy,
							"sort" => $sort);
							 
		$numToDisplay = 10;
		$this->view->numToDisplay = $numToDisplay;
		$this->view->currentPage = $currentPage;
		$this->view->totIndikatorMax = $this->menu_serv->getcariindikatormax($dataMasukan,0,0,0);
		$this->view->indikatorMaxMenu = $this->menu_serv->getcariindikatormax($dataMasukan,$currentPage, $numToDisplay,$this->view->totIndikatorMax); 		
		$this->view->indikatorMaxList = $this->menu_serv->getindikatorMaxListAll();
	}
	
	public function indikatormaxformAction(){
		$this->view->jenisForm = $_REQUEST['jenisForm'];
		$id_indikator= $_REQUEST['id_indikator'];
		$this->view->id_indikator = $id_indikator;
		$this->view->namaIndikator = $this->menu_serv->getNamaIndikatorMax($id_indikator);
		$this->view->dataIndikatorMaxTarget = $this->menu_serv->getDataIndikatorMaxTarget($id_indikator);
		$this->view->dataIndikatorMaxKelurahan = $this->menu_serv->getDataIndikatorMaxKelurahan($id_indikator);
		//$this->view->goalList = $this->menu_serv->getGoalListAll();
	}
	
	public function indikatormaxformeditAction(){
			
			//table form_isian_target
			$id_indikator = $_POST['id_indikator'];
			$target = $_POST['target'];
			$jawa_barat = $_POST['jawa_barat'];
			$nasional = $_POST['nasional'];
			$cimahi = $_POST['cimahi'];
			
			$datamasukanformisiantarget = array(
				"id_indikator" 			=> $id_indikator,
				"target"				=> $target,
				"jawa_barat"	       	=> $jawa_barat,
				"nasional"	       		=> $nasional,
				"cimahi"	   			=> $cimahi
			);
					
			// var_dump($datamasukanprogramkelurahan);
			$this->view->formisiantarget = $this->menu_serv->getsimpanformisiantargetedit($datamasukanformisiantarget);
					
			// table form_isian_kelurahan
			if($_POST['form_isian_kelurahan']!="")
			{
				foreach($_POST['form_isian_kelurahan'] as $i)
				{
					/*query insert ke database taruh disini
					mysql_query = "insert into tbl_barang (kd_brng,nm_brng,hrga) values('$_POST['kode_barang_'.$i]','$_POST['nama_barang_'.$i]','$_POST['harga_barang_'.$i]')";
					*/
				
					$id_form_isian_kelurahan = $_POST['id_form_isian_kelurahan_'.$i];
					$nilai_kelurahan = $_POST['nilai_kelurahan_'.$i];
		
					
					$datamasukanformisiankelurahan = array(
						"id_form_isian_kelurahan" 		=> $id_form_isian_kelurahan,
						"nilai_kelurahan"				=> $nilai_kelurahan
					);
					
				// var_dump($datamasukanprogramkelurahan);
				$this->view->formisiankelurahan = $this->kegiatan_serv->getsimpandatamasukanformisiankelurahanedit($datamasukanformisiankelurahan);
				
				// var_dump($this->view->programkelurahanInsert);
				}
				
			}// END PROGRAM KELURAHAN PUSAT
			
			$this->view->proses = "2";	
			$this->view->keterangan = "Indikator";
			$this->view->hasil = $this->view->formisiantarget.$this->view->formisiankelurahan ;
			
			$this->indikatormaxmenuAction();
			$this->render('indikatormaxmenu');	
			
	}
	//------------------------------------------------------------------------END MAXIMUM
	
	//------------------------------------------------------------------------INDIKATOR MINIMUM
	public function indikatorminjsAction(){
		header('content-type : text/javascript');
		$this->render('indikatorminjs');
    }
	
	public function indikatorminmenuAction(){
		$currentPage = $_REQUEST['currentPage']; 
			
		if((!$currentPage) || ($currentPage == 'undefined'))
		{
			$currentPage = 1;
		} 
		
		$kategoriCari 	= $_REQUEST['kategoriCari']; 
		$katakunciCari 	= $_POST['carii'];
		$sortBy			= 'id_indikator';
		$sort			= 'asc';
		
		$dataMasukan = array("kategoriCari" => $kategoriCari,
							"katakunciCari" => $katakunciCari,
							"sortBy" => $sortBy,
							"sort" => $sort);
							 
		$numToDisplay = 10;
		$this->view->numToDisplay = $numToDisplay;
		$this->view->currentPage = $currentPage;
		$this->view->totIndikatorMin = $this->menu_serv->getcariindikatormin($dataMasukan,0,0,0);
		$this->view->indikatorMinMenu = $this->menu_serv->getcariindikatormin($dataMasukan,$currentPage, $numToDisplay,$this->view->totIndikatorMin); 		
		$this->view->indikatorMinList = $this->menu_serv->getindikatorMinListAll();
	}
	
	public function indikatorminformAction(){
		$this->view->jenisForm = $_REQUEST['jenisForm'];
		$id_indikator= $_REQUEST['id_indikator'];
		$this->view->id_indikator = $id_indikator;
		$this->view->namaIndikator = $this->menu_serv->getNamaIndikatorMin($id_indikator);
		$this->view->dataIndikatorMinTarget = $this->menu_serv->getDataIndikatorMinTarget($id_indikator);
		$this->view->dataIndikatorMinKelurahan = $this->menu_serv->getDataIndikatorMinKelurahan($id_indikator);
	}
	//------------------------------------------------------------------------END MINIMUM
	
	//------------------------------------------------------------------------INDIKATOR AJA	
	public function indikatorjsAction(){
		header('content-type : text/javascript');
		$this->render('indikatorjs');
    }
	
	public function indikatormenuAction(){
		$currentPage = $_REQUEST['currentPage']; 
			
		if((!$currentPage) || ($currentPage == 'undefined'))
		{
			$currentPage = 1;
		} 
		
		$kategoriCari 	= $_REQUEST['kategoriCari']; 
		$katakunciCari 	= $_POST['carii'];
		$sortBy			= 'id_indikator';
		$sort			= 'asc';
		
		$dataMasukan = array("kategoriCari" => $kategoriCari,
							"katakunciCari" => $katakunciCari,
							"sortBy" => $sortBy,
							"sort" => $sort);
							 
		$numToDisplay = 10;
		$this->view->numToDisplay = $numToDisplay;
		$this->view->currentPage = $currentPage;
		$this->view->totIndikator = $this->menu_serv->getcariindikator($dataMasukan,0,0,0);
		$this->view->indikatorMenu = $this->menu_serv->getcariindikator($dataMasukan,$currentPage, $numToDisplay,$this->view->totIndikator); 		
		
	}
	public function indikatorolahdataAction(){
		$this->view->jenisForm = $_REQUEST['jenisForm'];
		$id_indikator= $_REQUEST['id_indikator'];
		$this->view->id_indikator = $id_indikator;
		$this->view->indikatorMenu = $this->menu_serv->getindikatoredit($id_indikator);
		$this->view->goalList = $this->menu_serv->getGoalListAll();
	}
	
	public function simpanindikatorAction(){
		$kode_indikator = $_POST['kode_indikator'];
		$id_goal = $_POST['id_goal'];
		$nama_indikator = $_POST['nama_indikator'];
		$definisi = $_POST['definisi'];
		$manfaat = $_POST['manfaat'];
		$sumber_data = $_POST['sumber_data'];
		$nilai_target = $_POST['nilai_target'];
		$kategori = $_POST['kategori'];
		
		$dataMasukan = array("kode_indikator" => $kode_indikator,
							 "id_goal" => $id_goal,
							 "nama_indikator" => $nama_indikator,
							 "definisi" => $definisi,
							 "manfaat" => $manfaat,
							 "sumber_data" => $sumber_data,
							 "nilai_target" => $nilai_target,
							 "kategori" => $kategori);
									 
		$this->view->indikatorInsert = $this->menu_serv->getsimpanindikator($dataMasukan);
		$this->view->proses = "1";	
		$this->view->keterangan = "Indikator";		
		$this->view->hasil = $this->view->indikatorInsert;
		
		$this->indikatormenuAction();
		$this->render('indikatormenu');	
	}
	
	public function simpanindikatoreditAction(){
		$id_indikator = $_POST['id_indikator'];
		$kode_indikator = $_POST['kode_indikator'];
		$id_goal = $_POST['id_goal'];
		$nama_indikator = $_POST['nama_indikator'];
		$definisi = $_POST['definisi'];
		$manfaat = $_POST['manfaat'];
		$sumber_data = $_POST['sumber_data'];
		$nilai_target = $_POST['nilai_target'];
		$kategori = $_POST['kategori'];
		
		$dataMasukan = array("kode_indikator" => $kode_indikator,
							"id_indikator" => $id_indikator,
							 "id_goal" => $id_goal,
							 "nama_indikator" => $nama_indikator,
							 "definisi" => $definisi,
							 "manfaat" => $manfaat,
							 "sumber_data" => $sumber_data,
							 "nilai_target" => $nilai_target,
							 "kategori" => $kategori);
		$this->view->ubahIndikator = $this->menu_serv->getsimpanindikatoredit($dataMasukan);
		$this->view->proses = "2";	
		$this->view->keterangan = "Indikator";
		$this->view->hasil = $this->view->ubahIndikator;
		
		$this->indikatormenuAction();
		$this->render('indikatormenu');	
	}
	
	public function indikatorhapusAction(){
		$id_indikator= $_REQUEST['id_indikator'];
		//echo $user_id;
		$dataMasukan = array("id_indikator" => $id_indikator);
		
		$this->view->indikatorUpdate = $this->menu_serv->gethapusindikator($id_indikator);
		$this->view->proses = "3";	
		$this->view->keterangan = "Indikator";
		$this->view->hasil = $this->view->indikatorUpdate;		
		
		$this->indikatormenuAction();
		$this->render('indikatormenu');	
	}
	
	
}
?>