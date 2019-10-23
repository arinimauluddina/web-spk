<div class="table-responsive">
          <table class="table table-bordered table-hovered table-condensed">
            
                <thead>
                <tr>
                    <th>No</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Processor</th>
                    <th>RAM</th>
                    <th>Memori</th>
                    <th>Kamera</th>
                    <th>Baterai</th>
                    <th>Ukuran Layar</th>
                    <th>Harga</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody></tbody>
          
            
            
            <?php
            include '../config/koneksi.php';
                 
            $no =1;
            $data = mysqli_query($koneksi,"SELECT * FROM data_smartphone");
            while($d = mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td class="align-middle"><?php echo $no++; ?></td>
                    <td class="align-middle"><?php echo $d['merek'];?></td>
                    <td class="align-middle"><?php echo $d['type'];?></td>
                    <td class="align-middle"><?php echo $d['processor'];?></td>
                    <td class="align-middle"><?php echo $d['ram'];?></td>
                    <td class="align-middle"><?php echo $d['memori'];?></td>
                    <td class="align-middle"><?php echo $d['kamera'];?></td>
                    <td class="align-middle"><?php echo $d['baterai'];?></td>
                    <td class="align-middle"><?php echo $d['ukuran_layar'];?></td>
                    <td class="align-middle"><?php echo $d['harga']; ?></td>
                    <td><img src="../admin/img/smartphone/<?php echo $d['gambar'];?>"width="100"></td>
                    <td>
                        <a href="edit_smartphone.php?id=<?php echo $d['id_smartphone'];?>">edit</a> |
                        <a href="hapus_smartphone.php ?id=<?php echo $d['id_smartphone'];?>" onclick="return confirm ('Apakah Yakin dihapus');">hapus</a>
            </td>
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