<?php

class Controller extends AController{
	
	protected $task;
	protected $view;

	
	protected function getModel() {
		return new Model();
	}
	
	public function execute($task) {
		if($task) {
			//echo $task;
			if(method_exists($this,$task)) {
				return $this->$task();
			}
			else {
				return FALSE;
			}
		}
	}
	
	public function display() {
		$this->view = new View();
		return $this->view->display();
	}
	
	public function export() {
		if(!empty($_FILES['xls']['tmp_name'])) {
			$file = $this->uploadFile($_FILES);
		}
		
		$this->xlsToMysql($file);
	}
	
	public function getPhpExcel($file) {
		return PHPExcel_IOFactory::load($file);
	}
	
	
	public function xlsToMysql($file) {
		
		$this->model = $this->getModel();
		
		
		$this->xls = $this->getPhpExcel($file);

		//print_r($this->xls);
		
		$this->xls->setActiveSheetIndex(0);
		
		$sheet = $this->xls->getActiveSheet();
		
		$rowIterator = $sheet->getRowIterator();
		
		
		$arr = array();
		foreach($rowIterator as $row) {

			
			if($row->getRowIndex() != 1) {
				$cellIterator = $row->getCellIterator();
				foreach($cellIterator as $cell) {
					$cellPath = $cell->getColumn();
					if(isset($this->config->cells[$cellPath])) {
						$arr[$row->getRowIndex()][$this->config->cells[$cellPath]] = $cell->getCalculatedValue();
					}
				}
			}
		}
			
 // print_r($arr);
 // die();
				
	if($this->model->insertExcel($arr)) {
		return TRUE;
	}
		
		
	}	
	
	protected function uploadFile($files) {
		
		$uploaddir = PATH_SITE.'/file';
		
		$uploadfile = $uploaddir .'/'.(int)microtime(true).'.xlsx';
		
		if (move_uploaded_file($files['xls']['tmp_name'], $uploadfile)) {
		   return $uploadfile;
		} 
		return FALSE;
	}
}
?>