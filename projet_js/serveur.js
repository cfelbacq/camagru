/***
var http = require('http');
var url = require('url');
var querystring = require('querystring');

var server = http.createServer(function(req, res){
	var page = url.parse(req.url).pathname;
	var params = querystring.parse(url.parse(req.url).query);
	console.log(page);
	res.writeHead(200, {"Content-Type": "text/html"});
	if ('prenom' in params && 'nom' in params)
		res.write('Vous etes ' + params['prenom'] + ' ' + params['nom']);
	else
		res.write('Vous devez bien avoir un prénom et un nom, non ?');
	res.end();
});
server.listen(8080);
***/



// --------------------- EVENEMENT -------------------------------



/***
	var server = http.createServer(function(req, res) {});
	
	équivalent à

	var server = http.createServer();
	server.on('request', function(req, res) {});
***/



/***
var http = require('http');

var server = http.createServer(function(req, res){
	res.writeHead(200);
	res.end('Salut tout le monde');
});

server.on('close', function(){ // on ecoute l'evenement close
	console.log('Bye bye !');
});

server.listen(8080);

server.close(); //arrete le server. declenche l'evenement close
***/



// ----------------- Emettre des evenements ----------------------



/***
var EventEmitter = require('events').EventEmitter;

var jeu = new EventEmitter();

jeu.on('gameover', function(message){
	console.log(message)
});

jeu.on('nouveaujoueur', function(nom, age){
	console.log('nouveau joueur: ' + nom + ' de ' + age + ' ans.');
})

jeu.emit('gameover', 'Vous avez perdu !');
jeu.emit('nouveaujoueur', 'Mario', 35)
***/

// -------------------- ROUTE AVEC EXPRESS -----------------------

// -------------------- SIMPLE -----------------------------------

/***
var express = require('express');

var app = express();

app.get('/', function(req, res){
	res.setHeader('Content-Type', 'text/plain');
	res.end('Vous etes a l\'accueil, que puis-je pour vous?');
});

app.get('/soussol', function(req, res){
	res.setHeader('Content-Type', 'text/plain');
	res.end('Vous etes dans le sous sol.');
});

app.get('/etage/1/chambre', function(req, res){
	res.setHeader('Content-Type', 'text/plain');
	res.end('ZONE INTERDITE');
});

app.use(function(req, res, next){
	res.setHeader('Content-Type', 'text/plain');
	res.send(404, 'Page introuvable !');
});

app.listen(8080);
***/

// -------------------- DYNAMIQUE --------------------------------

/***
app.get('/etage/:etagenum/chambre', function(req, res){
	res.setHeader('Content-Type', 'text/plain');
	res.end('Vous êtes à la chambre de l\'étage n' + req.params.etagenum);
});
***/





































