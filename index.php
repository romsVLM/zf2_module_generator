<?php
/**
* @author Jourdes Romain 24/09/2014
*
*/
?>

<?php 
    // Fonction pour supprimer les mauvais caractères présent dans le nom du module passé
    function affichage($str) {
	    $str = htmlspecialchars(trim(strtolower($str)));
	    $str_noWhiteSpace = str_replace(' ', '_', $str);
		$str_noBadChar = str_replace(array('/','.',',',';',':','\\','$','%','#','(',')','{','}','&lt','&gt','?','"','\''),'',$str_noWhiteSpace);
		$str_noAccent = str_replace(array('é','è','à','ù'),array('e','e','a','u'), $str_noBadChar);
		return $str_noAccent;
	}
?>

<html lang="fr">
<head>
  <title>Zf2 module générator</title>
  <meta charset="utf-8">
<head>
<body>
  <h1>ZF2 MODULE GENERATOR</h1>
  <p>Ce programme permet de générer le lien nécessaire à la création de l'arborescence d'un module<p><hr/><br/>
  
  <form action="index.php" method="post">
    <label>Nom du module : </label><input type="text" name="nom" value="" required="true"/>
	<input type="submit" name="valider" value="Générer le lien"/>
  </form>
  
    <?php if(isset($_POST['valider'])): ?>
	    <?php if(isset($_POST['nom']) && !empty($_POST['nom']) && $_POST['nom'] != " "): ?>
		      <h3>Notice : </h3>
			  <p>
			    Télécharger l\'application Cygwin avec le lien suivant <a href="http://cygwin.com/install.html">Cygwin</a><br/>
				Installer Cygwin l'application sur votre ordinateur local.<br/>
				Ouvrer Cygwin et allez dans le répertoire "module" de votre projet Zend Framework 2.<br/>
				<u>Exemple</u> :<br/>
				Si mon projet s'appel "mon_projet" et se situe dans le répertoire <b>www</b> de Wamp, tapez : <br/>
				<b>cd c:/wamp/www/mon_projet/module</b><br/><br/>
				Copier ensuite le lien généré ci-dessous dans Cygwin afin de générer l'arborescence de votre module <b><?php echo ucfirst(affichage($_POST['nom']));?></b><br/>
		        <b>mkdir -pv <?php echo ucfirst(affichage($_POST['nom'])); ?>/{config,src/<?php echo ucfirst(affichage($_POST['nom']));?>/{Controller,Form,Model},view/<?php echo affichage($_POST['nom']); ?>/<?php echo affichage($_POST['nom']); ?>}</b>
			  </p>
		<?php else: ?>
		      Merci d'entrer un nom de Module valide.
		<?php endif; ?>
	<?php endif; ?>
</body>
</html>