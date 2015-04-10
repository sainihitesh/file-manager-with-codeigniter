
    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">

          
          <div class="jumbotron">

            <?php $form=array("method"=>"GET");echo form_open('fileManager/dirs',$form);?>
            <input type='text' name='search' style="width:70%"class="btn btn-primary btn-large" placeholder="Search for projects..." required>
            <input type='submit' class="btn btn-primary btn-large" value='Search'/>
            </form>
           <br>Search for:
          <a href="<?php echo base_url();?>index.php/fileManager/dirs?search=<?php echo $surl;?>"><?php echo $surl;?></a>

            </div>

          <!--/row-->
        <!--/.col-xs-12.col-sm-9-->

        <!--/.sidebar-offcanvas-->
      <!--/row-->

    <!--/.container-->


    