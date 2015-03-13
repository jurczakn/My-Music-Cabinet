function listMySongs (mySongs) {

	var table = document.getElementById("mySongs");

	while (table.firstChild){

		table.removeChild(table.firstChild);
	}

	var cap = document.createElement('caption');

	cap.textContent = "My Songs";

	table.appendChild(cap);

	var tr = document.createElement('tr');
	
	var id = document.createElement('th');

	id.textContent = "Id";

	tr.appendChild(id);
	
	var artist = document.createElement('th');

	artist.textContent = "artist";

	tr.appendChild(artist);

	var title = document.createElement('th');

	title.textContent = "title";

	tr.appendChild(title);

	var album = document.createElement('th');

	album.textContent = "album";

	tr.appendChild(album);

	var length = document.createElement('th');

	length.textContent = "Length";

	tr.appendChild(length);

	var genre = document.createElement('th');

	genre.textContent = "genre";

	tr.appendChild(genre);

	var shared = document.createElement('th');

	shared.textContent = "shared";

	tr.appendChild(shared);

	table.appendChild(tr);

	for (var i = 0; i < mySongs.length; i++){

		var trr = document.createElement('tr');
	
		var id2 = document.createElement('td');

		id2.textContent = mySongs[i].id;

		trr.appendChild(id2);
	
		var n = document.createElement('td');

		n.textContent = mySongs[i].artist;

		trr.appendChild(n);

		var c = document.createElement('td');

		c.textContent = mySongs[i].title;

		trr.appendChild(c);
	
		var al = document.createElement('td');

		al.textContent = mySongs[i].album;

		trr.appendChild(al);

		var l = document.createElement('td');

		l.textContent = mySongs[i].length.toFixed(2);

		trr.appendChild(l);

		var g = document.createElement('td');

		g.textContent = mySongs[i].genre;

		trr.appendChild(g);

		var r = document.createElement('td');

		if (mySongs[i].shared) {

			r.textContent = "public";

		}

		else{

			r.textContent = "private";

		}

		trr.appendChild(r);

		var delBut = document.createElement("BUTTON");

		delBut.type = "button";

		delBut.value = "owned="+mySongs[i].owner+"&id="+mySongs[i].id+"&file="+mySongs[i].file;

		delBut.textContent = "DELETE";
		
		trr.appendChild(delBut);

		var play = document.createElement("audio");

		var song = document.createElement("source");

		song.src = mySongs[i].file;

		song.type = "audio/mpeg";
		
		play.setAttribute("controls", "controls");

		play.appendChild(song);

		trr.appendChild(play);

		table.appendChild(trr);

		delBut.addEventListener('click', function(){

			var reg = new XMLHttpRequest();

			if(!reg){

				throw 'Unable to create HttpRequest.';

			}

			var vars;
			
			vars = this.value;

			reg.onreadystatechange = function(){

				if(this.readyState === 4){

					getMySongs();

				}

			};

			var url = 'http://web.engr.oregonstate.edu/~jurczakn/deleteSong.php';

			reg.open('POST', url);

			reg.setRequestHeader("Content-type","application/x-www-form-urlencoded");

			reg.send(vars);


		});

	}

};


function getMySongs () {

	var baseurl = 'http://web.engr.oregonstate.edu/~jurczakn/mySongs.php';

	var reg = new XMLHttpRequest();
	
		if(!reg){

			throw 'Unable to create HttpRequest.';

		}


	var url = baseurl;
	
	reg.open('GET', url);

	reg.send();

	reg.onreadystatechange = function(){

		if(this.readyState === 4){

			var mysongs  = JSON.parse(this.responseText);

			console.log(mysongs);

			listMySongs(mysongs);

		}

	}

};

function listPopSongs (mySongs) {

	var table = document.getElementById("popSongs");

	while (table.firstChild){

		table.removeChild(table.firstChild);
	}

	var cap = document.createElement('caption');

	cap.textContent = "Popular Songs";

	table.appendChild(cap);

	var tr = document.createElement('tr');
	
	var id = document.createElement('th');

	id.textContent = "Id";

	tr.appendChild(id);
	
	var artist = document.createElement('th');

	artist.textContent = "artist";

	tr.appendChild(artist);

	var title = document.createElement('th');

	title.textContent = "title";

	tr.appendChild(title);

	var album = document.createElement('th');

	album.textContent = "album";

	tr.appendChild(album);

	var length = document.createElement('th');

	length.textContent = "Length";

	tr.appendChild(length);

	var genre = document.createElement('th');

	genre.textContent = "genre";

	tr.appendChild(genre);

	var shared = document.createElement('th');

	shared.textContent = "user";

	tr.appendChild(shared);

	table.appendChild(tr);

	for (var i = 0; i < mySongs.length; i++){

		var trr = document.createElement('tr');
	
		var id2 = document.createElement('td');

		id2.textContent = mySongs[i].id;

		trr.appendChild(id2);
	
		var n = document.createElement('td');

		n.textContent = mySongs[i].artist;

		trr.appendChild(n);

		var c = document.createElement('td');

		c.textContent = mySongs[i].title;

		trr.appendChild(c);
	
		var al = document.createElement('td');

		al.textContent = mySongs[i].album;

		trr.appendChild(al);

		var l = document.createElement('td');

		l.textContent = mySongs[i].length.toFixed(2);

		trr.appendChild(l);

		var g = document.createElement('td');

		g.textContent = mySongs[i].genre;

		trr.appendChild(g);

		var r = document.createElement('td');

		r.textContent = mySongs[i].user;

		trr.appendChild(r);

		var addBut = document.createElement("BUTTON");

		addBut.type = "button";

		addBut.value = "id="+mySongs[i].id+"&artist="+mySongs[i].artist+"&title="+mySongs[i].title+"&album="+mySongs[i].album+"&genre="+mySongs[i].genre+"&length="+mySongs[i].length+"&file="+mySongs[i].file+"&shared="+mySongs[i].shared;

		addBut.textContent = "ADD";
		
		trr.appendChild(addBut);

		var play = document.createElement("audio");

		var song = document.createElement("source");

		song.src = mySongs[i].file;

		song.type = "audio/mpeg";
		
		play.setAttribute("controls", "controls");

		play.appendChild(song);

		trr.appendChild(play);

		table.appendChild(trr);

		addBut.addEventListener('click', function(){

			var reg = new XMLHttpRequest();

			if(!reg){

				throw 'Unable to create HttpRequest.';

			}

			var vars;
			
			vars = this.value;

			reg.onreadystatechange = function(){

				if(this.readyState === 4){

					getMySongs();

				}

			};

			var url = 'http://web.engr.oregonstate.edu/~jurczakn/addSong.php';

			reg.open('POST', url);

			reg.setRequestHeader("Content-type","application/x-www-form-urlencoded");

			reg.send(vars);


		});


	}

};


function getPopSongs() {

	var baseurl = 'http://web.engr.oregonstate.edu/~jurczakn/popSongs.php';

	var reg = new XMLHttpRequest();
	
		if(!reg){

			throw 'Unable to create HttpRequest.';

		}


	var url = baseurl;
	
	reg.open('GET', url);

	reg.send();

	reg.onreadystatechange = function(){

		if(this.readyState === 4){

			var popsongs  = JSON.parse(this.responseText);

			console.log(popsongs);

			listPopSongs(popsongs);

		}

	}

};

window.onload = function() {

	getMySongs();

	getPopSongs();

};
