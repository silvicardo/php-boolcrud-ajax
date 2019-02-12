//Progetto: php-boolcrud-ajax

console.log('test js');

var $ = require('jquery');

import Handlebars from 'handlebars/dist/cjs/handlebars.js';

$(document).ready(function () {

  var baseUrl = "http://localhost/FEBBRAIO/php-boolcrud-ajax/";

  //Al caricamento della pagina in base a dove ci si trova

  if (currentPageIs('index.php')) {
      loadAndShowGuests();
  } else if (currentPageIs('edit.php')) {
    console.log('edit page');
  } else if (currentPageIs('new.php')) {
    console.log('new page');
  } else { //siamo nella route principale /
    loadAndShowGuests();
  }

  //listeners
  $(document).on('click','.btn_delete', function(){

    var id = $(this).attr('data-id');

    $.post(`${baseUrl}guests/delete.php`, { id: id }, function(response){
      console.log(response);
       if (JSON.parse(response) === true) {
          window.location.replace(baseUrl);
        }
    });
  })

  //FUNZIONI

  function loadAndShowGuests(){

    var url = `${baseUrl}/guests/show.php`;

    if (searchFroParam('id') != '') {
      url += `?id=${searchFroParam('id')}`
    }

    $.getJSON(url, showGuests);

  }

  function showGuests(guests){

    console.log(guests);

    //Titolo Pagina
    $('.page_title').text(guests.length == 1 ? 'Single Guest Page' : 'Guests Page');

    //Stampa il titolo dei valori dalla query
    printGuestsTh(guests[0]);

    //Stampa le row di guest disponibili
    for (var i = 0; i < guests.length; i++) {
      printGuestTr(guests[i]);
    }

    //Se abbiamo solo un guest richiesto per id simuliamo la show page
    //rimuovendo il tasto show
    if (guests.length == 1 && searchFroParam('id') != '') {
      $('.btn_show').remove();
    }
  }

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
      id: guest['id'],
      editUrl: `${baseUrl}edit.php?id=${guest['id']}`,
      showUrl: `${baseUrl}index.php?id=${guest['id']}`,
    }

    var html = template(context);

    $('.table tbody').append(html);

  }

  function currentPageIs(page) {
    return window.location.pathname.split('/').some(str => str.includes(page));
  }

  function searchFroParam(name) {
    return (location.search.split(new RegExp('[?&]' + name + '='))[1] || '').split('&')[0];
  }
});
