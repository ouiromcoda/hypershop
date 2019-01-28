<div class="fileupload fileupload-new" data-provides="fileupload">
    <span class="btn btn-file btn-default">
        <span class="fileupload-new">Select file</span>
        <span class="fileupload-exists">Change</span>
        <input onclick="getTypeLoad(1)" type="file" name="fileInput"/>
    </span>
    
</div>




<script>

    $(function()
    {
        //file input field trigger when the drop box is clicked
        $("#dropBox").click(function(){
            $("#fileInput").click();
        });
        
        //prevent browsers from opening the file when its dragged and dropped
        $(document).on('drop dragover', function (e) {
            e.preventDefault();
        });

        //call a function to handle file upload on select file
        $('input[type=file]').on('change', fileUpload);
    });



  function fileUpload(event)
  {
      //notify user about the file upload status
      $("#dropBox").html(event.target.value+" uploading...");
      
      //get selected file
      files = event.target.files;
      
      //form data check the above bullet for what it is  
      var data = new FormData();                                   

      //file data is presented as an array
      for (var i = 0; i < files.length; i++) 
      {
          var file = files[i];

          if(file.size > 1048576)
          {
              //check file size (in bytes)
              $("#dropBox").html("Sorry, your file is too large (>1 MB)");
          }
          else
          {
              //append the uploadable file to FormData object
              data.append('file', file, file.name);
                
              $.ajax({
                url: 'http://hypersms.development/client/uploadFileContactAjax2',
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery will tell the server its a query string request
                success: function(data)
                {

                  var donneGet=data;

                  console.log('donneGet.statut: ' + donneGet.statut);

                  if(donneGet.statut=='1')
                  {
                    var jsonData =donneGet.formData;

                    var contact='';

                    for(var i =0;i <= jsonData.length - 1; i++)
                    {
                      if(i==0)
                      {
                        contact=jsonData[i].NUMERO;
                      }
                      else
                      {
                        contact=contact+','+jsonData[i].NUMERO
                      }
                      
                    }

                    var typeLoad=document.getElementById("typeSmsLod").value;

                    if(typeLoad==1)
                    {
                        if(contact !='' && contact !=' ')
                        {
                            var table=contact.split(',');

                            var alerte=table.length+' Destinataire(s)';

                            $('#compteurDest').text(alerte);

                            var sms = $("#message").val();

                            if(sms!='' && sms!=' ' && table.length>0)
                            {
                                var cptSms = Math.ceil(sms.length/160);

                                var cptDest=table.length*cptSms;

                                $('#compteurSms').text(cptDest+' SMS total à envoyé(s)');
                            }
                            else
                            {
                                $('#compteurSms').text('0'+' SMS total à envoyé(s)');
                            }
                        }
                        else
                        {
                            var alerte='0'+' Destinataire(s)';

                            $('#compteurDest').text(alerte);

                            $('#compteurSms').text('0'+' SMS total à envoyé(s)');
                        }

                        $('#destinataire').val(contact);

                        //console.log('contact: ' + contact);
                    }
                    else
                    {
                         if(contact !='' && contact !=' ')
                        {
                            var table=contact.split(',');

                            var alerte=table.length+' Destinataire(s)';

                            $('#compteurDest2').text(alerte);

                            var sms = $("#message2").val();

                            if(sms!='' && sms!=' ' && table.length>0)
                            {
                                var cptSms = Math.ceil(sms.length/160);

                                var cptDest=table.length*cptSms;

                                $('#compteurSms2').text(cptDest+' SMS total à envoyé(s)');
                            }
                            else
                            {
                                $('#compteurSms2').text('0'+' SMS total à envoyé(s)');
                            }
                        }
                        else
                        {
                            var alerte='0'+' Destinataire(s)';

                            $('#compteurDest2').text(alerte);

                            $('#compteurSms2').text('0'+' SMS total à envoyé(s)');
                        }

                        $('#destinataire2').val(contact);

                        //console.log('contact: ' + contact);
                    }

                  }
                  else
                  {
                    console.log('errors: ' + donneGet[0].statut);
                  }
                },
                error: function(jqXHR, textStatus, errorThrown)
                {
                  // Handle errors here
                  alert('ERRORS: ');
                  // STOP LOADING SPINNER
                }
            });
          }
      }
  }


  function getTypeLoad(idfactureAv)
  {
    document.getElementById('typeSmsLod').value = idfactureAv;
  }
</script>



<!-- public function uploadFileContactAjax2()
  {
    $json=array();

    $dataJson=array();

    if (!empty($_FILES["file"]["name"])) 
    {

      $ficname=explode(".",$_FILES["file"]["name"]);

    
      if($ficname[count($ficname)-1]=="csv")
      {
        move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/uploads/csv/".$_FILES["file"]["name"]."");
        
        if ($fic = fopen("./assets/uploads/csv/".$_FILES["file"]["name"]."", "r") )
        {

          $cpt=1;

          while(($tab=fgetcsv($fic, 2000000, " ")) !== FALSE)
          {
            $table=array();

            if($tab[0] !="" && $tab[0] !=" ")
            {
              $table['NUMERO']=$tab[0];

              $json[]=$table;
            }

          }

          $dataJson = array('statut' => '1', 'formData' => $json);
        } 
        else
        {
          $dataJson = array('statut' => '0');
        }
      }
      else
      {
        $dataJson = array('statut' => '0');
      }
    }
    else
    {
      $dataJson = array('statut' => '0');
    }

    echo json_encode($dataJson);
  } -->