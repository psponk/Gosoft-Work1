<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exportModal">
    Export File
    <i class="gg-export" style="display:inline-block; margin-left: 10px;"></i>
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="code.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="exportModalLabel">Export File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <label for="db" class="col-form-label">Select Database</label>
              <select name="db" id="db" class="form-control">
                <option value="students">students</option>
                <option value="studentss">studentss</option>
                <option value="studentsss">studentsss</option>
              </select>
            </div>
            <div class="row mt-3">
              <label for="export_file_type" class="col-form-label">File Type</label>
              <select name="export_file_type" id="export_file_type" class="form-control">
                <option value="xlsx">XLSX</option>
                <option value="xls">XLS</option>
                <option value="csv">CSV</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="export_excel_btn" class="btn btn-primary">Export</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
