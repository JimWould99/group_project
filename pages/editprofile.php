<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="../styles/editprofile.css" />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://unpkg.com/pell/dist/pell.min.css"
    />
  </head>
  <body>
  <?php include '../scripts/phpScripts/header.php';?>

    <div id="profile-header">Profile Information</div>

    <div id="main">
      <div class="tile">
        <!-- Placeholder for researcher's image -->
        <img src="https://via.placeholder.com/150" alt="Researcher Image" />
      </div>
      <div id="text-box"></div>
    </div>

    <div class="tiles-row">
      <div class="tile">
        <!-- First Interactable Tile -->
        Tile 1
      </div>
      <div class="tile">
        <!-- Second Interactable Tile -->
        Tile 2
      </div>
      <div class="tile">
        <!-- Third Interactable Tile -->
        Tile 3
      </div>
      <div class="tile">
        <!-- Fourth Interactable Tile -->
        Tile 4
      </div>
    </div>

    <div id="key">
      <p><strong>Graduation:</strong> Ph.D. in [Field], [University Name]</p>
      <p><strong>Research Interests:</strong> [List of Research Interests]</p>
      <p><strong>Specializations:</strong> [List of Specializations]</p>
      <p>
        <strong>Contact Information:</strong> [Phone Number], [Email Address]
      </p>
    </div>

    <?php include '../scripts/phpScripts/footer.php';?>

    <!-- Include pell editor script -->
    <script src="https://unpkg.com/pell"></script>
    <script>
      // Initialize pell editor for Profile Information
      const profileInformationEditor = pell.init({
        element: document.getElementById("text-box"),
        onChange: (html) => console.log(html),
        defaultParagraphSeparator: "p",
        styleWithCSS: false,
        actions: [
          "bold",
          "italic",
          "underline",
          "strikethrough",
          "heading1",
          "heading2",
          "paragraph",
          "olist",
          "ulist",
          "link",
          "image",
          "quote",
          {
            name: "custom",
            icon: '<img src="https://via.placeholder.com/20" alt="Custom Icon">',
            title: "Custom Action",
            result: () => console.log("Custom action clicked"),
          },
        ],
      });
    </script>
  </body>
</html>
