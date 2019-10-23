<!DOCTYPE html>
<html>
    <head>
       
    </head>
    <body>



       
                    <h3 style="margin:-5px 0px 6px 15px;">Administrator</h3>
                  
                      
                    </div>
                    <p class="nama">Admin</p>
                   

                <br></br>
                
                <ul class="list-unstyled CTAs">
                    
            
                        <?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Smartphone.xls");
	?>
                                   
               
            <h2 class="jdl" style="margin-left:20px;">Daftar <i>Smartphone</i></h2>
    
           
          <table class="demo-table" style="margin-left:10px">
            
                <thead>
                <tr>
                    <th style="width:20px">No</th>
                    <th style="width:80px">Merek</th>
                    <th style="width:130px">Tipe</th>
                    <th style="width:40px">Processor</th>
                    <th style="width:40px">RAM</th>
                    <th style="width:40px">Memori</th>
                    <th style="width:120px">Kamera</th>
                    <th style="width:60px">Baterai</th>
                    <th style="width:40px">Ukuran Layar</th>
                    <th style="width:100px">Harga</th>
                   
                </tr>
                </thead>
                <tbody></tbody>
          
            
            
            <?php
            include '../config/koneksi.php';
            $no =1;
            $data = mysqli_query($koneksi,"SELECT * FROM data_smartphone ORDER BY merek ASC");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td style="text-align:center"><?php echo $no++; ?></td>
                    <td class="align-middle"><?php echo $d['merek'];?></td>
                    <td class="align-middle"><?php echo $d['type'];?></td>
                    <td class="align-middle"><?php echo $d['processor'];?></td>
                    <td class="align-middle"><?php echo $d['ram'];?></td>
                    <td class="align-middle"><?php echo $d['memori'];?></td>
                    <td class="align-middle"><?php echo $d['kamera'];?></td>
                    <td class="align-middle"><?php echo $d['baterai'];?></td>
                    <td class="align-middle"><?php echo $d['ukuran_layar'];?></td>
                    <td class="align-middle"><?php echo $d['harga']; ?></td>
             
            </tr>
            <?php


            }
            ?>
    
        </div>
        
         
                    
                    
         
                            
                        </div>

                        
                          
                        </div>
                    </div>
                </nav>

           
            </div>

               

                
    


            

        <!-- jQuery CDN -->
         <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
         <script src="js/jquery.min.js"></script>
         <script src="js/bootstrap.min.js"></script>
         <script src="js/ajax.js"></script>


         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
