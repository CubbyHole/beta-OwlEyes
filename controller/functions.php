<?php
/**
 * Created by PhpStorm.
 * User: Harry
 * Date: 18/04/14
 * Time: 10:18
 */

// retourne la taille du fichier
function fileSize64($file)
{
    //Le système d'exploitation est-il un windows?
    static $isWindows;
    if (!isset($isWindows))
        $isWindows = (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN');

    //La commande exec est-elle disponible?
    static $execWorks;
    if (!isset($execWorks))
        $execWorks = (function_exists('exec') && !ini_get('safe_mode') && @exec('echo EXEC') == 'EXEC');

    //Essaye une commande shell
    if ($execWorks)
    {
        $cmd = ($isWindows) ? "for %F in (\"$file\") do @echo %~zF" : "stat -c%s \"$file\"";
        @exec($cmd, $output);

        /*
         * ctype_digit vérifie si tous les caractères de la chaîne sont des chiffres
         * @link https://php.net/manual/fr/function.ctype-digit.php
         */
        if (is_array($output) && ctype_digit($size = trim(implode("\n", $output))))
            return round($size / 1024, 0); //conversion en Kb
    }

    //Essaye l'interface Windows COM
    if ($isWindows && class_exists("COM"))
    {
        try
        {
            //@link https://php.net/manual/fr/class.com.php
            $fileSystemObject = new COM('Scripting.FileSystemObject'); //accès au système de fichier de l'ordinateur

            //retourne un objet fichier
            $fileObject = $fileSystemObject->GetFile(realpath($file));

            //retourne la taille du fichier en octets
            $size = $fileObject->Size;

        } catch (Exception $e)
        {
            $size = null;
        }

        if (ctype_digit($size))
            return round($size / 1024, 0); //conversion en Kb
    }

    //En dernier recours utilise filesize (qui ne fonctionne pas correctement pour des fichiers de plus de 2 Go.
    return round(filesize($file) / 1024, 0);
}




/**
 * Convertit des kilobytes (unité enregistrée en BDD) dans l'unité voulue).
 * Attention: retourne une chaîne de caractère.
 * @author Alban Truc
 * @param int|float $kiloBytes
 * @param NULL|string $outputUnit
 * @param null|string $format
 * @since 16/05/2014
 * @return string
 */

function convertKilobytes($kiloBytes, $outputUnit = NULL, $format = NULL)
{
$bytes = $kiloBytes * 1024; //transforme en bytes

// Format string
$format = ($format === NULL) ? '%01.2f' : (string) $format;

$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
$mod = 1024;

/*
 * Déterminer l'unité à utiliser
 * http://php.net/manual/en/function.array-search.php
 */
if (($power = array_search((string) $outputUnit, $units)) === FALSE)
{
    //http://php.net/manual/en/function.floor.php
    $power = ($bytes > 0) ? floor(log($bytes, $mod)) : 0;
}

/*
 * http://php.net/manual/en/function.sprintf.php
 * http://php.net/manual/en/function.pow.php
 */
return sprintf($format, $bytes / pow($mod, $power), $units[$power]);
}

/**
 * Récupère le gravatar correspondant en fonction de l'adresse mail.
 *
 * @author Kentucky Sato
 * @param string $email=> l'adresse mail
 * @param string $size=> Taille en pixel, valeur par defaut à 80px [ 1 - 2048 ]
 * @param string $default=> Image par defaut [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $rating=> Note Maximum [ g | pg | r | x ]
 * @param boole $img=> True => retourne l'image complete, False=> retourne l'URL
 * @param array $atts=> Optionnel, Attribut pour l'inclusion d' tag img
 * @return Chaîne contenant seulement une URL ou un tag d'image complète
 * @source http://gravatar.com/site/implement/images/php/
 */

function getGravatar($email, $size = 60, $default = 'mm', $rating = 'g', $img = false, $atts = array())
{
    $url = 'http://www.gravatar.com/avatar/';
    $url.= md5( strtolower( trim( $email ) ) );//http://www.php.net/manual/en/function.strtolower.php
    $url.= "?s=$size&d=$default&r=$rating";

    if ( $img )
    {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }

    return $url;
}

function _cleanInput($data)
{

    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Retire code Javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Retire code HTML
        '@<style[^>]*?>.*?</style>@siU',    // Retire code CSS
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Retire les lignes de commentaires multiples
    );

    $output = preg_replace($search, '', $data);

    return $output;
}

/**
 * Pour protéger la base de données. Fait appel à cleanInput($data) si $data n'est pas un tableau.
 * @author Alban Truc
 * @param array|string $data Données envoyées
 * @since 19/02/2014
 * @return array|mixed Données nettoyées
 */

function _sanitize($data)
{
    $clean_input = Array();

    if (is_array($data))
    {
        foreach ($data as $key => $value)
            $clean_input[$key] = _sanitize($value);
    }
    else
    {
        if(get_magic_quotes_gpc())
            $data = trim(stripslashes($data));

        $data = trim(strip_tags($data));
        $clean_input = _cleanInput($data);
    }

    return $clean_input;
}
/*
 * Calcul le pourcentage d'un nombre
 */
function _percentage($nombre,$total,$pourcentage)
{
    $resultat = ($nombre/$total) * $pourcentage;
    return round($resultat); // Arrondi la valeur
}
?>
