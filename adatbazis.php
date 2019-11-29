<?php
class adatbazis{
	public	$servername = "localhost:3307";
	public	$username = "root";
	public	$password = "";
	public	$dbname = "euroskills";
	public $conn = NULL;
	public $sql = NULL;
	public $result = NULL;
	public $row = NULL;

	public function kapcsolodas(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}	
		$this->conn->query("SET NAMES 'UTF8';");
	}

	public function list(){
		$this->sql="SELECT * FROM versenyzo";
		$this->result = $this->conn->query($this->sql);
		if ($this->result->num_rows > 0) {
			?>
			<table>	
				<td>ID</td>
				<td>Név</td>
				<td>Pont</td>
				<tbody>
			<?php
			while($this->row = $this->result->fetch_assoc()) {
				?>
				<tr>
				<?php
				?>
				<td><?php echo $this->row["id"];?></td>
				<td><?php echo $this->row["nev"];?></td>
				<td><?php echo $this->row["pont"];?></td>
				</tr><?php
			}
			?>
				</tbody>
			</table>
			<?php
		} else {
			echo "Nincs találat";
		}
	}

	public function exactSearch($item){
		if($item === ''){
			$this->list();
		}
		else{
			$this->sql="SELECT * FROM versenyzo WHERE nev = '" . $item ."'";
			$this->result = $this->conn->query($this->sql);
			if ($this->result->num_rows > 0) {
				?>
				<table>	
					<td>ID</td>
					<td>Név</td>
					<td>Pont</td>
					<tbody>
				<?php
				while($this->row = $this->result->fetch_assoc()) {
					?>
					<tr>
					<?php
					?>
					<td><?php echo $this->row["id"];?></td>
					<td><?php echo $this->row["nev"];?></td>
					<td><?php echo $this->row["pont"];?></td>
					</tr><?php
				}
				?>
					</tbody>
				</table>
				<?php
			} else {
				echo "Nincs találat";
			}
		}
	}

	public function partialSearch($item){
		if($item === ''){
			$this->list();
		}
		else{
			$this->sql="SELECT * FROM versenyzo WHERE nev LIKE '%" . $item ."%'";
			$this->result = $this->conn->query($this->sql);
			if ($this->result->num_rows > 0) {
				?>
				<table>
					<td>ID</td>
					<td>Név</td>
					<td>Pont</td>
					<tbody>
				<?php
				while($this->row = $this->result->fetch_assoc()) {
					?>
					<tr>
					<?php
					?>
					<td><?php echo $this->row["id"];?></td>
					<td><?php echo $this->row["nev"];?></td>
					<td><?php echo $this->row["pont"];?></td>
					</tr><?php
				}
				?>
					</tbody>
				</table>
				<?php
			} else {
				echo "Nincs találat";
			}
		}
	}

	public function greaterSearch($item){
		if(!$item) 
			$item = 0;
		$this->sql="SELECT * FROM versenyzo WHERE pont >= " . $item;
		var_dump($this->sql);
		$this->result = $this->conn->query($this->sql);
		if ($this->result->num_rows > 0) {
			?>
			<table>
				<td>ID</td>
				<td>Név</td>
				<td>Pont</td>
				<tbody>
			<?php
			while($this->row = $this->result->fetch_assoc()) {
				?>
				<tr>
				<?php
				?>
				<td><?php echo $this->row["id"];?></td>
				<td><?php echo $this->row["nev"];?></td>
				<td><?php echo $this->row["pont"];?></td>
				</tr><?php
			}
			?>
				</tbody>
			</table>
			<?php
		} else {
			echo "Nincs találat";
		}
	}

	public function elsoXSor($item){
		if(!$item) $this->sql="SELECT * FROM versenyzo";
		else $this->sql="SELECT * FROM versenyzo WHERE 1 LIMIT " . $item;
		var_dump($this->sql);
		$this->result = $this->conn->query($this->sql);
		if ($this->result->num_rows > 0) {
			?>
			<table>
				<td>ID</td>
				<td>Név</td>
				<td>Pont</td>
				<tbody>
			<?php
			while($this->row = $this->result->fetch_assoc()) {
				?>
				<tr>
				<?php
				?>
				<td><?php echo $this->row["id"];?></td>
				<td><?php echo $this->row["nev"];?></td>
				<td><?php echo $this->row["pont"];?></td>
				</tr><?php
			}
			?>
				</tbody>
			</table>
			<?php
		} else {
			echo "Nincs találat";
		}
	}

	public function kapcsolatbontas(){
		$this->conn->close();		
	}
}
?>