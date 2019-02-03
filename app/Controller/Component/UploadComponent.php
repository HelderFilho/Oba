<?php
App::uses ('Component','Controller');

class UploadComponent extends Component{

	public $max_files = 20;

	public function upload ($data = null, $nome = null){

/*				$filename = $data['name'];
				$file_tmp_name = $data['tmp_name'];
				$dir = WWW_ROOT.'img'.DS.'uploads';
				$dir1 = new Folder($dir.DS.$nome, true);

				$allowed = array('png','jpg','jpeg','bmp' );
				move_uploaded_file($file_tmp_name, $dir1->path.DS.$filename);
		
*/
	if (!empty($data)){
			if (count($data) > $this->max_files){
				throw new NotFoundException ("Arquivos demais",1);
			}
			foreach ($data AS $file) {
				# code...
				$filename = $file['name'];
				$file_tmp_name = $file['tmp_name'];
				$dir = WWW_ROOT.'img'.DS.'uploads';
				$dir1 = new Folder($dir.DS.$nome, true);

				$allowed = array('png','jpg','jpeg','bmp' );
				move_uploaded_file($file_tmp_name, $dir1->path.DS.$filename);
			

/*				if (!in_array(substr(strrchr($filename,'.'),1), $allowed)){ 
					throw new NotFoundException("Error Processing Request", 1);
					
				}else if(is_uploaded_file($file_tmp_name)){
				move_uploaded_file($file_tmp_name, $dir.DS.String::uuid().'-'.$filename);
			}
*/

					}


		}




	}



	public function uploadExcel($data = null, $nome = null){
	
		$filename = $data['name'];
		$file_tmp_name = $data['tmp_name'];
		$dir = WWW_ROOT.'planilhas';
		$dir1 = new Folder($dir.DS.$nome, true);

		$allowed = array('xls' );
		move_uploaded_file($file_tmp_name, $dir1->path.DS.$filename);
	}
		
	public function uploadLogo ($data = null, $nome = null){
		$filename = $data['name'];
		$file_tmp_name = $data['tmp_name'];
		$dir = WWW_ROOT.'logomarcas';
		$dir1 = new Folder($dir.DS.$nome, true);

		$allowed = array('png','jpg','jpeg','bmp' );
		move_uploaded_file($file_tmp_name, $dir1->path.DS.$filename);

			}

}

?>
