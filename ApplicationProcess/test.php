<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">

    <title>BS Custom File Input test</title>
  </head>
  <body>
    <div class="container mt-1">
      <div class="row">
        <h1>BS Custom File Input tests</h1>

        <div class="col-sm-12 mt-2">
          <button class="btn btn-primary" onClick="bsCustomFileInput.destroy()">
            Destroy all
          </button>
        </div>

        <div class="col-sm-12 mt-5">
          <h3>Examples</h3>
          <div class="input-group mt-3">
            <div class="custom-file">
              <input id="inputGroupFile01" type="file" class="custom-file-input">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>

          <div class="input-group mt-3">
            <div class="custom-file">
              <input id="inputGroupFile02" type="file" multiple class="custom-file-input">
              <label class="custom-file-label" for="inputGroupFile02">Choose several files</label>
            </div>
          </div>
        </div>

        <div class="col-sm-12 mt-5">
          <h3>Example with form</h3>
          <form class="mt-3">
            <div class="form-group row">
              <div class="col-sm-10">
                <button id="btnResetForm" class="btn btn-primary">
                  Reset form
                </button>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
                <div class="input-group mt-3">
                  <div class="custom-file">
                    <input id="inputGroupFile03" type="file" class="custom-file-input">
                    <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div class="col-sm-12 mt-5">
          <h3>Example with label containing a child</h3>
          <div class="custom-file mt-2">
            <input id="inputGroupFile04" type="file" multiple class="custom-file-input" multiple>
            <label class="custom-file-label" for="inputGroupFile04">
              <span class="d-inline-block text-truncate w-75">Choose several files</span>
            </label>
          </div>
      </div>
    </div>

    <script src="./coverage/bs-custom-file-input.js"></script>
    <script>
      bsCustomFileInput.init()
      var btn = document.getElementById('btnResetForm')
      var form = document.querySelector('form')
      btn.addEventListener('click', function () {
        form.reset()
      })
    </script>
  </body>
</html>