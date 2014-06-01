id;userid;ip;country;city;isp;latitude;longitude;filename;timestamp<br>
<?php foreach ($filelist as $item):?>
<?php echo $item['id'] ?>;<?php echo $item['userid'] ?>;<?php echo $item['ip'] ?>;<?php echo $item['country'] ?>;<?php echo $item['city'] ?>;<?php echo $item['isp'] ?>;<?php echo $item['latitude'] ?>;<?php echo $item['longitude'] ?>;<a href="<?php echo base_url();?>uploads/<?php echo $item['filename'] ?>"><?php echo $item['filename'] ?></a>;<?php echo $item['timestamp'] ?>;<br>
<?php endforeach; ?>