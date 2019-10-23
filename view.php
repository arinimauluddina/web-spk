<?php
include_once('./config/fungsi.php');
$id = $_POST['id'];
$data = mysqli_query($koneksi, "SELECT * FROM data_smartphone where id_smartphone='$id' ");
 while($d = mysqli_fetch_array($data)){
?>
<table class="detail" style="margin-left:10px" width="600px">
<tbody>
<tr class="specTblCont">
<th class="ttl" colspan="2"><strong>Tahun Rilis</td>
<td><?php echo $d['tahun_rilis'];?></td>
<tr class="specTblCont">
    <th class="ttl" colspan="2"><strong>Harga</td>
    <td><?php echo $d['harga'];?></td>
    </tr>
    <tr class="specTblCont">
    <th class="ttl" colspan="2"><strong>Jaringan</th>
    <td><?php echo $d['teknologi'];?></td>
    </tr>
    <tr class="specTblCont">
    <th class="ttl" rowspan="3"><strong>Body</th>
    <th class="ttl" width="350px"  >Dimensi</th>
    <td><?php echo $d['dimensi'];?></td>
                 </tr>
                 <tr class="specTblCont" >
                    <th class="ttl">Berat</th>
                    <td><?php echo $d['berat'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">SIM</th>
                    <td><?php echo $d['sim'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th width="500px" rowspan="3"><strong>Display</th>
                    <th class="ttl">Type</th>
                     <td><?php echo $d['tipe_layar'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Ukuran</th>
                    <td><?php echo $d['ukuran_layar'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Resolusi</th>
                    <td><?php echo $d['resolusi'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th rowspan="4"><strong>Platform</th>
                    <th class="ttl">OS</th>
                     <td><?php echo $d['os'];?></td>
                 </tr>
                 <tr class="specTblCont"> 
                    <th class="ttl">Chipset</th>
                    <td><?php echo $d['chipset'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">CPU</th>
                    <td><?php echo $d['processor'];?> | <?php echo $d['kecepatan_cpu'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th class="ttl">GPU</th>
                    <td><?php echo $d['gpu'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th rowspan="3"><strong>Memory</th>
                    <th class="ttl">Eksternal</th>
                     <td><?php echo $d['card_slot'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Internal</th>
                    <td><?php echo $d['memori'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th class="ttl">RAM</th>
                    <td><?php echo $d['ram'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th rowspan="2"><strong>Kamera & Video</th>
                    <th class="ttl">Kamera</th>
                     <td><?php echo $d['kamera'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Video</th>
                    <td ><?php echo $d['kualitas_video'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th rowspan="4"><strong>Komunikasi</th>
                    <th class="ttl">WLAN</th>
                     <td><?php echo $d['wlan'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Bluetooth</th>
                    <td><?php echo $d['bluetooth'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th class="ttl">GPS</th>
                    <td><?php echo $d['gps'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th class="ttl">USB</th>
                    <td ><?php echo $d['usb'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th colspan="2"><strong> Fitur</th>
                    <td ><?php echo $d['fitur'];?></td>
                </tr>
                  <tr class="specTblCont">
                    <th rowspan="3"><strong>Baterai</th>
                    <th class="ttl">Kapasitas</th>
                     <td ><?php echo $d['baterai'];?></td>
                 </tr>
                 <tr class="specTblCont">
                    <th class="ttl">Tipe Baterai</th>
                    <td><?php echo $d['tipe_baterai'];?></td>
                </tr>
                <tr class="specTblCont">
                    <th class="ttl">Charging</th>
                    <td ><?php echo $d['charging'];?></td>
                </tr>
                 <tr class="specTblCont">
                    <th colspan="2"><strong> Warna</th>
                    <td ><?php echo $d['warna'];?></td>
                </tr>

                
                  
                
                    
            </tr>
            <?php
            }
            ?>
            </tbody> 
            </table>
        </div>
    </div>
</div>

          
           
       
    </table>
</div>
</div>
</div>
</div>
</div>
 