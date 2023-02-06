<!DOCTYPE html>
<html>

<head>
    <title>Index Page</title>
</head>

<body>
    <form action="fileHandler.php" method="POST" enctype="multipart/form-data" target="myIframe">
        <input type="file" name="file">
        <button type="upload" name="upload">Upload</button>
        <button type="show" name="show">Zeige Dateien</button>
        <input type="text" name="filename" value="filename">
        <input type="text" name="downloadDir" value="Download Directory">
        <button type="download" name="download">Download</button>
    </form>
    <iframe frameborder="0" name="myIframe"></iframe>
</body>
</html>