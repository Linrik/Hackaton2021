$(document).ready(function(){
	var møteDb;
	var komDb
	//henter kommentarer(ajax)
	$.getJSON("møter.php", "kommentar.php", function(data){
		møteDb = data;
		console.log(møteDb);
	})
	.done(function(){
		$.each(møteDb, function(key, value){
			$("div.arrangamanger").append(
				 "<div class='inlegg'><h3>" + value.tittel+"</h3>"+
				 "<span>"+ value.Brukernavn + "</span><p>" + value.beskrivelse + "</p>" + "<span>" +
				 value.dato + " " + value.tid + "</span> <form method='post'>"+
				"<input type='hidden' name='argId' value='"+ value.argId +"''>"+
				"<button type='submit' class='knapp' name='delta'>delta</button>"+
				"</form><form method='post'><label>Skriv inn kommentar</label>"+
				 "<textarea name='kommentar'></textarea>"+
				 "<input type='hidden' name='argId' value='"+ value.argId +"''>"+
				 "<button type='submit' class='knapp' name='kommenter'>kommenter</button></form></br>"+
				 "<div class='kommentar'></div></div>"
			);
		})
		$.each(komDb, function(key, kom){
			$("div.kommentar").append(
				"<p>test</p>"
			);
		})
	})
	.fail(function(){
		alert("Fant ikke arrangementer");
	});
});