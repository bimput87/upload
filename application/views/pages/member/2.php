<h1>Page 2</h1>
<?php  
	echo anchor('member/logout/', 'Logout');
	echo "</br>";
	echo anchor('member', 'Index');
	echo "	";
	echo anchor('member/page/1', 'Page 1');
	echo "	";
	echo anchor('member/page/2', 'Page 2');
	echo "	";
	echo anchor('member/page/3', 'Page 3');
?>