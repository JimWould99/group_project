<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css" />
  </head>
  <body id="search_page">
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
      <div id="top_section">
        <div id="select_search">
            <label for="author_select">Author
            <input onclick="checkResults()" type="radio" name="account_type" class="second" id="author_select" value="author_select">
            <span class="checked"></span>
            </label>
            <label for="title_select">Title
            <input onclick="checkResults()" type="radio" name="account_type" class="second" id="title_select" value="title_select">
            <span class="checked"></span>
        </div>
          
            <div id="search_bar_section">
        <input
          type="text"
          id="search_bar"
          placeholder="Find research/ researchers"
          onkeyup="checkResults()"
        />
            </div>
      </div>
    <div id="search_results">
      <div id="research_card" onclick="location.href='#'">
        <p id="title">Example title one</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">David Lightfoot</p>
      </div>
      <div id="research_card">
        <p id="title">Example title two</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">Nav Dean</p>
      </div>

      <div id="research_card">
        <p id="title">Example title two</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">Samia Kamal</p>
      </div>

      <div id="research_card">
        <p id="title">Example title three</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">Joe Bloggs</p>
      </div>

      <div id="research_card">
        <p id="title">Example title four</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">Clare Martin</p>
      </div>

      <div id="research_card">
        <p id="title">Example title five</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">Muhammad Younas</p>
      </div>

      <div id="research_card">
        <p id="title">Example title one</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">David Lightfoot</p>
      </div>

      <div id="research_card">
        <p id="title">Example title one</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">David Lightfoot</p>
      </div>

      <div id="research_card">
        <p id="title">Example title one</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">David Lightfoot</p>
      </div>

      <div id="research_card">
        <p id="title">Example title one</p>
        <div id="image"></div>
        <p id="short_bio">
          Short Bio: Neque convallis a cras semper auctor neque. Tempus
          imperdiet nulla malesuada pellentesque elit eget. Tempus
          imperdiet nulla malesuada pellentesque elit eget.
        </p>
        <p id="author">David Lightfoot</p>
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
    <script src="../scripts/search.js"></script>
  </body>
</html>
