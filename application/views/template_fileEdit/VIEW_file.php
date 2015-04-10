<div class="col-xs-12 col-sm-9"> 
 <div class="jumbotron">
  <div class="panel panel-default">
  <div class="panel-heading"><?php echo $file_name;?></div>
  <div class="panel-body">
  <?php $mt=array('method'=>'GET'); echo form_open('fileManager/fileEdit',$mt);?>  
  <div class="btn-group" role="group" aria-label="...">
  <input name='search' type="hidden" value="<?php echo $title; ?>"/>
  <button type='submit' name='edit' value="RUN" type="button" class="btn btn-default">RUN</button>
  <button type='submit' name='edit' value="VIEW" type="button" class="btn btn-default active">VIEW</button>
  <button type='submit' name='edit' value="EDIT" type="button" class="btn btn-default">EDIT</button>
  <button type='submit' name='edit' value="DELETE" type="button" class="btn btn-default">DELETE</button>
</div>    	
</form>
  <div class="well well-lg">
    <pre style='baackground:white;' class='brush:php'>
    <?php echo $file_data;?>
    </pre>
  </div>  
    </div>
</div>