<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>

<div class="form-container">
    <h1>News Dashboard</h1>

    <a href="{{ route('news.create') }}" class="add-news-button">Create News</a>

    <div class="search-container">
        <input type="text" id="searchInput" placeholder="Search...">
    </div>

    <table class="news-table">
        <thead>
            <tr>
                <th>Sr. No</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($news as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                    <div class="action">
                        <a href="{{ route('news.edit', $item) }}" class="edit-button" >Edit</a>
                        <form action="{{ route('news.destroy', $item) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="delete-button"  >Delete</button>
                        </form>
</div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    const searchInput = document.getElementById('searchInput');
    const newsTable = document.querySelector('.news-table');

    searchInput.addEventListener('input', function () {
        const searchTerm = searchInput.value.toLowerCase();

        Array.from(newsTable.querySelectorAll('tbody tr')).forEach(row => {
            const title = row.querySelector('td:nth-child(2)').textContent.toLowerCase();

            if (title.includes(searchTerm)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
