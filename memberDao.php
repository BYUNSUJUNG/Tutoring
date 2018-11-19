<?php 
	class MemberDao {

		/*
			create table jingeria(
				name varchar(20),
				phone varchar(20),
				id varchar(20) primary key,
				pw varchar(20)
				
		)
		*/

		private $db; // PDO 객체를 저장하기 위한 프로퍼티
		
		// DB에 접속하고 PDO 객체를 $db에 저장
		public function __construct() {
			
			try {
				$this->db = new PDO("mysql:host=localhost;dbname=php", "root", "8498");
				// PDO객체 생성 
				// "URL"를 입력하면 연결되는거임
			
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				exit($e->getMessage());
			}
		}
		
		// login.php에서 사용됨
		function getMember($id){
            try{
                $pstmt = $this->db->prepare("select * from jingeria where id=:id");
                $pstmt->bindValue(":id", $id, PDO::PARAM_STR);
                $pstmt->execute();
                $result=$pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(Exception $e){
                exit($e->getMessage());
            }
			return $result;
		}
		
		// register.php에서 사용됨
		function insertMember($name, $phone, $id, $pw) {
			try {
				$sql = "insert into jingeria(name, phone, id, pw) values(:name, :phone, :id, :pw)";
				$pstmt = $this->db->prepare($sql);

				$pstmt->bindValue(":name",$name,PDO::PARAM_STR);
				$pstmt->bindValue(":phone",$phone,PDO::PARAM_STR);
				$pstmt->bindValue(":id",$id,PDO::PARAM_STR);
				$pstmt->bindValue(":pw",$pw,PDO::PARAM_STR);

				
				$pstmt->execute();
				
			} catch(PDOException $e) {
				exit($e->getMessage());
			}
		}

		// update.php에서 사용됨
		function updateMember($name, $phone, $id, $pw) {
			try {
				$sql = "update jingeria set name=:name, phone=:phone, pw=:pw where id=:id";
				$pstmt = $this->db->prepare($sql);
				
				$pstmt->bindValue(":name",$name,PDO::PARAM_STR);
				$pstmt->bindValue(":phone",$phone,PDO::PARAM_STR);
				$pstmt->bindValue(":id",$id,PDO::PARAM_STR);
				$pstmt->bindValue(":pw",$pw,PDO::PARAM_STR);

				
				$pstmt->execute();
				
			} catch(PDOException $e) {
				exit($e->getMessage());
			}
		}
	}
?>