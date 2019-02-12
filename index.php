<?php include 'template_parts/header.php'; ?>

<div class="container">

<h1 class="page_title text-center mb-5"></h1>

  <div class="jumbotron">

    <table class="table">
      <thead>

      </thead>
      <tbody>


      </tbody>
    </table>

  </div>
</div>

    <script id="guests-th" type="text/x-handlebars-template">

            <th>{{ cat }}</th>

    </script>


    <script id="guest-row" type="text/x-handlebars-template">

          <tr>
            {{{ tds }}}
            <td>
              <a href="{{{showUrl}}}" class="btn btn-success btn_show">Detail</a>
            </td>

            <td>
              <a class="btn btn-warning btn_edit" href="{{{editUrl}}}">Edit</a>
            </td>
            <td>
                <button class="btn btn-danger btn_delete" data-id="{{{ id }}}">Delete</button>
            </td>
          </tr>

    </script>


<?php include 'template_parts/footer.php'; ?>
