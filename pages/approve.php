<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css" />
  </head>
  <body id="approve_page">
    <div id="height">

        <?php include '../scripts/phpScripts/header.php';?>

      <div class="approve_bar">
        <div id="research_card" onclick="location.href='#'">
          <p id="title">Example title one</p>
          <div id="image"></div>
          <p id="short_bio">
            Short Bio: Neque convallis a cras semper auctor neque. Tempus
            imperdiet nulla malesuada pellentesque elit eget. Tempus imperdiet
            nulla malesuada pellentesque elit eget.
          </p>
          <p id="author">David Lightfoot</p>
        </div>
        <div id="button_box">
          <button id="approve_button">Approve</button>
          <button id="reject">Reject</button>
        </div>
        <dialog open>
          <form action="">
            <label for="feedback">Rejection feedback</label>
            <input type="text" name="feedback" id="feedback" />
            <button id="submit" type="submit">Submit</button>
          </form>
        </dialog>
      </div>
      <div class="approve_bar">
        <div id="research_card" onclick="location.href='#'">
          <p id="title">Example title one</p>
          <div id="image"></div>
          <p id="short_bio">
            Short Bio: Neque convallis a cras semper auctor neque. Tempus
            imperdiet nulla malesuada pellentesque elit eget. Tempus imperdiet
            nulla malesuada pellentesque elit eget.
          </p>
          <p id="author">Nav Dean</p>
        </div>
        <div id="button_box">
          <button id="approve_button">Approve</button>
          <button id="reject">Reject</button>
        </div>
        <dialog open>
          <form action="">
            <label for="feedback">Rejection feedback</label>
            <input type="text" name="feedback" id="feedback" />
            <button id="submit" type="submit">Submit</button>
          </form>
        </dialog>
      </div>
      <div class="approve_bar">
        <div id="research_card" onclick="location.href='#'">
          <p id="title">Example title one</p>
          <div id="image"></div>
          <p id="short_bio">
            Short Bio: Neque convallis a cras semper auctor neque. Tempus
            imperdiet nulla malesuada pellentesque elit eget. Tempus imperdiet
            nulla malesuada pellentesque elit eget.
          </p>
          <p id="author">Samia Kamal</p>
        </div>
        <div id="button_box">
          <button id="approve_button">Approve</button>
          <button id="reject">Reject</button>
        </div>
        <dialog open>
          <form action="">
            <label for="feedback">Rejection feedback</label>
            <input type="text" name="feedback" id="feedback" />
            <button id="submit" type="submit">Submit</button>
          </form>
        </dialog>
      </div>
    </div> 
    <?php include '../scripts/phpScripts/footer.php';?>
    <script src="../scripts/approve.js"></script>
  </body>
</html>
