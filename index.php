<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Binary Text Converter</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f8f9fa;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }

    textarea {
      margin-top: 10px;
    }

    .btn {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="text-center mt-5 mb-4">Binary Text Converter</h1>
    <div class="row">
      <div class="col-md-6">
        <h3 class="text-center">Text to Binary</h3>
        <textarea id="text-to-binary-input" class="form-control" rows="6" placeholder="Enter text..."></textarea>
        <button id="text-to-binary-btn" class="btn btn-primary btn-block mt-3">Convert to Binary</button>
        <textarea id="text-to-binary-output" class="form-control mt-3" rows="6" readonly></textarea>
        <button id="clear-text-to-binary" class="btn btn-danger btn-block mt-3">Clear</button>
      </div>
      <div class="col-md-6">
        <h3 class="text-center">Binary to Text</h3>
        <textarea id="binary-to-text-input" class="form-control" rows="6" placeholder="Enter binary..."></textarea>
        <button id="binary-to-text-btn" class="btn btn-primary btn-block mt-3">Convert to Text</button>
        <textarea id="binary-to-text-output" class="form-control mt-3" rows="6" readonly></textarea>
        <button id="clear-binary-to-text" class="btn btn-danger btn-block mt-3">Clear</button>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-md-6 offset-md-3">
        <button id="swap-btn" class="btn btn-secondary btn-block">Swap</button>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script>
    $(document).ready(function() {
      // Convert text to binary
      $('#text-to-binary-btn').click(function() {
        var text = $('#text-to-binary-input').val();
        var binary = text.split('').map(function(char) {
          return char.charCodeAt(0).toString(2).padStart(8, '0');
        }).join(' ');
        $('#text-to-binary-output').val(binary);
      });

      // Convert binary to text
      $('#binary-to-text-btn').click(function() {
        var binary = $('#binary-to-text-input').val().replace(/\s+/g, '');
        if (!/^[01]+$/.test(binary)) {
          alert('Invalid binary input!');
          return;
        }
        var text = '';
        for (var i = 0; i < binary.length; i += 8) {
          text += String.fromCharCode(parseInt(binary.substr(i, 8), 2));
        }
        $('#binary-to-text-output').val(text);
      });

      // Clear text-to-binary
      $('#clear-text-to-binary').click(function() {
        $('#text-to-binary-input').val('');
        $('#text-to-binary-output').val('');
      });

      // Clear binary-to-text
      $('#clear-binary-to-text').click(function() {
        $('#binary-to-text-input').val('');
        $('#binary-to-text-output').val('');
      });

      // Swap text
      $('#swap-btn').click(function() {
        var textToBinaryInput = $('#text-to-binary-input').val();
        var textToBinaryOutput = $('#text-to-binary-output').val();
        $('#text-to-binary-input').val($('#binary-to-text-input').val());
        $('#text-to-binary-output').val($('#binary-to-text-output').val());
        $('#binary-to-text-input').val(textToBinaryInput);
        $('#binary-to-text-output').val(textToBinaryOutput);
      });
    });
  </script>
</body>
</html>
