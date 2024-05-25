<?php
echo '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Data Peminjaman</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      rel="stylesheet"
    />
    <link href="style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <body>
      <nav>
        <ul>
          <li class="logo">
            <img alt="" src="gitar.png" />
          </li>
          <li>
            <a href="dashboard.html"><i class="fa fa-home"></i>   home</a>
          </li>
          <li>
            <a href="table.html"><i class="fa fa-book"></i>   Data Peminjam</a>
          </li>
          <li>
            <a href="login.html"><i class="fa fa-picture-o"></i>   Login</a>
          </li>
        </ul>
      </nav>
    </body>
    <style>
      body {
        color: #404e67;
        background: #292929;
        font-family: "Open Sans", sans-serif;
      }
      .table-wrapper {
        width: 700px;
        margin: 30px auto;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
      }
      .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
      }
      .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
      }
      .table-title .add-new {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
      }
      .table-title .add-new i {
        margin-right: 4px;
      }
      table.table {
        table-layout: fixed;
      }
      table.table tr th,
      table.table tr td {
        border-color: #e9e9e9;
      }
      table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
      }
      table.table th:last-child {
        width: 100px;
      }
      table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
        text-decoration: none;
      }
      table.table td a.add {
        color: #27c46b;
      }
      table.table td a.edit {
        color: #ffc107;
      }
      table.table td a.delete {
        color: #e34724;
      }
      table.table td i {
        font-size: 19px;
      }
      table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
      }
      table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
      }
      table.table .form-control.error {
        border-color: #f50000;
      }
      table.table td .add {
        display: none;
      }
    </style>
    <script>
      $(document).ready(function () {
        $(\'[data-toggle="tooltip"]\').tooltip();
        var actions = $("table td:last-child").html();

        $(".add-new").click(function () {
          $(this).attr("disabled", "disabled");
          var index = $("table tbody tr:last-child").index();
          var row =
            "<tr>" +
            \'<td><input type="text" class="form-control" name="name" id="name"></td>\' +
            \'<td><input type="text" class="form-control" name="department" id="department"></td>\' +
            \'<td><input type="text" class="form-control" name="phone" id="phone"></td>\' +
            "<td>" +
            actions +
            "</td>" +
            "</tr>";
          $("table").append(row);
          $("table tbody tr")
            .eq(index + 1)
            .find(".add, .edit")
            .toggle();
          $(\'[data-toggle="tooltip"]\').tooltip();
        });

        $(document).on("click", ".add", function () {
          var empty = false;
          var input = $(this).parents("tr").find(\'input[type="text"]\');
          input.each(function () {
            if (!$(this).val()) {
              $(this).addClass("error");
              empty = true;
            } else {
              $(this).removeClass("error");
            }
          });
          $(this).parents("tr").find(".error").first().focus();
          if (!empty) {
            input.each(function () {
              $(this).parent("td").html($(this).val());
            });
            $(this).parents("tr").find(".add, .edit").toggle();
            $(".add-new").removeAttr("disabled");
          }
        });

        $(document).on("click", ".edit", function () {
          $(this)
            .parents("tr")
            .find("td:not(:last-child)")
            .each(function () {
              $(this).html(
                \'<input type="text" class="form-control" value="\' +
                  $(this).text() +
                  \'">\'
              );
            });
          $(this).parents("tr").find(".add, .edit").toggle();
          $(".add-new").attr("disabled", "disabled");
        });
        // Delete row on delete button click
        $(document).on("click", ".delete", function () {
          $(this).parents("tr").remove();
          $(".add-new").removeAttr("disabled");
        });
      });
    </script>
  </head>
  <body>
    <div class="container-lg">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-8">
                <h2>Musicks <b>Rent</b></h2>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-info add-new">
                  <i class="fa fa-plus"></i> Add New
                </button>
              </div>
            </div>
          </div>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Alat musik</th>
                <th>Unit</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Tretan muslim</td>
                <td>Gitar Ibanez</td>
                <td>1</td>
                <td>
                  <a class="add" title="Add" data-toggle="tooltip"
                    ><i class="material-icons">&#xE03B;</i></a
                  >
                  <a class="edit" title="Edit" data-toggle="tooltip"
                    ><i class="material-icons">&#xE254;</i></a
                  >
                  <a class="delete" title="Delete" data-toggle="tooltip"
                    ><i class="material-icons">&#xE872;</i></a
                  >
                </td>
              </tr>
              <tr>
                <td>Jumadi</td>
                <td>Amplifiyer</td>
                <td>3</td>
                <td>
                  <a class="add" title="Add" data-toggle="tooltip"
                    ><i class="material-icons">&#xE03B;</i></a
                  >
                  <a class="edit" title="Edit" data-toggle="tooltip"
                    ><i class="material-icons">&#xE254;</i></a
                  >
                  <a class="delete" title="Delete" data-toggle="tooltip"
                    ><i class="material-icons">&#xE872;</i></a
                  >
                </td>
              </tr>
              <tr>
                <td>Mbappe</td>
                <td>Trompet Sangkakala</td>
                <td>1</td>
                <td>
                  <a class="add" title="Add" data-toggle="tooltip"
                    ><i class="material-icons">&#xE03B;</i></a
                  >
                  <a class="edit" title="Edit" data-toggle="tooltip"
                    ><i class="material-icons">&#xE254;</i></a
                  >
                  <a class="delete" title="Delete" data-toggle="tooltip"
                    ><i class="material-icons">&#xE872;</i></a
                  >
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>

';
?>