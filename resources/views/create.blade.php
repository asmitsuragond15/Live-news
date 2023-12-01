<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create News</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    <div class="form-container">
        <h1>Create News</h1>

        <form action="{{ route('news.store') }}" method="post">
            @csrf

            <label for="category">Category:</label>
            <div id="category-container">
                <input type="text" name="category[]" required>
            </div>
            <button type="button" class="category" onclick="addCategory()">Add New Category</button><br><br>

            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="content">News Content:</label>
            <textarea name="content" required></textarea>

            <label for="textbox">News Tags :</label>
            <input type="text" name="textbox" required>

            <!-- flex div -->
            <div class="link">
            <div class="related">
            <label for="links">Related Links:</label>
            <div id="links-container">
                <input type="url" name="links[]" placeholder="Link 1" nullable>
            </div>
            <button type="button" class="addlink" onclick="addRelatedLink()">Add New Related Link</button>
            </div>

            <div class="more">
            <label for="more_links">More Links:</label>
            <div id="more-links-container">
                <input type="url" name="more_links[]" placeholder="New Link">
            </div>
            <button type="button" class="addmorelink" onclick="addMoreLink()">Add New More Link</button> 
            </div>
            </div>
            

            


            <button onclick="window.location.href='{{ route('news.index') }}'" class="view">Back To Dashboard</button>

            <button type="submit" class="submit-button">Save</button>
        </form>
    </div>

    <script>
    function addRelatedLink() {
        const linksContainer = document.getElementById('links-container');
        const linkInput = document.createElement('input');
        linkInput.type = 'url';
        linkInput.name = 'links[]';
        linkInput.placeholder = 'New Link';
        linksContainer.appendChild(linkInput);
    }

    function addMoreLink() {
        const moreLinksContainer = document.getElementById('more-links-container');
        const moreLinkInput = document.createElement('input');
        moreLinkInput.type = 'url';
        moreLinkInput.name = 'more_links[]';
        moreLinkInput.placeholder = 'New Link';
        moreLinksContainer.appendChild(moreLinkInput);
    }

    function addCategory() {
        const categoryContainer = document.getElementById('category-container');
        const newCategoryInput = document.createElement('input');
        newCategoryInput.type = 'text';
        newCategoryInput.name = 'category[]';
        newCategoryInput.placeholder = 'New Category';
        categoryContainer.appendChild(newCategoryInput);
    }
    </script>

</body>

</html>