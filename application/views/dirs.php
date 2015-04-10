<div class="row">
            <?php 
            foreach ($dir as $dirs) {
              if(is_file($this->input->get('search').'/'.$dirs['name']))
                { $ur='files';$info='File';}
              else{
                $ur='dirs';$info='Directory';
              }
            ?>
            <div class="col-xs-6 col-lg-4" title="<?php echo $info;?>">
              <h4><?php echo $dirs['name'];?></h4>
              <p>Size: <?php echo $dirs['size']/1024;?>KB</p>
              <p>Built On: <?php echo unix_to_human($dirs['date']);?></p>
              <p><a class="btn btn-default" href="<?php echo base_url().'index.php/fileManager/'.$ur;?>?search=<?php echo $this->input->get('search').'/'.$dirs['name'];?>" role="button">View details &raquo;</a></p>
            </div>
            
            <?php } ?>
</div
</div></div>
