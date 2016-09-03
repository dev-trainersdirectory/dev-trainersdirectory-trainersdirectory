Bulk Upload Students
<input type="button" value="Download Sample Document" onclick="window.open('<?=base_url()?>admin_bulk_upload/download_sample_document')" />
<form id="frm_bulk_upload_users" method="post" action="<?=base_url()?>admin_bulk_upload/addUsers" enctype="multipart/form-data"> 
    <input type="file" name="bulk_upload">
    <select name="user_type">
    	<option value="3">Trainers</option>
    	<option value="2">Students</option>
    </select>
    <input type="submit" value="Upload">
</form>