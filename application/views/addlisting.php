<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Ajax Based Call</title>
    </head>
    <body>
      <p></p>
      <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Data</h5>
              <form id="maxformadd" action="" method="post">
          <div class="form-group">
            <label for="max_first_name">First Name</label>
            <input type="text" class="form-control" id="max_first_name" name="max_first_name" value="<?php echo ""; ?>">
          </div>
          <div class="form-group">
            <label for="max_last_name">Last Name</label>
            <input type="text" class="form-control" id="max_last_name" name="max_last_name">
          </div>
          <p id="subx"> <button type="button" class="btn btn-success fadeInUp" name="savedata" id="subm">Submit</button></p>
        </form>
            </div>
          </div>
        </div>
        <div class="col-sm-8 col-md-8">
          <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Image</th>
              <th scope="col"><center>Action</center></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($info as $data) { ?>
            <tr>
              <td><?php echo $data->id; ?></td>
              <td><?php echo $data->max_first_name; ?></td>
              <td><?php echo $data->max_last_name; ?></td>
              <td><img src="<?php echo base_url('assets/img/'.$data->max_image); ?>" style="width: 80px;height: 80px;"></td>
              <td>
                <a href="<?php echo base_url('index.php/welcome/edit/'.$data->id); ?>" class="btn btn-primary mr-1" id="edit">Edit</a>
                <button type="button" class="btn btn-primary mr-1" onclick="openmod(<?php echo $data->id; ?>);">Upload</button>
                <a href="<?php echo base_url('index.php/welcome/deleteme/'.$data->id); ?>" class="btn btn-danger mr-1" id="edit">Delete</a>
              </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        </div>
      </div>
      </div>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <form name="imgname" action="<?php echo base_url('index.php/welcome/maximage/'); ?>" id="imgname" method="post" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h2 class="modal-title" id="exampleModalLabel">Upload Image</h2>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h3>Choose File</h3>
              <input type="hidden" name="aid" id="upimg" value="<?php echo $data->id; ?>">
                <div class="form-group">
                  <label for="imgname">Upload Images</label>
                  <input type="file" class="form-control" id="upimg" aria-describedby="emailHelp" name="upimg">
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary mr-1">Upload</button>
            </div>
          </div>
        </form>
        </div>
      </div>
      <script type="text/javascript">
        function openmod(a){
          $('#upimg').val(a);
          $('#exampleModal').modal('show');
        }
        $(document).ready(function() {
          $("#subm").on("click", function () {
            var dataString = $(this).serialize();
            $.ajax({
               type: "POST",
               url: "http://localhost/maxtra/insert",
               data: {max_first_name:$('#max_first_name').val(), max_last_name:$('#max_last_name').val()},
               success: function (res) {
                 $('.table').append(res);
                 location.reload;
               }
             });
          });
        });
      </script>
    </body>
</html>