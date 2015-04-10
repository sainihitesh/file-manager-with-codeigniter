<div class="col-xs-12 col-sm-9"> 
 <div class="jumbotron">
  <div class="panel panel-default">
  <div class="panel-heading"><?php echo $file_name;?></div>
  <div class="panel-body">
  <?php $mt=array('method'=>'GET'); echo form_open('fileManager/fileEdit',$mt);?>  
  <div class="btn-group" role="group" aria-label="...">
  <input name='search' type="hidden" value="<?php echo $title; ?>"/>
  <button type='submit' name='edit' value="RUN" type="button" class="btn btn-default">RUN</button>
  <button type='submit' name='edit' value="VIEW" type="button" class="btn btn-default">VIEW</button>
  <button type='submit' name='edit' value="EDIT" type="button" class="btn btn-default active">EDIT</button>
  <button type='submit' name='edit' value="DELETE" type="button" class="btn btn-default">DELETE</button>
 
</div>    	
</form>
<?php echo form_open('fileManager/EDITfileSave');?>
 <div class="well well-lg">
 <input name='file_address' type="hidden" value="<?php echo $file_name;?>" />
 <textarea name='edit_Data'class="form-control">
   <?php echo $file_data;?>
 </textarea>
 <input class="btn btn-default" name="Edit_it" type="Submit" value="Save" />
 </div>

</div>
</div>