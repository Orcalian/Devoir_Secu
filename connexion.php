<?php
	echo 'gerv';
	session_start();
	
	if(isset($_POST['identifiant']) & !empty($_POST['identifiant']) & isset($_POST['mdp']) & !empty($_POST['mdp']))
	{
		try
		{
			$mysqlClient = new PDO('mysql:host=localhost;port=3306;dbname=Tp_Secu;charset=utf8','Tp_User','JeNeSuisPasUnPirate1987!');
			
			$recipesStatement = $mysqlClient->prepare('SELECT * FROM utilisateurs');
			$recipesStatement->execute();
			$recipes = $recipesStatement->fetchAll();
			$verif = false;
			$mdp = hash('sha224', $_POST['mdp']);
			
			var_dump($verif);	
			
			foreach ($recipes as $recipe) 
			{
				?>
				    <p><?php echo $recipe['identifiant']." ". $_POST['identifiant']; ?></p>
				    <p><?php echo $recipe['mot_de_passe']." ". $mdp; ?></p>
				<?php
				
				
				if($recipe['identifiant'] == $_POST['identifiant'] & $mdp == $recipe['mot_de_passe'])
					{
						$verif = true;
					}
				
			}
			
			var_dump($verif);	
			
			if($verif == true)
			{
				$_SESSION['logged'] = 'loggé';
				$_SESSION['identifiant'] = $_POST['identifiant'];
				$_SESSION['mmessage'] = 'Ok';
				echo "c'est good !!";
			}
			else 
			{
				echo "cet identifiant ou ce mot de passe n'existe pas";
				$_SESSION['mmessage'] = 'Error';
			}
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
	
	}
	else 
	{
		$_SESSION['mmessage'] = 'Aucun identifiant/et ou mot de passe';
	}
	

	
	header('Location:index.php');
?>