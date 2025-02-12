<td><?php   echo $record->customer ?>   </td>
<?php 
$location = $record->table->location->name ?? '';
$table_number = $record->table->table_number ?? '';
  ?>
<td><?php   echo $table_number." | ". $location; ?>   </td>
<td><?php   echo $status[$record->status] ?>   </td>
<td><?php   echo $record->paid_by ?>   </td>
<td><?php   echo $record->description ?>   </td>
