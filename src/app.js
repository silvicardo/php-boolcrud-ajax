//Progetto: php-boolcrud-ajax

console.log('test js');

var $ = require('jquery');

import Handlebars from 'handlebars/dist/cjs/handlebars.js';

$(document).ready(function () {

  var baseUrl = "http://localhost/FEBBRAIO/php-boolcrud-ajax/";

  //Al caricamento della pagina in base a dove ci si trova

  if (currentPageIs('index.php') || !currentPageIs('.php')) {
      loadAndShowGuests();
  } else if (currentPageIs('edit.php')) {
    console.log('edit page');
  } else if (currentPageIs('new.php')) {
    
    $('#new-form').submit(manageNewGuestFormSubmit);
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
  });

  //FUNZIONI

  //index e show

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

  //new

  function manageNewGuestFormSubmit(event) {
      //non eseguire l'azione default del form
      event.preventDefault();

      //creo l'oggetto data dai value degli input del form
      var data = {}
      var inputs = $('#new-form .form-control');
      for (var i = 0; i < inputs.length; i++) {
        var key = $(inputs[i]).attr('name');
        var value = $(inputs[i]).val();
        data[key] = value;
      }
      console.log(data);

      //chiamata ajax per aggiunta nuovo ospite
      $.post(`${baseUrl}guests/add.php`, data , function(response){
        console.log(response);
         if (JSON.parse(response) === true) {
            window.location.replace(baseUrl);
          }
      });
  }

  //generali

  function currentPageIs(page) {
    return window.location.pathname.split('/').some(str => str.includes(page));
  }

  function searchFroParam(name) {
    return (location.search.split(new RegExp('[?&]' + name + '='))[1] || '').split('&')[0];
  }
});
