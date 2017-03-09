<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/config/layoutsettings.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/admin/admintmpl/tmpl_headercreateaccount.php');
?>
    
    <!-- Middle Content Big -->
    <div class="maincontent">

        <!-- Linker Menu -->
        <div class="leftmenu">
    <?php include("leftmenu.php"); ?>
    </div>

    
    <!-- Middle Content -->
        <div class="main">
<h1>Cre&euml;er een nieuw account</h1><br>

<form id='createForm' action='processform.php' method='post' accept-charset='UTF-8'>
<Table border="0">
<tr>
<td><label for="username" >Gebruikersnaam: </label></td>
<td><input type="text" name="gebruiker" id="username" maxlength="13" /></td>
</tr>
    <tr>
<td><label for="password" >Wachtwoord:</label></td>
<td><input type="password" name="wachtwoord" id="password" maxlength="50" /></td>
    </tr>
        <tr>
    <td><label for="passwordConfim" >Wachtwoord: (ter bevestiging)</label></td>
    <td><input type="password" name="wachtwoordConfirm" id="passwordConfirm" maxlength="50" onblur="checkPasswordMatch();" /></td>
    </tr>
        <tr>
        <td><div class="registrationFormAlert" id="divCheckPasswordMatch"></div></td>
        </tr>
    <tr>
<td><label for="email" >Email:</label></td>
<td><input type="text" name="email" id="email" maxlength="50" /></td>

    </tr>
    <tr>
<td><label for="gebruikerslevel" >Gebruikerslevel:</label></td>
<td><input type="text" name="gebruikerslevel" id="gebruikerslevel" maxlength="50" /></td>
</tr>
    
 </Table>
<input type="submit" class="submit" value="Doorgaan" /></input>
</form>
        </div>

    </div>
    <!-- Einde  Content -->
    
    
    
<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/raymexworkingstation/tmpl/tmpl_footer.php');
?> 