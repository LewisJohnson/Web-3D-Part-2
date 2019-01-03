<?php
class Model {
	//create a new PDO object that represents a connection to a database
	// Property declaration, in this case we are declaring a variable that points to the database connection
	public $dbhandle;
	//method to create database connection using PHP data Objects (PDO) as the interface to SQLite
	public function __construct(){
		try {
			$this->dbhandle = new PDO('sqlite:./application/model/db/models.sqlite', '-', '-', array(
				PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES=> false,
			));
		}
		catch (PDOEXception $e) {
			print new Exception($e->getMessage());
		}
	}
	
	public function dbCreate(){
		try{
			$this->dbhandle->exec("CREATE TABLE models (id INTEGER PRIMARY KEY, name TEXT, description TEXT, placeOfOrigin TEXT, materials TEXT, manufacturer TEXT, productionDate TEXT, imageUrl TEXT, x3domUrl TEXT);");
			
			$this->dbhandle->exec("INSERT INTO models (id, name, description, placeOfOrigin, materials, manufacturer, productionDate, imageUrl, x3domUrl) VALUES (0, 
				'Baldwin Class 56',
				'The Baldwin Locomotive Works was an American manufacturer of railroad locomotives from 1825 to 1956. Originally located in Philadelphia, it moved to nearby Eddystone, Pennsylvania, in the early 20th century. The company was for decades the world''s largest producer of steam locomotives, but struggled to compete as demand switched to diesel locomotives. Baldwin produced the last of its 70,000-plus locomotives in 1956 and went out of business in 1972.',
				'London, England', 
				'Steel',
				'Baldwin Locomotive Works',
				'1924',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/assets/images/thumbnails/train.jpg',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/x3d/train.x3d');");

			$this->dbhandle->exec("INSERT INTO models (id, name, description, placeOfOrigin, materials, manufacturer, productionDate, imageUrl, x3domUrl) VALUES (1, 
				'Jaguar',
				'The SS 1, the top of its radiator says SS One, is a British two-door sports saloon and tourer built by Swallow Coachbuilding Company in Foleshill, Coventry, England. It was first presented to the public at the 1931 London Motor Show. Slightly modified it was then manufactured between 1932 and 1936, during which time 148 cars were built. In 1945 SS Cars changed its name to Jaguar Cars Limited.',
				'Foleshill, Coventry, England',
				'Aluminium',
				'SS Cars/Jaguar',
				'1931 – 1936',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/assets/images/thumbnails/car.jpg',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/x3d/car.x3d');");
			
			$this->dbhandle->exec("INSERT INTO models (id, name, description, placeOfOrigin, materials, manufacturer, productionDate, imageUrl, x3domUrl) VALUES (2, 
				'AEC Routemaster',
				'The AEC Routemaster is a front-engined double-decker bus that was designed by London Transport and built by the Associated Equipment Company (AEC) and Park Royal Vehicles. The first prototype was completed in September 1954 and the last one was delivered in 1968. The layout of the vehicle was traditional for the time, with a half-cab, front-mounted engine and open rear platform, although the coach version was fitted with rear platform doors. Forward entrance vehicles with platform doors were also produced as was a unique front-entrance prototype with the engine mounted transversely at the rear.',
				'Southall, Greater London, England',
				'Lightweight Aluminium',
				'Associated Equipment Company',
				'1954–1968',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/assets/images/thumbnails/bus.jpg',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/x3d/bus.x3d');");

			$this->dbhandle->exec("INSERT INTO models (id, name, description, placeOfOrigin, materials, manufacturer, productionDate, imageUrl, x3domUrl) VALUES (3, 
				'Brighton Toy Museum',
				'Brighton Toy and Model Museum is an independent toy museum situated in Brighton, East Sussex. Its collection focuses on toys and models produced in the UK and Europe up until the mid-Twentieth Century.',
				'Brighton, East Sussex, England',
				'Bricks and stuff',
				'Christopher Littledale',
				'1991',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/assets/images/thumbnails/museum.jpg',
				'http://users.sussex.ac.uk/~lj234/mobile3dapp/part_2/x3d/main.x3d');");

			return "Models table has been created."; 
		}
		catch (PDOEXception $e) {
			return new Exception($e->getMessage());
		}
		$this->dbhandle = NULL;
	}
		
	public function dbRead(){
		try {
			//Get the database as an object
			$sql = 'SELECT * FROM models';
			$stmt = $this->dbhandle->query($sql);
					
			//Set up an array to return the results to the view
			$result = null;
			
			//Set up a variable to index each row of the array
			$i=0;
			
			//Use a while loop to loop through the rows
			while ($data = $stmt->fetch()){
				//Write the database contents to the results array for sending back to the view
				$result['models'][$i]['name'] = $data['name'];
				$result['models'][$i]['placeOfOrigin'] = $data['placeOfOrigin'];
				$result['models'][$i]['materials'] = $data['materials'];
				$result['models'][$i]['manufacturer'] = $data['manufacturer'];
				$result['models'][$i]['productionDate'] = $data['productionDate'];
				$result['models'][$i]['description'] = $data['description'];
				$result['models'][$i]['imageUrl'] = $data['imageUrl'];
				$result['models'][$i]['x3domUrl'] = $data['x3domUrl'];
				
				//increment the row index
				$i++;
			}
			
		}
		catch(PDOEXception $e) {
			print new Exception($e->getMessage());
		}
		
		//Close the database connection
		$this->dbhandle = NULL;
		
		//Send the response back to the view
		return $result;
	}
	
	function dbDelete() {
		$this->dbhandle->exec("DROP TABLE models");
		return "Models table successfully deleted from inside models.sqlite file";
	}
}		
?>
