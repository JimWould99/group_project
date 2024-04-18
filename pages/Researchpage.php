<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brookes Connect</title>
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

      #main {
        display: flex;
        flex: 1;
        padding: 20px;
        gap: 20px;
      }

      #intro_text {
        flex: 2;
        display: grid;
        grid-template-rows: auto auto;
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

      #footer_landing {
        margin-top: auto;
        background-color: #4935f7;
        display: flex;
        flex-direction: column;
        margin-bottom: -100px;
        box-shadow: 0px 0px 10px 0px black;
        font-family: Arial, sans-serif;
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
        <p>Welcome to <strong>Our Research Project</strong>.</p>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque
          vel convallis tortor. Donec feugiat velit a faucibus sollicitudin.
          Mauris pharetra lacinia ipsum sit amet efficitur. Pellentesque
          habitant morbi tristique senectus et netus et malesuada fames ac
          turpis egestas. Sed mollis commodo augue, eget varius elit fringilla
          vel. Nullam laoreet porttitor tellus. Proin laoreet, odio ac ornare
          venenatis, mi libero pellentesque ante, viverra vehicula tortor metus
          vitae felis. Sed rhoncus mi at semper pharetra. Ut sit amet auctor
          turpis. Donec nec sem diam. Lorem ipsum dolor sit amet, consectetur
          adipiscing elit. Phasellus id varius metus. Vestibulum commodo ante
          sit amet lectus aliquam pulvinar. Praesent elementum ultricies nisi.
          Pellentesque vel neque vel augue pharetra pellentesque. Fusce
          ullamcorper id tellus quis cursus. Integer facilisis urna metus.
          Aliquam consectetur volutpat tortor ut iaculis. Aliquam pretium luctus
          felis nec accumsan. Aenean nec nisi at risus fringilla mollis eget
          eget lectus. Duis sit amet malesuada sem. Nullam pretium nisi at
          efficitur imperdiet. Maecenas quis dolor in eros imperdiet dapibus sed
          non magna. Aenean eu velit in ante sagittis bibendum. Etiam mattis
          arcu id turpis lobortis, hendrerit lacinia erat tincidunt. Donec et
          malesuada tortor. Donec eget rhoncus turpis. Cras gravida quam at
          turpis egestas tincidunt id at elit. Nullam ac sollicitudin nisl, a
          viverra libero. Aenean eu metus orci. Integer scelerisque est eu
          tortor tristique fringilla. Phasellus euismod mi turpis, eget mollis
          nisl aliquam a. Etiam sagittis faucibus urna, in volutpat ante
          convallis sed. Nulla pharetra tempor fringilla. Donec elementum urna
          id enim varius lobortis ac id mauris. Quisque vestibulum lectus massa.
          Nam turpis tortor, pharetra at augue vitae, fermentum laoreet metus.
          Phasellus vitae scelerisque felis. Vestibulum ut mauris libero. Mauris
          est lorem, convallis eu posuere vulputate, aliquam sit amet erat.
          Integer eleifend posuere lorem. Aenean eu elementum lorem. Maecenas
          sit amet magna vitae mi aliquet sagittis id porta justo. Nam ex leo,
          fermentum a aliquam eget, imperdiet vitae felis. Aliquam nulla eros,
          feugiat ac lacus non, dictum congue risus. Cras volutpat ex et ante
          fermentum, quis tempus arcu ultricies. Pellentesque scelerisque erat
          at lorem cursus, a ornare nunc tincidunt. Vestibulum fermentum id
          libero eu sollicitudin. Sed lobortis, purus a ornare imperdiet, lectus
          eros accumsan urna, id sodales nulla erat sed turpis. In facilisis,
          lectus eu tincidunt malesuada, arcu metus euismod sapien, vitae
          euismod ligula nisl sed turpis. Pellentesque eu arcu diam. Ut sagittis
          a lorem non efficitur. Quisque elementum, erat nec dictum vehicula,
          justo velit ornare massa, nec commodo augue sapien quis odio. Integer
          maximus ullamcorper eros sed lobortis. Pellentesque a accumsan nisl.
          Ut tristique tristique nisi quis faucibus. Nulla ac ullamcorper orci,
          a ultricies ligula. Praesent feugiat libero placerat massa sodales, ut
          sodales mauris tincidunt. Aliquam velit nisi, porta non cursus nec,
          maximus a ligula. Phasellus libero sem, sodales at elementum sed,
          aliquet non augue. Donec venenatis lacus vel commodo placerat.
        </p>
      </div>
      <div class="research_trio">
        <div class="research">
          <img src="research_image1.jpg" alt="Research Image 1" />
        </div>
        <div class="research">
          <img src="research_image2.jpg" alt="Research Image 2" />
        </div>
        <div class="research">
          <img src="research_image3.jpg" alt="Research Image 3" />
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
  </body>
</html>
