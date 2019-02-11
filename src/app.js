//Progetto: php-boolcrud-ajax

console.log('test js');

var $ = require('jquery');

import Handlebars from 'handlebars/dist/cjs/handlebars.js';

$(document).ready(function () {

  var url = 'http://localhost/FEBBRAIO/php-boolcrud-ajax/guests/show.php';
  $.getJSON(url, showGuests)

  function showGuests(guests){

    console.log(guests);
    printGuestsTh(guests[0]);

    for (var i = 0; i < guests.length; i++) {
      printGuestTr(guests[i]);
    }
  }

  $(document).on('click','.btn_delete', function(){

    var id = $(this).attr('data-id');
    console.log('cliccato');
    console.log(id);
    $.post('http://localhost/FEBBRAIO/php-boolcrud-ajax/guests/delete.php', { id: id }, function(response){
        console.log(response);
    });
  })

  function printGuestsTh(guest) {

    for(var cat in guest ) {
      var htmlTemplate = $('#guests-th').html();
      var template = Handlebars.compile(htmlTemplate);

      var context = {
        cat: cat
      }

      var html = template(context);

      $('.table thead').append(html);
    }
  }

  function printGuestTr(guest) {
    var htmlTemplate = $('#guest-row').html();
    var template = Handlebars.compile(htmlTemplate);

    var tds = "";

    for(var cat in guest ) {

        tds += "<td>" + guest[cat] + "</td>";
    }

    var context = {
      tds: tds,
      id: guest['id']
    }

    var html = template(context);

    $('.table tbody').append(html);

  }
});
