<!DOCTYPE html>
<html>
<head>
	<title>Exploreur</title>
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

    <section>

    
       
    <form action="index.php" method="POST">

        <input type="submit" name="retour" value="retour " class="btn btn-default" >
    </form>
   



    <br>
    <br>

<div class="form-group form-inline mx-auto">
	<form action="index.php" method="POST" class="mx-auto">
        <label for="text" >Créer nouveau dossier</label><br>
        <input type="text" name="text" id="text"  placeholder="Nom dossier" class="form-control input-lg-4  inp" ><br>
        <input type="submit" name="sub" class="btn btn-primary">
  
    </form>

    <form action="index.php" method="POST" class="mx-auto">
        <label for="fichier" >Créer nouveau fichier</label><br>
        <input type="text" name="fichier" id="fichier"  placeholder="Nom fichier" class="form-control input-lg-4 inp" ><br>
        <input type="submit" name="sub2" class="btn btn-primary">
 
  
    </form>
  </div>
  <div class="form-group form-inline mx-auto">
    <form action="index.php" method="POST" class="mx-auto">
        <label for="text" >Supprimer dossier</label><br>
        <input type="text" name="text3" id="text"  placeholder="Nom dossier" class="form-control input-lg-4  inp" ><br>
        <input type="submit" name="sub3" class="btn btn-primary">
  
    </form>

    <form action="index.php" method="POST" class="mx-auto">
        <label for="fichier" >Supprimer fichier</label><br>
        <input type="text" name="fichier2" id="fichier"  placeholder="Nom fichier" class="form-control input-lg-4 inp" ><br>
        <input type="submit" name="sub4" class="btn btn-primary">
 
  
    </form>
  </div>
    <div class="form-group form-inline mx-auto">
    <form action="index.php" method="POST" class="mx-auto">
        <label for="text" >Renommer dossier ou fichier</label><br>
        <label for="text">Ancien nom</label>
        <input type="text" name="text5" id="text"  placeholder="Nom dossier" class="form-control input-lg-4  inp" ><br>
        <label for="text">Nouveau nom</label>
        <input type="text" name="text6" id="text"  placeholder="Nom dossier" class="form-control input-lg-4  inp" ><br>
        <input type="submit" name="sub6" class="btn btn-primary">
  
    </form>
        </div>
    <table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Taille</th>
      <th scope="col">Autres</th>
    </tr>
     </thead>
  <tbody>

	

<?php


//variable qui contient le repertoire courant
$dir = "./";
$dir1 = "../";
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
echo $actual_link;





//creation de fichier

if (isset( $_POST['sub2'] ))

{
       if(file_exists($_POST['fichier']))
                {
                    echo'le fichier existe déjà';
                }
                else
                {

   
file_put_contents($_POST['fichier'],"");
}
}

//suppresion fichier

if (isset( $_POST['sub4'] ))

{
       if(file_exists($_POST['fichier2']))
                {
                    unlink($_POST['fichier2']);
                }
                else{
                echo "le fichier n\'existe pas";
                }
}

//creation dossier
if (isset( $_POST['sub'] ))

{

 
                // Le nom du dossier à créer

                //verifier si le repertoire existe déjàt
                if(is_dir( $_POST['text']))
                {
                    echo'le repertoire existe déjà';
                }

                //création d'un nouveau dossier
                else
                {
                    mkdir( $_POST['text']);
                    echo'le dossier '.$_POST['text'].' vient d\'etre créé';
                }
            }


         
            if (isset( $_POST['sub3'] ))

{


                // supprimer dossier

                //verifier si le repertoire existe déjàt
                if(is_dir( $_POST['text3']))
                {rmdir( $_POST['text3']);
                    echo'le repertoire '.$_POST['text3'].' vient d\'etre supprimé';
                }

                //affiche le dossier supprimer
                else
                {
                    
                    echo'le dossier '.$_POST['text3'].' n\'existe pas';
                }
            }


 //renommage fichier ou dossier
            if (isset( $_POST['sub6'] ))

{


            

               
                if(is_dir( $_POST['text5']))
                {
                    if (is_dir( $_POST['text6']))
                    {
                          echo'le nom '.$_POST['text6'].'existe deja';
                    }
                    else
                    {
                     rename( $_POST['text5'],$_POST['text6']);
   
                    }
                }
                    else
                    {
                       echo'le nom '.$_POST['text5'].'n\'existe deja';   
                    }
      
               

               
            }









 if (isset( $_POST['retour'] ))
 {

    if (is_dir($dir1)) {
     //ouvre le dossier racine
     if ($dossier = opendir($dir1) ) {
         //lit le dossier racine 
         while (($file = readdir($dossier)) !== false) {
               //Pour ne pas affichier les fichiers systèmes .(dossier courant) et  notre fichier index.php
             if( $file != '.' && $file != 'index.php' && $file != '..' ) {
            // affiche sous forme de liens les 

  if (filetype("../".$file)=="dir") 
                {
                   
            echo '<tr><th scope="row">


<a href ="../'.$file.'"><img src="dossier3.png"><br>'.$file."</a></th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br>" .filesize("../".$file). 'bytes </td>'.'  <td></td></tr>';
            
                }

                else
                {
                     $extension = pathinfo("../".$file, PATHINFO_EXTENSION);
                     if ($extension=="pdf") {
                         echo '<tr><th scope="row">

<a href ="../'.$file.'"><img src="pdf.png"><br>'.$file."</a></th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br>".filesize("../".$file). '         bytes</td>'.' <td></td></tr>';
                     }
                      elseif ($extension == "png"  || $extension =="jpg"|| $extension =="JPG" || $extension =="jpeg" || $extension =="ico" ) {
                          echo '<tr><th scope="row">


<a href ="../'.$file.'"><img src="img.png"><br>'.$file."</a></th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br>".filesize("../".$file). '         bytes</td>'.' <td></td></tr>';
                     }
                     else if ($extension=="mp3") {
                         echo '<tr><th scope="row">

<a href ="../'.$file.'"><img src="mp3.png"><br>'.$file."</a></th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br>".filesize("../".$file). '         bytes</td>'.' <td></td></tr>';
                     }
                     else if ( $extension!="pdf" && "png" && "jpg" && "jpeg" && "mp3" && "ico")
                     {
                     echo '<tr><th scope="row">


<a href ="../'.$file.'"><img src="fichier.png"><br>'.$file."</a></th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br>" .filesize("../".$file). ' bytes</td>'.' <td></td></tr>';
}

                }
            
         }
 }
  //Ferme la connextion au dossier
         closedir($dossier);
     }



 }
 }

        $racine='./index.php';      //on stock le chemin vers la racine

        echo "<a href='$racine'> Racine</a>";
    ?>
       
<?php
    //on initialise path
    $path="";
    if(sizeof($_REQUEST) != 0) $path = $_REQUEST["path"];
    if(strlen($path)==0) $path=".";
    else if ($path !=".") 
    {
        $parent_dir = substr($path,0,strrpos($path,"/")); //contient le dossier précédemment visité

        ?>
    
        <?php

            echo "<img src='pictures/dir.png'>";
            echo "<a href='./index.php?path=$parent_dir'>Dossier parent</a>"; //lien vers le dossier précédent

        ?>
            
    <?php
    }
    // on ouvre le dossier et on le parcourt
    $dir = opendir($path);
    $directories=array();
    $files=array();
    while($file = readdir($dir)) 
    {
        if($file != "." && $file != "..") 
        {
            // on stock les dossiers et les fichiers dans deux variables différentes
            if(is_dir("$path/$file"))
            {
                $directories[]="$file";
            }
            else $files[]="$file";  
        }
    }
    // on tri le tableau directories
        if(isset($directories))
            {
                sort($directories);
                foreach($directories as $d) //on parcourt le tableau et on l'affiche
                {
                                  //avec un icône pour les dossiers
                    echo "<tr><th scope='row'><a href='./index.php?path=$path/$d'><img src='dossier3.png'><br>$d</a></th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br>" .filesize('./'.$file). "bytes </td>"." <td></td></tr>"; 
                     //et un lien vers les sous dossiers
                ?>
                    </td>
                </tr>
                <?php
                }
            }


  // on trie les fichoers dans l'ordre alphabétique
        if(isset($files))
        {
            sort($files);
        if($files != 'list_rep_profondeur.php' && $files!= 'list_rep_largeur.php')
        {
            foreach($files as $files2)
 
            {
               
                echo "<tr><th scope='row'><a href=\"$path/$files2\" > <img src='fichier.png'><br> $files2 </a>
                </th> <td>&nbsp;&nbsp;&nbsp;&nbsp;<br>" .filesize($path.'/'.$files2). " bytes</td>"." <td></td></tr>";           //ouverture du fichier dans une nouvelle fenêtre
            ?>
                
            <?php
            }
        }   
        }
    closedir($dir); //on ferme le dossier
?>




    ?>
</tr>
  </tbody>
</table>

</section>
</body>
</html>