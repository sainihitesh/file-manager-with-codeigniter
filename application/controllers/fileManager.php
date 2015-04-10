<?php
   class fileManager extends CI_Controller
   {
   	 //home page
      function index()
      {
      	$this->load->library('form_validation');
      	$data['title']="Home";
      	$data['surl']='';
      	$this->load->helper(array("url","form","file","date"));
      	$this->load->view("template_hf/header",$data);
      	$this->load->view('template_hf/navbar');
      	$this->load->view('Dir_show');
      }
      // showing directories and their info
      function dirs()
      {
        $this->load->library('form_validation');
      	$data['title']="Home";
      	$this->load->helper(array("url","form","file","date"));
      	$this->load->view("template_hf/header",$data);
      	$this->load->view('template_hf/navbar');
      	$this->form_validation->set_rules('search','Search', 'required');
      	if ($this->input->get('search')!='') 
      	{     
      		    $data['surl']=$this->input->get('search');
      		    
      		    $this->load->view('Dir_show',$data);
      	 if(is_dir($this->input->get('search')))
            {
      		    $dir=get_dir_file_info($this->input->get('search'));
              	if($dir!=NULL)
              	{	
              	$data['dir']=$dir;
              	$this->load->view('dirs',$data);
                $data['location']=$this->input->get('search');
                $this->load->view('template_hf/sidebar',$data);
                }
                else
                {
                }
            }
            else if(is_file($this->input->get('search')))
            {
            	$url=base_url().'index.php/fileManager/fileEdit?search='.$this->input->get('search')."&edit=VIEW";
            	header("Location:$url");
            }
            else
            {
              $this->load->view('errors/html/error_404');
            }

      	}
      	else
      	{
      		      $data['surl']='';

      		      $this->load->view('Dir_show',$data);
      	}
      }
      // showing a file and its info
    function files()
    {
       $this->load->helper(array("url","form","file","date"));  
       if ($this->input->get('search')!='') 
       {
       	   if (is_file($this->input->get('search'))) 
       	   {
       	   	  $data['title']=$this->input->get('search');
       	   	  $this->load->view('template_hf/header',$data);
       	   	  $this->load->view('template_hf/navbar');
       	   	  $data['file_name']=$this->input->get('search');
       	   	  $data['files_info']=get_file_info($this->input->get('search'));
              $this->load->view('template_file/show_file',$data);  
       	   }
       }
       else
       {

       }
    }   
    // choosing options for editing a file  
    function fileEdit()
      {
      	
      	$this->load->helper(array("url","form","file","date")); 
      if($this->input->get('search')!=''&&$this->input->get('edit')!='')	
      	if (is_file($this->input->get('search'))) 
      	{
      		if ($this->input->get('edit')=='RUN') 
      		{
      			$url=base_url().''.$this->input->get('search');
      			header("Location:$url");
      		}
      		else if ($this->input->get('edit')=='VIEW') 
      		{
      			$data['title']=$this->input->get('search');
      			$this->load->view("template_hf/header",$data);
            	$this->load->view('template_hf/navbar');
            	$data['file_name']=$this->input->get('search');
            	$data['file_data']=htmlspecialchars(read_file($this->input->get('search')));
                $this->load->view('template_fileEdit/VIEW_file',$data);     		    
      		}
      		else if ($this->input->get('edit')=='EDIT') 
      		{
      			$data['title']=$this->input->get('search');
      			$this->load->view("template_hf/header",$data);
            	$this->load->view('template_hf/navbar');
            	$data['file_name']=$this->input->get('search');
            	$data['file_data']=read_file($this->input->get('search'));
            	$this->load->view('template_fileEdit/EDIT_file',$data); 
      		}
      		else if($this->input->get('edit')=='RENAME')
      		{
                
      		}
      	}}
      //saving edited data in a file 
      function EDITfileSave()
        {
        	$this->load->helper(array("url","form","file","date")); 
        	if ($this->input->post('edit_Data')!=''&&$this->input->post('file_address')!='') 
        	{
               if(is_file($this->input->post('file_address'))) 
               {
               	 $do=write_file($this->input->post('file_address'),$this->input->post('edit_Data'));
                 if(!$do)
                   {
                     echo "Error occured when writing to a file";
                   }
                   else
                   {
                   	 $loc=base_url().'index.php/fileManager/fileEdit?search='.$this->input->post('file_address').'&edit=VIEW';
                   	 header("Location:$loc");
                     
                   }                 
               }
        	}
        }
        //creating file and directory
        function create()
        {
        	$this->load->helper(array("url","form","file","date")); 
        	if ($this->input->post('create_name')!=''&&$this->input->post('location')!='') 
        	{
              $direc=$this->input->post('location').'/'.$this->input->post('create_name');
              if ($this->input->post('create')=='Create Directory') 
              {
                         $create=@mkdir($direc, 0700); 
                         if (!$create) 
                             {
                               echo "<center>Error Occured";
                             }
                         else{
                              $loct=base_url().'index.php/fileManager/dirs?search='.$direc;
                              header("Location:$loct");
                             }        
              }
              else if($this->input->post('create')=='Create File')
              {
                         $create=@touch($direc);
                          if (!$create) 
                             {
                               echo "<center>Error Occured";
                             }
                         else{
                              $loct=base_url().'index.php/fileManager/files?search='.$direc;
                              header("Location:$loct");
                             } 
              }     
              else if($this->input->post('create')=='Search this Directory')
              {

              } 
          }		
        }	
      
   }