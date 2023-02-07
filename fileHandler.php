<?php
if (isset($_POST['upload'])) {
    $file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('fmu');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                if (file_exists('/var/www/html/implementations/edc/uploads/'.$fileName)) {
                    echo "Datei existiert bereits!";
                } else {
                    #$fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '/var/www/html/implementations/edc/uploads/' . $fileName;
                    $didupload = move_uploaded_file($fileTmpName, $fileDestination);
                    if ($didupload) {
			echo "Upload erfolgreich";
		    } else {
			echo "Fehler";
		    }
                }
            } else {
                echo "Die Datei ist zu groß!";
            }
        } else {
            echo "Beim Hochladen trat ein Fehler auf!";
        }
    } else {
        echo "Dieser Datentyp kann nicht hochgeladen werden!";
    }
}

if (isset($_POST['show'])) {
    if ($handle = opendir('/var/www/html/implementations/edc/uploads')) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                echo "$entry\n";
            }
        }
        closedir($handle);
    }
}

if (isset($_POST['download'])) {
    if (isset($_POST['filename']) && $_POST['filename'] != '' && isset($_POST['downloadDir']) && $_POST['downloadDir'] != '') {
        $fileNameDownload = $_POST['filename'];
        $fileURL = '/var/www/html/implementations/edc/uploads/' . $fileNameDownload;
        $downloadDestination = $_POST['downloadDir'] . '\\' . $fileNameDownload;

        file_put_contents($downloadDestination, file_get_contents($fileURL));
        echo "Download erfolgreich!";
    }
}
if (isset($_POST['dowload'])) {
    if (isset($_POST['filename'])) {
	$fmu = $_POST['filename'];
	$command = escapeshellcmd("/var/www/html/implementations/edc/test_import.py");
	$output = shell_exec($command);
	echo $output;
	}
    }
?>
