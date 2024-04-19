<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brookes Connect</title>
    <link rel="stylesheet" href="../styles/editresearchpage.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/pell/dist/pell.min.css"
    />
  </head>
  <body>
  <?php include '../scripts/phpScripts/header.php';?>

    <div id="main">
      <div id="intro_text">
        <p id="title" contenteditable="true">
          Welcome to <strong>Your Research Project Title</strong>.
        </p>
        <div id="editor-container">
          <div id="editor" class="pell"></div>
        </div>
        <button onclick="updateText()">Update Text</button>
      </div>
      <div class="research_trio">
        <div class="research">
          <img id="image1" src="research_image1.jpg" alt="Research Image 1" />
          <input type="text" id="image1-url" placeholder="Image 1 URL" />
        </div>
        <div class="research">
          <img id="image2" src="research_image2.jpg" alt="Research Image 2" />
          <input type="text" id="image2-url" placeholder="Image 2 URL" />
        </div>
        <div class="research">
          <img id="image3" src="research_image3.jpg" alt="Research Image 3" />
          <input type="text" id="image3-url" placeholder="Image 3 URL" />
        </div>
      </div>
    </div>

    <div id="footer_landing">
      <div class="sub_footer">
        <p>example_contact1</p>
        <p>example_contact2</p>
        <p>example_contact3</p>
        <p>example_contact3</p>
      </div>
      <p>Oxford Brookes University</p>
      <div class="sub_footer">
        <a href="#">Policies</a>
        <a href="#">Security</a>
        <a href="#">Website Acessibility</a>
        <a href="#">Manage cookies</a>
      </div>
    </div>

    <script src="https://unpkg.com/pell"></script>
    <script>
      const editor = pell.init({
        element: document.getElementById("editor"),
        onChange: (html) => {
          var title = document.getElementById("title");
          var image1 = document.getElementById("image1");
          var image2 = document.getElementById("image2");
          var image3 = document.getElementById("image3");
          var image1URL = document.getElementById("image1-url").value;
          var image2URL = document.getElementById("image2-url").value;
          var image3URL = document.getElementById("image3-url").value;

          title.innerHTML = title.innerText;
          image1.src = image1URL;
          image2.src = image2URL;
          image3.src = image3URL;
        },
      });

      function updateText() {
        var title = document.getElementById("title");
        var pellText = editor.content.innerHTML;
        var image1 = document.getElementById("image1");
        var image2 = document.getElementById("image2");
        var image3 = document.getElementById("image3");
        var image1URL = document.getElementById("image1-url").value;
        var image2URL = document.getElementById("image2-url").value;
        var image3URL = document.getElementById("image3-url").value;

        title.innerHTML = title.innerText;
        image1.src = image1URL;
        image2.src = image2URL;
        image3.src = image3URL;
      }
    </script>
  </body>
</html>
