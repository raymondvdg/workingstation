<!-- begin tmpl_footer -->
    
    

    </div>
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script>!window.jQuery && document.write('<script src=src="http://cdn.jquerytools.org/1.2.7/full/jquery.tools.min.js"><\/script>')</script>
	<script>
	//initialize with 3
	var startingNo = 1;
	var $node = "";
	for(varCount=0;varCount<=startingNo;varCount++){
		var displayCount = varCount+1;
                
          $node += '<tr><td>Lading Gegevens</td></tr><tr><td>Aantal | type | cbm | kg</td></tr><tr><td><input type="text" name="cargoAantal'+displayCount+'" size="5" maxlength="5"><input type="text" name="cargoType'+displayCount+'" size="5" maxlength="8"><input type="text" name="cargoCbm'+displayCount+'" size="5" maxlength="5"><input type="text" name="cargoKg'+displayCount+'" size="5" maxlength="6"></td></tr><tr><td>Lading omschrijving</td></tr><tr><td><input type="text" name="cargoOmschrijving'+displayCount+'"></td></tr>';
	}
	$('cargo_div').prepend($node);
	
	$('cargo_div').on('click', '.removeVar', function(){
		$(this).parent().remove();
		//varCount--;
	});

	$('#addVar').on('click', function(){
		//new node
		varCount++;
          $node = '<tr><td>Lading Gegevens</td></tr><tr><td>Aantal | type | cbm | kg</td></tr><tr><td><input type="text" name="cargoAantal'+varCount+'" size="5" maxlength="5"><input type="text" name="cargoType'+varCount+'" size="5" maxlength="8"><input type="text" name="cargoCbm'+varCount+'" size="5" maxlength="5"><input type="text" name="cargoKg'+varCount+'" size="5" maxlength="6"></td></tr><tr><td>Lading omschrijving</td></tr><tr><td><input type="text" name="cargoOmschrijving'+varCount+'"></td></tr>';
    		$(this).parent().before($node);
	});
	
	
	</script> -->

    </body>
</html>