<?php
function menu()
{	
	if($GLOBALS['nojunk']==TRUE){return;}

	echo '		<form method=post>
					<table>		
						<tr>

							<td>
								<button  class=" btn btn-primary btn-block"  
										type=button onclick="showhidemenu(\'button2\')">Salary
								</button>
								  <table  id="button2" class="menu" style="position: absolute;display:none;z-index:100;">
									   <tr><td>
										   <button class="btn btn-primary btn-block"  formaction=salary_type.php 
										   type=submit onclick="hidemenu()" >Salary Type</button>
									   </td></tr>
										<tr><td>
											<button class="btn btn-primary btn-block"  formaction=nonsalary_type.php 
											type=submit onclick="hidemenu()" >Nonsalary type</button>
										</td></tr>
									</table>	
							</td>
        
							<td>
								<button  class=" btn btn-primary btn-block"  type=button onclick="showhidemenu(\'button3\')">Manage My Account('.$_SESSION['login'].')
								</button>
									<table  id="button3" class="menu" style="position: absolute;display:none;z-index:100;">
									   <tr><td>
										   <button class="btn btn-primary btn-block"  formaction=index.php type=submit onclick="hidemenu()" name=logout>Logout</button>
									   </td></tr>
										<tr><td>
											<button class="btn btn-primary btn-block"  formaction=change_password.php type=submit onclick="hidemenu()" name=change_pwd>Change Password</button>
										</td></tr>
									</table>	
							</td>

						</tr>
					</table>  
				</form>';

}


?>
