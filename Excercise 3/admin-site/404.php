<?php 
    if (isset($_POST['sendURL'])) {
        $url = $_POST['url'];
        $headers = @get_headers($url);
        if(strpos($headers[0],'404') === false)
        {
        echo "URL Exists";
        }
        else
        {
        echo "URL Not Exists";
        }
    }
?>

<form method="POST" role="form">
    <div class="form-group">
        <label for="">URL</label>
        <input type="text" name="url" value="" required="required">
    </div>

    <input name="sendURL" type="submit" value="Submit">
</form>