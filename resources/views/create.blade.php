<!-- resources/views/create.blade.php -->

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

        
        <<label for="category">Category:</label>
<input type="text" name="category" required>
<button type="button" class="category" onclick="addCategory()">Add New Category</button> <br></br>




        <label for="title">Title:</label>
        <input type="text" name="title" required>

        <label for="content">News Content:</label>
        <textarea name="content" required></textarea>

        <label for="textbox">News Tags :</label>
        <input type="text" name="textbox" required>

        <label for="links">Related Links:</label>
        <div id="links-container">
            <input type="url" name="links[]" placeholder="Link 1" nullable>
        </div>
        <button type="button" class="addlink" onclick="addLink()">Add New Link</button>

        <label for="links">More Links:</label>
        <div id="links-container">
            <input type="url" name="link[]" placeholder="Link 1" nullable>
        </div>
        <button type="button" class="addlink" onclick="addLink()">Add New Link</button>

        <button onclick="window.location.href='{{ route('news.store') }}'" class="view" >Back To Dashboard</button>

        <button type="submit" class="submit-button">Save</button>
    </form>
    
</div>

<script>
    function addLink() {
        const linksContainer = document.getElementById('links-container');
        const linkInput = document.createElement('input');
        linkInput.type = 'url';
        linkInput.name = 'links[]';
        linkInput.placeholder = 'New Link';
        linksContainer.appendChild(linkInput);
    }

    
    function addCategory() {
    const categoryInput = document.createElement('input');
    categoryInput.type = 'text';
    categoryInput.name = 'category';
    categoryInput.placeholder = 'New Category';

    const categoryLabel = document.querySelector('label[for="category"]');
    const categoryContainer = document.createElement('div');
    categoryContainer.appendChild(categoryInput);

    const formContainer = document.querySelector('.form-container');

    // Insert the container after the category label
    categoryLabel.parentNode.insertBefore(categoryContainer, categoryLabel.nextSibling);
}


</script>

</body>
</html>
