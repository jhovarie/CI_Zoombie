<form action="<?= base_url() ?>fileupload/uploadcsv_store" method="post" enctype="multipart/form-data">
    <?= setToken() ?>
    <table width="385" border="1" align="center">
        <tr>
            <td width="140">Upload File </td>
            <td width="229"><label>
                    <input type="file" name="file" required>
                </label></td>
        </tr>
        <tr>
            <td><input name="Upload" type="submit" id="Upload" value="Upload File"></td>
            <td><label></label></td>
        </tr>
    </table>