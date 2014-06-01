hop;ip;country;city;isp;latitude;longitude;<br>
<?php $hop = 0; foreach ($output as $item):?>
<?php $hop = $hop+1; echo $hop ?>;<a href="<?php echo base_url();?>index.php/filemanagement/trace/<?php echo $item['ip'] ?>"><?php echo $item['ip'] ?></a>;<?php echo $item['country'] ?>;<?php echo $item['city'] ?>;<?php echo $item['isp'] ?>;<?php echo $item['latitude'] ?>;<?php echo $item['longitude'] ?>;<br>
<?php endforeach; ?>