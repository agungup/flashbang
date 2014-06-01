<table border=1>
  <tr>
    <th>Hop</th>
    <th>IP</th>
    <th>Country</th>
    <th>City</th>
    <th>ISP</th>
    <th>Position (lat;lng)</th>
  </tr>
<?php $hop = 0; foreach ($output as $item):?>
  <tr>
    <td><?php $hop = $hop+1; echo $hop ?></td>
    <td><?php
  if($item['ip'] === "*"){
    echo $item['ip'];
  } else {
    echo "<a href=".base_url()."index.php/filemanagement/trace/".$item['ip'].">".$item['ip']."</a>";
  } ?></td>
    <td><?php echo $item['country'];?></td>
    <td><?php echo $item['city'] ?></td>
    <td><?php echo $item['isp'] ?></td>
    <td><a href="<?php echo base_url();?>index.php/filemanagement/location/<?php echo $item['latitude'] ?>/<?php echo $item['longitude'] ?>" onclick="return popitup('<?php echo base_url();?>index.php/filemanagement/location/<?php echo $item['latitude'] ?>/<?php echo $item['longitude'] ?>')"><?php echo $item['latitude'] ?>;<?php echo $item['longitude'] ?></td>
  </tr>
<?php endforeach; ?>
</table>