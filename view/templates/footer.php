<!-- begin footer -->
<?php
function print_foot(){
$f= '<footer><p>Web Site last changed on '. date('M')."-".date('Y').'</p>
<p><?php 
?></p></footer>
</body>
</html>';
return $f;
}