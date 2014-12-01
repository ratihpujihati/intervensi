<?php
class menu_Service {
    private static $instance;
  
    private function __construct() {
    }

    public static function getInstance() {
       if (!isset(self::$instance)) {
           $c = __CLASS__;
           self::$instance = new $c;
       }
       return self::$instance;
    }
	
	//MENU KOMPONEN
	public function getKomponen(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_komponen");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getsimpankomponen(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("KodeKomponen" => $dataMasukan['KodeKomponen'],
								"Komponen" => $dataMasukan['Komponen'],
								"Urut" => $dataMasukan['Urut']);
			
			$db->insert('m_komponen',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getdetailkomponen($KodeKomponen, array $dataMasukan, $pageNumber, $itemPerPage, $total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		//$KodeKomponen 	= $dataMasukan['KodeKomponen'];
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			//$whereOpt = " where KodeKomponen = '$KodeKomponen' and ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != ""){$where = $whereOpt;} 
			$order = " order by KodeSubKomponen";
			$sqlProses = "select * from m_komponen_sub where KodeKomponen = '$KodeKomponen'";	
			$sqlProses1 = $sqlProses.$order;
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("KodeSubKomponen"  	=>(string)$result[$j]->KodeSubKomponen,
										"SubKomponen"  	=>(string)$result[$j]->SubKomponen,
										"KodeKomponen"  	=>(string)$result[$j]->KodeKomponen);
			}	
			return $hasilAkhir;  
			
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	public function getkomponenedit($KodeKomponen){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where KodeKomponen = '$KodeKomponen' ";
			$sqlProses = "select * from m_komponen";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("KodeKomponen"  	=>(string)$result->KodeKomponen,
								"Komponen"  		=>(string)$result->Komponen,
								"Urut"  	        =>(string)$result->Urut
								
								);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpankomponenedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("KodeKomponen" => $dataMasukan['KodeKomponen'],
								"Komponen" => $dataMasukan['Komponen'],
								"Urut" => $dataMasukan['Urut']);
			
			$where[] = " KodeKomponen = '".$dataMasukan['KodeKomponen']."'";
			
			$db->update('m_komponen',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function gethapuskomponen($KodeKomponen) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " KodeKomponen = '".$KodeKomponen."'";
			
			$db->delete('m_komponen', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcarikomponen(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " where ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by KodeKomponen ";
			$sqlProses = "select * from m_komponen".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("KodeKomponen"  	=>(string)$result[$j]->KodeKomponen,
										"Komponen"  	=>(string)$result[$j]->Komponen,
										"Urut"  	=>(string)$result[$j]->Urut);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
		
	}
	
	//----------------------------------------------------------------------------------------------
	//MENU KOMPONEN SUB
	public function getKomponenListAll() {
	
	   $registry = Zend_Registry::getInstance();
	   $db = $registry->get('db');
	   try {
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result = $db->fetchAll('SELECT * FROM m_komponen order by KodeKomponen');
				
		 
         $jmlResult = count($result);
		 return $result;
	    } catch (Exception $e) {
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}	
	
	public function getdetailkomponensub($KodeSubKomponen, array $dataMasukan, $pageNumber, $itemPerPage, $total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			//$whereOpt = " where KodeKomponen = '$KodeKomponen' and ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != ""){$where = $whereOpt;} 
			$order = " order by KodeDetailSubKomponen";
			$sqlProses = "select * from m_komponen_sub_detail where KodeSubKomponen = '$KodeSubKomponen'";	
			$sqlProses1 = $sqlProses.$order;
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("KodeDetailSubKomponen"  	=>(string)$result[$j]->KodeDetailSubKomponen,
										"SubKomponenDetail"  	=>(string)$result[$j]->SubKomponenDetail,
										"Satuan"  	=>(string)$result[$j]->Satuan,
										"KodeSubKomponen"  	=>(string)$result[$j]->KodeSubKomponen,
										"TotalQuality"  	=>(string)$result[$j]->TotalQuality,
										"IDRTotalCost"  	=>(string)$result[$j]->IDRTotalCost,
										"USDTotalCost"  	=>(string)$result[$j]->USDTotalCost,
										"IDBUSDShare"  	=>(string)$result[$j]->IDBUSDShare);
			}	
			return $hasilAkhir;  
			
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	public function getKomponenSub(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_komponen_sub");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getsimpankomponensub(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("KodeSubKomponen" => $dataMasukan['KodeSubKomponen'],
								"SubKomponen" => $dataMasukan['SubKomponen'],
								"KodeKomponen" => $dataMasukan['KodeKomponen']);
			
			$db->insert('m_komponen_sub',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getkomponensubedit($KodeSubKomponen){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where KodeSubKomponen = '$KodeSubKomponen' ";
			$sqlProses = "select * from m_komponen_sub";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("KodeSubKomponen"  	=>(string)$result->KodeSubKomponen,
								"SubKomponen"  		=>(string)$result->SubKomponen,
								"KodeKomponen"  	=>(string)$result->KodeKomponen);
			return $hasilAkhir;			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpankomponensubedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("KodeSubKomponen" => $dataMasukan['KodeSubKomponen'],
								"SubKomponen" => $dataMasukan['SubKomponen'],
								"KodeKomponen" => $dataMasukan['KodeKomponen']);
			
			$where[] = " KodeSubKomponen = '".$dataMasukan['KodeSubKomponen']."'";
			
			$db->update('m_komponen_sub',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function gethapuskomponensub($KodeSubKomponen) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " KodeSubKomponen = '".$KodeSubKomponen."'";
			
			$db->delete('m_komponen_sub', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcarikomponensub(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " where ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by KodeSubKomponen ";
			$sqlProses = "select * from m_komponen_sub".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("KodeSubKomponen"  	=>(string)$result[$j]->KodeSubKomponen,
										"SubKomponen"  	=>(string)$result[$j]->SubKomponen,
										"KodeKomponen"  	=>(string)$result[$j]->KodeKomponen);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	//------------------------------------------------------------------------------------------------------
	//MENU KOMPONEN SUB DETAIL
	public function getSubKomponenListAll() {
	
	   $registry = Zend_Registry::getInstance();
	   $db = $registry->get('db');
	   try {
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result = $db->fetchAll('SELECT * FROM m_komponen_sub order by KodeSubKomponen');
		$jmlResult = count($result);
		 return $result;
	    } catch (Exception $e) {
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}	
	
	public function getKomponenSubDetail(){   
		
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_komponen_sub_detail");
				return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getsimpankomponensubdetail(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("KodeDetailSubKomponen" => $dataMasukan['KodeDetailSubKomponen'],
								"SubKomponenDetail" => $dataMasukan['SubKomponenDetail'],
								"Satuan" => $dataMasukan['Satuan'],
								"KodeSubKomponen" => $dataMasukan['KodeSubKomponen'],
								"TotalQuality" => $dataMasukan['TotalQuality'],
								"IDRTotalCost" => $dataMasukan['IDRTotalCost'],
								"USDTotalCost" => $dataMasukan['USDTotalCost'],
								"IDBUSDShare" => $dataMasukan['IDBUSDShare']);
			
			$db->insert('m_komponen_sub_detail',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getkomponensubdetailedit($KodeDetailSubKomponen){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where KodeDetailSubKomponen = '$KodeDetailSubKomponen' ";
			$sqlProses = "select * from m_komponen_sub_detail";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("KodeDetailSubKomponen"  	=>(string)$result->KodeDetailSubKomponen,
								"SubKomponenDetail"  		=>(string)$result->SubKomponenDetail,
								"Satuan"  	=>(string)$result->Satuan,
								"KodeSubKomponen"  	=>(string)$result->KodeSubKomponen,
								"TotalQuality"  	=>(string)$result->TotalQuality,
								"IDRTotalCost"  	=>(string)$result->IDRTotalCost,
								"USDTotalCost"  	=>(string)$result->USDTotalCost,
								"IDBUSDShare"  	=>(string)$result->IDBUSDShare);
			return $hasilAkhir;	
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpankomponensubdetailedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("KodeDetailSubKomponen" => $dataMasukan['KodeDetailSubKomponen'],
								"SubKomponenDetail" => $dataMasukan['SubKomponenDetail'],
								"Satuan" => $dataMasukan['Satuan'],
								"KodeSubKomponen" => $dataMasukan['KodeSubKomponen'],
								"TotalQuality" => $dataMasukan['TotalQuality'],
								"IDRTotalCost" => $dataMasukan['IDRTotalCost'],
								"USDTotalCost" => $dataMasukan['USDTotalCost'],
								"IDBUSDShare" => $dataMasukan['IDBUSDShare']);
			
			$where[] = " KodeDetailSubKomponen = '".$dataMasukan['KodeDetailSubKomponen']."'";
			
			$db->update('m_komponen_sub_detail',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function gethapuskomponensubdetail($KodeDetailSubKomponen) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " KodeDetailSubKomponen = '".$KodeDetailSubKomponen."'";
			
			$db->delete('m_komponen_sub_detail', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function getcarikomponensubdetail(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " where ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by KodeDetailSubKomponen ";
			$sqlProses = "select * from m_komponen_sub_detail ".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("KodeDetailSubKomponen"  	=>(string)$result[$j]->KodeDetailSubKomponen,
										"SubKomponenDetail"  	=>(string)$result[$j]->SubKomponenDetail,
										"Satuan"  	=>(string)$result[$j]->Satuan,
										"KodeSubKomponen"  	=>(string)$result[$j]->KodeSubKomponen,
										"TotalQuality"  	=>(string)$result[$j]->TotalQuality,
										"IDRTotalCost"  	=>(string)$result[$j]->IDRTotalCost,
										"USDTotalCost"  	=>(string)$result[$j]->USDTotalCost,
										"IDBUSDShare"  	=>(string)$result[$j]->IDBUSDShare);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	//--------------------------------------------------------------------------------------------------------------------
	//MENU KELURAHAN
	public function getKelurahanbyIndikator($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
			
			$whereOpt = " and (ik.id_indikator like '%$id_indikator%')";
			if($id_indikator != "") { $where = $whereOpt;} 
			
			$result = $db->fetchAll("select k.* from m_kelurahan k, form_isian_kelurahan ik where k.kode_kelurahan=ik.kode_kelurahan and ik.warna_indikator=2 ".$where);
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getKelurahan(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_kelurahan");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getsimpankelurahan(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_kelurahan" => $dataMasukan['kode_kelurahan'],
								"Kelurahan" => $dataMasukan['Kelurahan']);
			
			$db->insert('m_kelurahan',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getkelurahanedit($kode_kelurahan){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where kec.kode_kecamatan = kel.kode_kecamatan and kel.kode_kelurahan = '$kode_kelurahan' ";
			$sqlProses = "select kel.*, kec.* from m_kelurahan kel, m_kecamatan kec";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("kode_kelurahan"  	=>(string)$result->kode_kelurahan,
								"kode_kecamatan"  	=>(string)$result->kode_kecamatan, 
								"Kelurahan"  	=>(string)$result->Kelurahan);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpankelurahanedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_kelurahan" => $dataMasukan['kode_kelurahan'],
								"Kelurahan" => $dataMasukan['Kelurahan']);
			
			$where[] = " kode_kelurahan = '".$dataMasukan['kode_kelurahan']."'";
			
			$db->update('m_kelurahan',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function gethapuskelurahan($kode_kelurahan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " kode_kelurahan = '".$kode_kelurahan."'";
			
			$db->delete('m_kelurahan', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcarikelurahan(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = "  and ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by kel.kode_kelurahan";
			$sqlProses = "select kel.kode_kelurahan, kel.Kelurahan , kec.nama_kecamatan from m_kelurahan kel, m_kecamatan kec 
						  where kec.kode_kecamatan = kel.kode_kecamatan".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("kode_kelurahan"  	=>(string)$result[$j]->kode_kelurahan,
										"nama_kecamatan"  	=>(string)$result[$j]->nama_kecamatan,
										"Kelurahan"  	=>(string)$result[$j]->Kelurahan);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	
	//---------------------------------------------------------------------------------------------------------------------
	//MENU KECAMATAN
	public function getKecamatan(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_kecamatan");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getsimpankecamatan(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_kecamatan" => $dataMasukan['kode_kecamatan'],
								"nama_kecamatan" => $dataMasukan['nama_kecamatan']);
			
			$db->insert('m_kecamatan',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getkecamatanedit($kode_kecamatan){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where kode_kecamatan = '$kode_kecamatan' ";
			$sqlProses = "select * from m_kecamatan";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("kode_kecamatan"  	=>(string)$result->kode_kecamatan,
								"nama_kecamatan"  	=>(string)$result->nama_kecamatan);
			return $hasilAkhir;				
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpankecamatanedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_kecamatan" => $dataMasukan['kode_kecamatan'],
								"nama_kecamatan" => $dataMasukan['nama_kecamatan']);
			
			$where[] = " kode_kecamatan = '".$dataMasukan['kode_kecamatan']."'";
			
			$db->update('m_kecamatan',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function gethapuskecamatan($kode_kecamatan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " kode_kecamatan = '".$kode_kecamatan."'";
			
			$db->delete('m_kecamatan', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcarikecamatan(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " where ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by kode_kecamatan ";
			$sqlProses = "select * from m_kecamatan".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("kode_kecamatan"  	=>(int)$result[$j]->kode_kecamatan,
										"nama_kecamatan"  	=>(string)$result[$j]->nama_kecamatan);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	public function getKecamatanListAll() {
	
	   $registry = Zend_Registry::getInstance();
	   $db = $registry->get('db');
	   try {
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result = $db->fetchAll('SELECT * FROM m_kecamatan order by kode_kecamatan');
				
		 
         $jmlResult = count($result);
		 return $result;
	    } catch (Exception $e) {
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}
	
	//----------------------------------------------------------------------------------------------------
	//MENU PROVINSI
	public function getProvinsi(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_provinsi");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getsimpanprovinsi(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_provinsi" => $dataMasukan['kode_provinsi'],
								"provinsi" => $dataMasukan['provinsi']);
			
			$db->insert('m_provinsi',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getprovinsiedit($kode_provinsi){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where kode_provinsi = '$kode_provinsi' ";
			$sqlProses = "select * from m_provinsi";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("kode_provinsi"  	=>(string)$result->kode_provinsi,
								"provinsi"  	=>(string)$result->provinsi);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpanprovinsiedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_provinsi" => $dataMasukan['kode_provinsi'],
								"provinsi" => $dataMasukan['provinsi']);
			
			$where[] = " kode_provinsi = '".$dataMasukan['kode_provinsi']."'";
			
			$db->update('m_provinsi',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function gethapusprovinsi($kode_provinsi) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " kode_provinsi = '".$kode_provinsi."'";
			
			$db->delete('m_provinsi', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcariprovinsi(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " where ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by kode_provinsi ";
			$sqlProses = "select * from m_provinsi".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("kode_provinsi"  	=>(string)$result[$j]->kode_provinsi,
										"provinsi"  	=>(string)$result[$j]->provinsi);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//MENU KOTA
	public function getKota(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_kota");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getsimpankota(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_kota" => $dataMasukan['kode_kota'],
								"kota" => $dataMasukan['kota']);
			
			$db->insert('m_kota',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getkotaedit($kode_kota){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where kode_kota = '$kode_kota' ";
			$sqlProses = "select * from m_kota";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("kode_kota"  	=>(string)$result->kode_kota,
								"kota"  	=>(string)$result->kota);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpankotaedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_kota" => $dataMasukan['kode_kota'],
								"kota" => $dataMasukan['kota']);
			
			$where[] = " kode_kota = '".$dataMasukan['kode_kota']."'";
			
			$db->update('m_kota',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function gethapuskota($kode_kota) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " kode_kota = '".$kode_kota."'";
			
			$db->delete('m_kota', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcarikota(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " where ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by kode_kota ";
			$sqlProses = "select * from m_kota".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("kode_kota"  	=>(string)$result[$j]->kode_kota,
										"kota"  	=>(string)$result[$j]->kota);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//MENU PENGGUNA
	public function getPengguna(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from pengguna");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getInstansiListAll() {
	
	   $registry = Zend_Registry::getInstance();
	   $db = $registry->get('db');
	   try {
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result = $db->fetchAll('SELECT * FROM m_instansi order by Instansi');
				
		 
         $jmlResult = count($result);
		 return $result;
	    } catch (Exception $e) {
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}
	
	public function getsimpanpengguna(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("pengguna" => $dataMasukan['pengguna'],
								"password" => $dataMasukan['password'],
								"KodeInstansi" => $dataMasukan['KodeInstansi'],
								"level" => $dataMasukan['level']					
								);
			
			$db->insert('pengguna',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getpenggunaedit($id){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where id = '$id' ";
			$sqlProses = "select * from pengguna";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);	
			
			$hasilAkhir = array("id"  	=>(string)$result->id,
								"pengguna"  	=>(string)$result->pengguna,
								"password"  	=>(string)$result->password,
								"KodeInstansi"  	=>(string)$result->KodeInstansi,
								"level"  	=>(string)$result->level								
								);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpanpenggunaedit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("pengguna" => $dataMasukan['pengguna'],
								"password" => $dataMasukan['password'],
								"KodeInstansi" => $dataMasukan['KodeInstansi'],
								"level" => $dataMasukan['level']					
								);
			
			$where[] = " id = '".$dataMasukan['id']."'";
			
			$db->update('pengguna',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function gethapuspengguna($id) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " id = '".$id."'";
			
			$db->delete('pengguna', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcaripengguna(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " and ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by p.pengguna ";
			$sqlProses = "select p.*, i.Instansi from pengguna p, m_instansi i where p.KodeInstansi=i.KodeInstansi".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("id"  	=>(string)$result[$j]->id,
								"pengguna"  =>(string)$result[$j]->pengguna,
								"password"  =>(string)$result[$j]->password,
								"KodeInstansi"  	=>(string)$result[$j]->KodeInstansi,
								"Instansi"  	=>(string)$result[$j]->Instansi,
								"level"  	=>(string)$result[$j]->level							
								);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//MENU INDIKATOR
	public function getIndikator(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_indikator");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getGoalListAll() {	
	   $registry = Zend_Registry::getInstance();
	   $db = $registry->get('db');
	   try {
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result = $db->fetchAll('select * from m_goal');
				
		 
         $jmlResult = count($result);
		 return $result;
	    } catch (Exception $e) {
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}
	
	public function getsimpanindikator(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_indikator" => $dataMasukan['kode_indikator'],
								"id_goal" => $dataMasukan['id_goal'],
								"nama_indikator" => $dataMasukan['nama_indikator'],
								"definisi" => $dataMasukan['definisi'],
								"manfaat" => $dataMasukan['manfaat'],
								"sumber_data" => $dataMasukan['sumber_data'],
								"nilai_target" => $dataMasukan['nilai_target'],
								"kategori" => $dataMasukan['kategori']					
								);
			
			$db->insert('m_indikator',$paramInput);
			$db->commit();
			return 'sukses';
		} catch (Exception $e) {
			 $db->rollBack();
			 echo $e->getMessage().'<br>';
			 return 'gagal';
		}
	}	
	
	public function getindikatoredit($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where id_indikator = '$id_indikator' ";
			$sqlProses = "select * from m_indikator";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);
			
			$hasilAkhir = array("kode_indikator"  	=>(string)$result->kode_indikator,
								"id_indikator"  	=>(string)$result->id_indikator,
								"id_goal"  	=>(string)$result->id_goal,
								"nama_indikator"  	=>(string)$result->nama_indikator,
								"definisi"  	=>(string)$result->definisi,
								"manfaat"  	=>(string)$result->manfaat,
								"sumber_data"  	=>(string)$result->sumber_data,
								"nilai_target"  	=>(string)$result->nilai_target,
								"kategori"  	=>(string)$result->kategori						
								);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getsimpanindikatoredit(array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("kode_indikator" => $dataMasukan['kode_indikator'],
								"id_goal" => $dataMasukan['id_goal'],
								"nama_indikator" => $dataMasukan['nama_indikator'],
								"definisi" => $dataMasukan['definisi'],
								"manfaat" => $dataMasukan['manfaat'],
								"sumber_data" => $dataMasukan['sumber_data'],
								"nilai_target" => $dataMasukan['nilai_target'],
								"kategori" => $dataMasukan['kategori']					
								);
			
			$where[] = " id_indikator = '".$dataMasukan['id_indikator']."'";
			
			$db->update('m_indikator',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}	
	
	public function gethapusindikator($id_indikator) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$where[] = " id_indikator = '".$id_indikator."'";
			
			$db->delete('m_indikator', $where);
			$db->commit();
			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	public function getcariindikator(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = "and ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by kode_indikator ";
			$sqlProses = "select i.*, g.goal from m_indikator i, m_goal g where i.id_goal=g.id_goal ".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("id_indikator"  	=>(string)$result[$j]->id_indikator,
										"kode_indikator"  	=>(string)$result[$j]->kode_indikator,
										"goal"  	=>(string)$result[$j]->goal,
										"nama_indikator"  	=>(string)$result[$j]->nama_indikator,
										"definisi"  	=>(string)$result[$j]->definisi,
										"manfaat"  	=>(string)$result[$j]->manfaat,
										"sumber_data"  	=>(string)$result[$j]->sumber_data,
										"nilai_target"  	=>(string)$result[$j]->nilai_target,
										"kategori"  	=>(string)$result[$j]->kategori,
										);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//INDIKATOR MAXIMUM 1
	public function getIndikatorMax(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_indikator where kategori = 1");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getindikatorMaxListAll() {	
	   $registry = Zend_Registry::getInstance();
	   $db = $registry->get('db');
	   try {
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result = $db->fetchAll('select * from m_indikator where kategori = 1');
				
		 
         $jmlResult = count($result);
		 return $result;
	    } catch (Exception $e) {
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}	
	
	public function getcariindikatormax(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " and ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by kode_indikator ";
			$sqlProses = "select i.*, g.goal from m_indikator i, m_goal g where i.id_goal=g.id_goal and i.kategori = 1".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("id_indikator"  	=>(string)$result[$j]->id_indikator,
										"kode_indikator"  	=>(string)$result[$j]->kode_indikator,
										"goal"  	=>(string)$result[$j]->goal,
										"nama_indikator"  	=>(string)$result[$j]->nama_indikator,
										"definisi"  	=>(string)$result[$j]->definisi,
										"manfaat"  	=>(string)$result[$j]->manfaat,
										"sumber_data"  	=>(string)$result[$j]->sumber_data,
										"nilai_target"  	=>(string)$result[$j]->nilai_target,
										"kategori"  	=>(string)$result[$j]->kategori,
										);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	public function getDataIndikatorMaxTarget($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where id_indikator = '$id_indikator' ";
			$sqlProses = "select * from form_isian_target";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);
			
			$hasilAkhir = array("id_form_isian_target"  	=>(string)$result->id_form_isian_target,
								"id_indikator"  	=>(string)$result->id_indikator,
								"target"  	=>(string)$result->target,
								"nasional"  	=>(string)$result->nasional,
								"jawa_barat"  	=>(string)$result->jawa_barat,
								"cimahi"  	=>(string)$result->cimahi					
								);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getDataIndikatorMaxKelurahan($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " and f.id_indikator = '$id_indikator' ";
			$sqlProses = "select i.kategori, f.*, k.Kelurahan as Kelurahan from form_isian_kelurahan f, m_kelurahan k, m_indikator i  where f.kode_kelurahan = k.kode_kelurahan and i.id_indikator = f.id_indikator ";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchAll($sqlData);
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
			$hasilAkhir[$j] = array("id_form_isian_kelurahan"  	=>(string)$result[$j]->id_form_isian_kelurahan,
								"id_indikator"  	=>(string)$result[$j]->id_indikator,
								"Kelurahan"  	=>(string)$result[$j]->Kelurahan,
								"nilai_kelurahan"  	=>(string)$result[$j]->nilai_kelurahan,			
								"kategori"  	=>(string)$result[$j]->kategori			
								);
			}
			return $hasilAkhir;			
			
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getNamaIndikatorMax($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where id_indikator = '$id_indikator' ";
			$sqlProses = "select * from m_indikator";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);
			
			$hasilAkhir = array("id_indikator"  	=>(string)$result->id_indikator,
								"kode_indikator"  	=>(string)$result->kode_indikator,
								"nama_indikator"  	=>(string)$result->nama_indikator					
								);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}

	public function getHasil($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " and f.id_indikator = '$id_indikator' ";
			$sqlProses = "select k.Kelurahan, f.warna_indikator, f.hasil_nii, f.nilai_kelurahan, i.id_indikator 
						from m_kelurahan k, form_isian_kelurahan f, m_indikator i 
						where k.kode_kelurahan = f.kode_kelurahan and i.id_indikator = f.id_indikator";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchAll($sqlData);
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("Kelurahan"  	=>(string)$result[$j]->Kelurahan,
										"hasil"  		=>(string)$result[$j]->hasil,
										"warna_indikator"  		=>(string)$result[$j]->warna_indikator,
										"nilai_kelurahan"  	=>(string)$result[$j]->nilai_kelurahan	
									);
				}
			return $hasilAkhir;			
			
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getDataHitung($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " and it.id_indikator = '$id_indikator' ";
			$sqlProses = "select ik.nilai_kelurahan, ik.hasil_nii, ik.warna_indikator, 
						it.target, k.Kelurahan, i.kategori
						from m_kelurahan k, form_isian_kelurahan ik, form_isian_target it, m_indikator i 
						where k.kode_kelurahan = ik.kode_kelurahan and i.id_indikator = it.id_indikator
						and i.id_indikator = ik.id_indikator and ik.id_indikator = '$id_indikator' ";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchAll($sqlData);
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("Kelurahan"  	=>(string)$result[$j]->Kelurahan,
										"id_indikator"  		=>(string)$result[$j]->id_indikator,
										"kategori"  		=>(string)$result[$j]->kategori,
										"nilai_kelurahan"  		=>(string)$result[$j]->nilai_kelurahan,
										"warna_indikator"  	=>(string)$result[$j]->warna_indikator,
										"target"  	=>(string)$result[$j]->target									
									);
				}
			return $hasilAkhir;			
			
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	
	//form target max edit
	public function getsimpanformisiantargetMaxedit (array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("target" => $dataMasukan['target'],
								"jawa_barat" => $dataMasukan['jawa_barat'],
								"nasional" => $dataMasukan['nasional'],
								"cimahi" => $dataMasukan['cimahi']			
								);
			
			$where[] = " id_indikator = '".$dataMasukan['id_indikator']."'";
			
			$db->update('form_isian_target',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	//form kelurahan max edit
	public function getsimpanformisiankelurahanMaxedit (array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array(
								"nilai_kelurahan" => $dataMasukan['nilai_kelurahan'],
								"hasil_nii" => $dataMasukan['hasil_nii'],
								"warna_indikator" => $dataMasukan['warna_indikator']
								);
			
			$where[] = " id_indikator = '".$dataMasukan['id_indikator']."' and id_form_isian_kelurahan='".$dataMasukan['id_form_isian_kelurahan']."' ";
			
			$db->update('form_isian_kelurahan',$paramInput, $where);
			
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	//---------------------------------------------------------------------------------------------------------------------
	//INDIKATOR MINIMUM 0
	public function getIndikatorMin(){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		
				$result = $db->fetchAll("select * from m_indikator where kategori = 0");
		     return $result;
		   } catch (Exception $e) {
	         echo $e->getMessage().'<br>';
		     return 'Data tidak ada <br>';
		   }
	}
	
	public function getindikatorMinListAll() {	
	   $registry = Zend_Registry::getInstance();
	   $db = $registry->get('db');
	   try {
		$db->setFetchMode(Zend_Db::FETCH_OBJ);
		$result = $db->fetchAll('select * from m_indikator where kategori = 0');
				
		 
         $jmlResult = count($result);
		 return $result;
	    } catch (Exception $e) {
         echo $e->getMessage().'<br>';
	     return 'gagal';
	   }
	}	
	
	public function getcariindikatormin(array $dataMasukan, $pageNumber, $itemPerPage,$total){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		$kategoriCari 	= $dataMasukan['kategoriCari'];
		$katakunciCari 	= $dataMasukan['katakunciCari'];
		$sortBy			= $dataMasukan['sortBy'];
		$sort			= $dataMasukan['sort'];
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 		 
			$xLimit=$itemPerPage;
			$xOffset=($pageNumber-1)*$itemPerPage;

			$whereOpt = " and ($kategoriCari like '%$katakunciCari%')";
			if($katakunciCari != "") { $where = $whereOpt;} 
			$order = " order by kode_indikator ";
			$sqlProses = "select i.*, g.goal from m_indikator i, m_goal g where i.id_goal=g.id_goal and i.kategori = 0".$where;	
			$sqlProses1 = $sqlProses.$order;
			
			if(($pageNumber==0) && ($itemPerPage==0)){	
				$sqlTotal = "select count(*) from ($sqlProses) a";
				$hasilAkhir = $db->fetchOne($sqlTotal);
			}else{
				$sqlData = $sqlProses.$order." limit $xLimit offset $xOffset";
				$result = $db->fetchAll($sqlData);				
			}
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
				$hasilAkhir[$j] = array("id_indikator"  	=>(string)$result[$j]->id_indikator,
										"kode_indikator"  	=>(string)$result[$j]->kode_indikator,
										"goal"  	=>(string)$result[$j]->goal,
										"nama_indikator"  	=>(string)$result[$j]->nama_indikator,
										"definisi"  	=>(string)$result[$j]->definisi,
										"manfaat"  	=>(string)$result[$j]->manfaat,
										"sumber_data"  	=>(string)$result[$j]->sumber_data,
										"nilai_target"  	=>(string)$result[$j]->nilai_target,
										"kategori"  	=>(string)$result[$j]->kategori,
										);
			}	
			return $hasilAkhir;  
		} catch (Exception $e) {
			echo $e->getMessage().'<br>';
			return 'gagal <br>';
		}
	}
	
	public function getDataIndikatorMinTarget($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where id_indikator = '$id_indikator' ";
			$sqlProses = "select * from form_isian_target";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);
			
			$hasilAkhir = array("id_form_isian_target"  	=>(string)$result->id_form_isian_target,
								"id_indikator"  	=>(string)$result->id_indikator,
								"target"  	=>(string)$result->target,
								"nasional"  	=>(string)$result->nasional,
								"jawa_barat"  	=>(string)$result->jawa_barat,
								"cimahi"  	=>(string)$result->cimahi					
								);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getDataIndikatorMinKelurahan($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " and f.id_indikator = '$id_indikator' ";
			$sqlProses = "select i.kategori, f.*, k.Kelurahan as Kelurahan from form_isian_kelurahan f, m_kelurahan k, m_indikator i  where f.kode_kelurahan = k.kode_kelurahan and i.id_indikator = f.id_indikator  ";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchAll($sqlData);
			$jmlResult = count($result);		
			for ($j = 0; $j < $jmlResult; $j++) {
			$hasilAkhir[$j] = array("id_form_isian_kelurahan"  	=>(string)$result[$j]->id_form_isian_kelurahan,
								"id_indikator"  	=>(string)$result[$j]->id_indikator,
								"Kelurahan"  	=>(string)$result[$j]->Kelurahan,
								"nilai_kelurahan"  	=>(string)$result[$j]->nilai_kelurahan,			
								"kategori"  	=>(string)$result[$j]->kategori			
								);
			}
			return $hasilAkhir;			
			
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	public function getNamaIndikatorMin($id_indikator){
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		
		try {
			$db->setFetchMode(Zend_Db::FETCH_OBJ); 
		 
			$where = " where id_indikator = '$id_indikator' ";
			$sqlProses = "select * from m_indikator";	

			
			$sqlData = $sqlProses.$where;
			$result = $db->fetchRow($sqlData);
			
			$hasilAkhir = array("id_indikator"  	=>(string)$result->id_indikator,
								"kode_indikator"  	=>(string)$result->kode_indikator,
								"nama_indikator"  	=>(string)$result->nama_indikator					
								);
			return $hasilAkhir;			
		
			
		} catch (Exception $e) {
	        echo $e->getMessage().'<br>';
		    return 'Data tidak ada <br>';
		}
	}
	
	//form target min edit
	public function getsimpanformisiantargetMinedit (array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array("target" => $dataMasukan['target'],
								"jawa_barat" => $dataMasukan['jawa_barat'],
								"nasional" => $dataMasukan['nasional'],
								"cimahi" => $dataMasukan['cimahi']			
								);
			
			$where[] = " id_indikator = '".$dataMasukan['id_indikator']."'";
			
			$db->update('form_isian_target',$paramInput, $where);
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}
	
	//form kelurahan min edit
	public function getsimpanformisiankelurahanMinedit (array $dataMasukan) {
		$registry = Zend_Registry::getInstance();
		$db = $registry->get('db');
		try {
			$db->beginTransaction();
			$paramInput = array(
								"nilai_kelurahan" => $dataMasukan['nilai_kelurahan'],
								"hasil_nii" => $dataMasukan['hasil_nii'],
								"warna_indikator" => $dataMasukan['warna_indikator']
								);
			
			$where[] = " id_indikator = '".$dataMasukan['id_indikator']."' and id_form_isian_kelurahan='".$dataMasukan['id_form_isian_kelurahan']."' ";
			
			$db->update('form_isian_kelurahan',$paramInput, $where);
			
			$db->commit();			
			return 'sukses';
		} catch (Exception $e) {
			$db->rollBack();
			$errmsgArr = explode(":",$e->getMessage());
			
			$errMsg = $errmsgArr[0];

			if($errMsg == "SQLSTATE[23000]")
			{
				return "gagal.Data Sudah Ada.";
			}
			else
			{
				return "sukses";
			}
	   }
	}

}
?>
