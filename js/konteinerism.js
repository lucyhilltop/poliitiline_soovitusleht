function getData(id) {
		$.post('ajax/data.php', {ID:id}, function(data){
		showContainer(data);
		
		});
	}
	
function showContainer(data) {
		document.getElementById("nurkkonteiner").style.visibility="visible"
		alert((data));
		//muudame konteineri andmed oigeks
		document.getElementById("nimi").innerHTML = data;

	}