<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" /><br />
<input type="text" name="username" size="20" />
<input type="password" name="password" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>