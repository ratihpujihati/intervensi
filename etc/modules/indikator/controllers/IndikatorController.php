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
	//------------------------------------------------------------------------END MINIMUM
	
	public function kotaolahdataAction(){
		$this->view->jenisForm = $_REQUEST['jenisForm'];
		$kode_kota= $_REQUEST['kode_kota'];
		$this->view->kotaMenu = $this->menu_serv->getkotaedit($kode_kota);
	}
	
	public function simpankotaAction(){
		$kode_kota = $_POST['kode_kota'];
		$kota = $_POST['kota'];
		
		$dataMasukan = array("kode_kota" => $kode_kota,
							 "kota" => $kota);
									 
		$this->view->kotaInsert = $this->menu_serv->getsimpankota($dataMasukan);
		$this->view->proses = "1";	
		$this->view->keterangan = "Kota";		
		$this->view->hasil = $this->view->kotaInsert;
		
		$this->kotamenuAction();
		$this->render('kotamenu');	
	}
	
	public function simpankotaeditAction(){
		$kode_kota = $_POST['kode_kota'];
		$kota = $_POST['kota'];
		
		$dataMasukan = array("kode_kota" => $kode_kota,
							 "kota" => $kota);
									 
		$this->view->ubahKota = $this->menu_serv->getsimpankotaedit($dataMasukan);
		$this->view->proses = "2";	
		$this->view->keterangan = "Kota";
		$this->view->hasil = $this->view->ubahKota;
		
		$this->kotamenuAction();
		$this->render('kotamenu');	
	}
	
	public function kotahapusAction(){
		$kode_kota= $_REQUEST['kode_kota'];
		//echo $user_id;
		$dataMasukan = array("kode_kota" => $kode_kota);
		
		$this->view->kotaUpdate = $this->menu_serv->gethapuskota($kode_kota);
		$this->view->proses = "3";	
		$this->view->keterangan = "Kota";
		$this->view->hasil = $this->view->kotaUpdate;		
		
		$this->kotamenuAction();
		$this->render('kotamenu');	
	}
}
?>