<?php
mysql_connect('localhost','root','')or die ('cant connect '.mysql_error());
mysql_select_db('airline')or die ('cant select '.mysql_error());
?>