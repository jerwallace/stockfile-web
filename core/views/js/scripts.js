// JavaScript Document
var root_path = '';
var actors = new Array();
var directors = new Array();

function serializeActors() {
    var output = 'numActors=' + actors.length;
    for (var i = 0; i < actors.length; i++) {
        output += '&actorID[]=' + actors[i]['id'] +
                '&actorName[]=' + actors[i]['name'] +
                '&actorRole[]=' + actors[i]['role'];
    }
    return output;
}

function serializeDirectors() {
    var output = 'numDirectors=' + directors.length;
    for (var i = 0; i < directors.length; i++) {
        output += '&directorID[]=' + directors[i]['id'] +
                '&directorName[]=' + directors[i]['name'];
    }
    return output;
}

function submitForm() {
    var string = "name=" + $('name').value + "&";
    string += "year=" + $('year').value + "&";
    string += "rating=" + $('rating').value + "&";
    string += "genre=" + $('genre').value + "&";
    string += serializeActors() + "&";
    ;
    string += serializeDirectors();

    new Ajax.Request(root_path + 'core/bin/insert-record.php', {
        method: 'post',
        requestHeaders: {Accept: 'application/json'},
        parameters: string,
        onSuccess: function(response) {
            if (response.responseText !== 'false') {
                self.location = "?confirm";
            } else {
                alert("There was a problem inserting your record.");
            }
        },
        onFailure: function() {
            alert("Server error.");
        }
    });
}

function findActor()
{
    var qActor = $('actor').value;
    var qRole = $('role').value;

    if (qRole === '') {
        alert("Please enter a role.");
    } else {
        new Ajax.Request(root_path + 'core/bin/lookup-actor.php', {
            method: 'get',
            requestHeaders: {Accept: 'application/json'},
            parameters: {q: qActor},
            onSuccess: function(response) {
                if (response.responseText !== 'false') {
                    var object = response.responseText.evalJSON(true);

                    var thisItem = new Array();
                    thisItem['name'] = object.first_name + " " + object.last_name;
                    thisItem['id'] = object.id;
                    thisItem['role'] = qRole;

                    actors.push(thisItem);
                    printActorList();
                } else {
                    alert("Actor could not be found.");
                }
            },
            onFailure: function() {
                alert("Server error.");
            }
        });
    }
}

function findDirector()
{

    var qDirector = $('director').value;

    new Ajax.Request(root_path + 'core/bin/lookup-director.php', {
        method: 'get',
        requestHeaders: {Accept: 'application/json'},
        parameters: {q: qDirector},
        onSuccess: function(response) {
            if (response.responseText !== 'false') {
                var object = response.responseText.evalJSON(true);

                var thisItem = new Array();
                thisItem['name'] = object.first_name + " " + object.last_name;
                thisItem['id'] = object.id;

                directors.push(thisItem);
                printDirectorList();
            } else {
                alert("Director could not be found.");
            }

        },
        onFailure: function() {
            alert("Server error.");
        }
    });
}

function printActorList() {

    var html = '<ul>';

    if (actors.length === 0) {
        html += "<li>No actors at this time.</li>";
    } else {
        for (var i = 0; i < actors.length; i++) {
            html += '<li><input type="button" id="rm_dir_' + actors[i]['id'] +
                    '" onclick="removeFromActorList(\'' + actors[i]['id'] +
                    '\');" value="[-] Remove" /> ' + actors[i]['name'] + ' - <em>' +
                    actors[i]['role'] + '</em></li>';
        }
    }
    html += '</ul>';

    $('actor-list').innerHTML = html;
}

function printDirectorList() {

    var html = '<ul>';

    if (directors.length === 0) {
        html += "<li>No directors at this time.</li>";
    } else {

        for (var i = 0; i < directors.length; i++) {
            html += '<li><input type="button" id="rm_dir_' + directors[i]['id'] +
                    '" onclick="removeFromDirectorList(\'' + directors[i]['id'] +
                    '\');" value="[-] Remove" /> ' + directors[i]['name'] + '</li>';
        }
    }
    html += '</ul>';

    $('director-list').innerHTML = html;
}

function removeFromActorList(id) {

    var pos = null;
    for (var i = 0; i < actors.length; i++) {
        if (actors[i]['id'] === id) {
            pos = i;
            break;
        }
    }
    if (pos !== null) {
        actors.splice(pos, 1);
    }
    printActorList();
}

function removeFromDirectorList(id) {

    var pos = null;
    for (var i = 0; i < directors.length; i++) {
        if (directors[i]['id'] === id) {
            pos = i;
            break;
        }
    }
    if (pos !== null) {
        directors.splice(pos, 1);
    }
    printDirectorList();
}
