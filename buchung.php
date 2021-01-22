<?php
/*
 * Upload Excel file and display details.
 */
require_once 'db.php';
require_once 'oben.php';

if (isset($_FILES['datei']) && $_POST['neu'] == 1) {
    $uploaded_dir = "./uploadfiles/";
    $tag = date("Y-m-d-H-i-s");
    $filename = $_FILES["datei"]["name"] . "_" . $tag;
    $path = $uploaded_dir . $filename;
    move_uploaded_file($_FILES["datei"]["tmp_name"], $path);
    $upload = 1;
    require_once 'import.php';
}

if ($upload == 1) {
?>
            
                <table class="ohnerahmen">
                    <tr>
                        <td>
<?php
    require_once 'details.php';
?>
                        </td>
                    </tr>
                </table>
<?php
} else {
?>
                <form action="buchung.php" method="post" 
                  enctype="multipart/form-data">
                <table class="ohnerahmen">
                    <tr>
                        <td>
                        Bitte w&auml;hlen Sie eine Exceldatei von Ihrem 
                            Rechner aus.
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="file" name="datei">
                        </td>
                    </tr>
                    <tr>
                        <td class="button">
                            <button type="submit" name="neu" value="1">
                                hochladen</button>
                        </td>
                    </tr>
                </table>
                </form>
                <table class="ohnerahmen">
                    <tr>
                        <td class="mittig" width: 33,33%>
                            <form action="auswahl.php" method="post">
                                <button type="submit" name="neu2" 
                                    class="lila" value="1">
                                Zur &Uuml;bersicht</button>
                            </form>
                        </td>
                    </tr>
                </table>
<?php
}
?>
        </center>
    </body>
</html>