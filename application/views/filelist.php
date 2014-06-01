<a href="<?php echo base_url();?>index.php/upload/">Upload Image</a>
<table border=1>
<tr>
  <th>User</th>
  <th>Device</th>
  <th>IP</th>
  <th>Country</th>
  <th>City</th>
  <th>ISP</th>
  <th>Position (lat;lng)</th>
  <th>Image</th>
  <th>Timestamp</th>
</tr>
<?php foreach ($filelist as $item):?>
<tr>
  <td><a href="<?php echo base_url();?>index.php/filemanagement/byid/<?php echo $item['userid'] ?>"><?php echo $item['user'] ?></a></td>
  <td><?php
  if(!empty($item['device']))
  {?>
    <a href="<?php echo base_url();?>index.php/filemanagement/byid/<?php echo $item['userid'] ?>/<?php echo $item['device'] ?>"><?php echo $item['device'] ?></a>
<?php
  }
    ?></td>
  <td><?php
  if($item['ip'] === "*"){
    echo $item['ip'];
  } else {
    echo "<a href=".base_url()."index.php/filemanagement/trace/".$item['ip'].">".$item['ip']."</a>";
  } ?></td>
  <td><?php echo $item['country']; ?></td>
  <td><?php echo $item['city'] ?></td>
  <td><?php echo $item['isp'] ?></td>
  <td><a href="<?php echo base_url();?>index.php/filemanagement/location/<?php echo $item['latitude'] ?>/<?php echo $item['longitude'] ?>" onclick="return popitup('<?php echo base_url();?>index.php/filemanagement/location/<?php echo $item['latitude'] ?>/<?php echo $item['longitude'] ?>')"><?php echo $item['latitude'] ?>;<?php echo $item['longitude'] ?></td>
  <td><a href="<?php echo base_url();?>uploads/<?php echo $item['filename'] ?>" onclick="return popitup('<?php echo base_url();?>uploads/<?php echo $item['filename'] ?>')"><?php echo $item['filename'] ?></a></td>
  <td><?php echo $item['timestamp'] ?></td>
</tr>
<?php endforeach; ?>
</table>