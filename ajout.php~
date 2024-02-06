<?php
	
	session_start();

	if(isset($_POST['identifiant']) & !empty($_POST['identifiant']) & isset($_POST['mdp']) & !empty($_POST['mdp']))
	{
		try
		{
			$mysqlClient = new PDO('mysql:host=localhost;port=3306;dbname=Tp_Secu;charset=utf8','Tp_User','JeNeSuisPasUnPirate1987!');
			
			$recipesStatement = $mysqlClient->prepare('SELECT * FROM utilisateurs');
			$recipesStatement->execute();
			$recipes = $recipesStatement->fetchAll();
			$verif =  false;			
			
			foreach ($recipes as $recipe) {
				
				if($recipe['identifiant'] == $_POST['identifiant'])
				{
					$verif =  true;
				}
				?>
				    <p><?php echo $recipe['identifiant']; ?></p>
				<?php
			}
			
			if($verif == true)
			{
				echo 'cet identifiant existe déja';
			}
			else 
			{
				echo "c'est bon";	
				$sqlQuery = 'INSERT INTO utilisateurs(identifiant, adresse_mail, mot_de_passe) VALUES (:identifiant,:adresse_mail,:mot_de_passe)';


				$insertRecipe = $mysqlClient->prepare($sqlQuery);


				$insertRecipe->execute([
				'identifiant' => $_POST['identifiant'],
    			'adresse_mail' => 'Hoho',
    			'mot_de_passe' => hash('sha224', $_POST['mdp'])
				]);
				
			}
		}
		catch (Exception $e)
		{
		    die('Erreur : ' . $e->getMessage());
		}
	
	}
	else 
	{
		echo "vous n'avez pas rempli d'identifiant ou de mot de passe";
	}
	
	
	
	

	
	header('Location:index.php');
?>