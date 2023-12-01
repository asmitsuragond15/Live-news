<!-- resources/views/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="form-container">
    <h1>Edit News</h1>

    <form action="{{ route('news.update', $news) }}" method="post">
        @csrf
        @method('put')

       


        <label for="category">Category:</label>
<div id="category-container">
    @if (!is_null($news->category))
        @foreach(json_decode($news->category) as $cat)
            <input type="text" name="category[]" value="{{ $cat }}" placeholder="New Category">
        @endforeach
    @endif
</div>
<button type="button" class="category" onclick="addCategory()">Add New Category</button><br><br>


        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $news->title }}" required>

        <label for="content">News Content:</label>
        <textarea name="content" required>{{ $news->content }}</textarea>

        <label for="textbox">News Tags :</label>
        <input type="text" name="textbox" value="{{ $news->textbox }}" required>

        <div class="link">
            <div class="related">
        <label for="links">Related Links:</label>
        <div id="links-container">
            @if (!is_null($news->links))
                @foreach(json_decode($news->links) as $link)
                    <input type="url" name="links[]" value="{{ $link }}" nullable>
                @endforeach
            @endif
        </div>
        <button type="button" class="addlink" onclick="addLink('links-container')">Add New Related Link</button>
</div>

<div class="more">
        <label for="more_links">More Links:</label>
        <div id="more-links-container">
            @if (!is_null($news->more_links))
                @foreach(json_decode($news->more_links) as $moreLink)
                    <input type="url" name="more_links[]" value="{{ $moreLink }}" placeholder="New Link" nullable >
                @endforeach
            @endif
        </div>
        <button type="button" class="addmorelink" onclick="addMoreLink()">Add New More Link</button>
</div>
</div>

        
            

        <button type="submit" class="submit-button">Update News</button>
    </form>
</div>

<script>
    function addLink() {
        const linksContainer = document.getElementById('links-container');
        if (linksContainer) {
            const linkInput = document.createElement('input');
            linkInput.type = 'url';
            linkInput.name = 'links[]';
            linkInput.placeholder = 'New Link';
            linksContainer.appendChild(linkInput);
        } else {
            console.error("Links container not found");
        }
    }

    function addCategory() {
    const categoryContainer = document.getElementById('category-container');
    if (categoryContainer) {
        const newCategoryInput = document.createElement('input');
        newCategoryInput.type = 'text';
        newCategoryInput.name = 'category[]';
        newCategoryInput.placeholder = 'New Category';
        categoryContainer.appendChild(newCategoryInput);
    } else {
        console.error("Category container not found");
    }
}


  
    function addMoreLink() {
        const moreLinksContainer = document.getElementById('more-links-container');
        const moreLinkInput = document.createElement('input');
        moreLinkInput.type = 'url';
        moreLinkInput.name = 'more_links[]';
        moreLinkInput.placeholder = 'New Link';
        moreLinksContainer.appendChild(moreLinkInput);
    }


</script>

</body>
</html>
