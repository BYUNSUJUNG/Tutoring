<?php //1701140_변수정 ?>
<?php
	class menuChickenDao {
		
		private $db;  // PDO 객체를 저장하기 위한 프로퍼티
		
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

		// view.php에서 사용됨
		function getMsg($num){ 
            try{
                $pstmt = $this->db->prepare("select * from menuChicken where num=:num");
                $pstmt->bindValue(":num", $num, PDO::PARAM_STR);
                $pstmt->execute();
                $result=$pstmt->fetch(PDO::FETCH_ASSOC);
            }catch(PDOException $e){
                exit($e->getMessage());
            }
			return $result;
		}
		
		// write.php에서 사용됨
		function insertBoard($writer, $title, $file, $content) { 
			try {
				$sql = "insert into menuChicken(writer,title,file,content) values(:writer,:title,:file,:content)";
				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":writer",$writer,PDO::PARAM_STR);
				$pstmt->bindValue(":title",$title,PDO::PARAM_STR);
				$pstmt->bindValue(":file",$file,PDO::PARAM_STR);
				$pstmt->bindValue(":content",$content,PDO::PARAM_STR);
				$pstmt->execute(); // 실행
			} catch(PDOException $e) {
				exit($e->getMessage());
			}
		}

		// 모든 업로드된 파일 정보 반환(2차원 배열)
		// board.php에서 사용됨
		function getManyMsgs($num_page) { 
			//sql: "select * from board"
			try {
				$numLine=NUM_LINES;
				$pstmt=$this->db->prepare("select * from menuChicken order by num desc limit $num_page, $numLine");
				// bindValue 필요 없음
				$pstmt->execute();
				// 하나씩 가져올때는 fetch을 사용함
				// 일차원배열로 만들어서 가져와주세요. FETCH_ASSOC을 사용함
				// $pstmt->fetch(PDO::FETCH_ASSOC);
				// 하지만 한꺼번에 할 것이기 때문에 fetchAll을 사용한다.
				$msg=$pstmt->fetchAll(PDO::FETCH_ASSOC);
			} catch(PDOException $e){
				exit($e->getMessage());
			}
			return $msg;
		
		}


		// modify.php에서 사용됨
		function updateBoard($num, $writer, $title, $file, $content) { 
			try {
				$sql = "update menuChicken set writer=:writer, title=:title, file=:file, content=:content where num=:num";
				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":num",$num,PDO::PARAM_STR);
				$pstmt->bindValue(":writer",$writer,PDO::PARAM_STR);
				$pstmt->bindValue(":title",$title,PDO::PARAM_STR);
				$pstmt->bindValue(":file",$file,PDO::PARAM_STR);
				$pstmt->bindValue(":content",$content,PDO::PARAM_STR);
				$pstmt->execute(); // 실행
			} catch(PDOException $e) {
				exit($e->getMessage());
			}
		}

		// delete.php에서 사용됨
		function deleteBoard($num) { 
			try { 
				$sql = "delete from menuChicken where num=:num";
				$pstmt = $this->db->prepare($sql);
				$pstmt->bindValue(":num",$num,PDO::PARAM_STR);
				$pstmt->execute(); // 실행
			} catch(PDOException $e) {
				exit($e->getMessage());
			}
		}

		
		function getCountMsgs() {
			// 게시판의 전체 글 수(전체 레코드 숫자) 반환
			try { 
				$rows = $this->db->prepare("select count(*) from menuChicken");
				$rows->execute();
				$msg=$rows->fetchColumn();
			} catch(PDOException $e) {
				exit($e->getMessage());
			}
			return $msg;
		}
	}
?>