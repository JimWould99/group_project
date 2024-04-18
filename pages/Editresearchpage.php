<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brookes Connect</title>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/pell/dist/pell.min.css"
    />
    <style>
      body {
        background-color: rgb(209, 230, 251);
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        position: relative;
      }

      #header {
        display: grid;
        grid-template-columns: 1.5fr 4fr 1.5fr;
        align-items: center;
        background-color: #4935f7;
        padding: 15px 0px;
        font-size: 1.1rem;
        padding-left: 3.5%;
        width: 100%;
        box-sizing: border-box;
      }

      #header > *,
      #info > * {
        background-color: #4935f7;
        font-family: none;
        color: #eef1f0;
        text-decoration: none;
        text-align: center;
        text-wrap: nowrap;
        font-size: 1.2rem;
      }

      #info {
        display: flex;
        justify-content: space-around;
        align-items: center;
      }

      #header > a:first-child {
        font-size: 1.6rem;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        text-wrap: wrap;
        justify-self: start;
        padding: 0px;
      }
      #header > a:nth-child(6) {
        grid-column: 7;
        justify-self: end;
        margin-right: 70px;
      }

      #footer_landing {
        margin-top: auto;
        background-color: #4935f7;
        display: flex;
        flex-direction: column;
        margin-bottom: -100px;
        box-shadow: 0px 0px 10px 0px black;
        font-family: Arial, sans-serif;
        width: 100%;
        margin-top: 50px;
      }
      #footer_landing > * {
        background-color: #4935f7;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 3%;
        padding: 0px;
        margin: 0px;
      }

      #footer_landing > p,
      #footer_landing > .sub_footer {
        color: #fffff0;
      }

      #footer_landing > * > * {
        margin: 0px;
      }
      #footer_landing > div:nth-child(1),
      #footer > div:nth-child(3) {
        font-size: 0.8rem;
      }

      #main {
        display: flex;
        flex: 1;
        padding: 20px;
        gap: 20px;
      }

      #intro_text {
        flex: 2;
        display: grid;
        grid-template-rows: auto auto auto;
        align-items: center;
      }

      #intro_text > p {
        margin: 20px 0;
        font-size: 1.3rem;
        font-weight: bold;
        text-align: justify;
      }

      #intro_text > p:first-child {
        margin-top: 0;
      }

      #intro_text > p:nth-child(2) {
        font-size: 1.3rem;
        font-family: "Franklin Gothic Medium", "Arial Narrow", Arial, sans-serif;
        text-align: justify;
      }

      .research_trio {
        flex: 1;
        display: grid;
        grid-template-columns: 1fr;
        grid-gap: 20px;
        justify-items: center;
      }

      .research {
        background-color: #faf9f6;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }

      .research img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
      }

      .pell-actionbar {
        margin-bottom: 0;
      }

      .pell-content {
        margin-top: 0;
        background-color: white;
      }
    </style>
  </head>
  <body>
    <div id="header">
      <a href="#">BrookesConnect</a>
      <div id="info">
        <a href="#">About</a>
        <a href="browseresearch.php">Search Research</a>
        <a href="browseprofiles.html">Create Research </a>
        <a href="create research.html">Browse Profiles</a>
      </div>
      <a href="#">Account</a>
    </div>

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
