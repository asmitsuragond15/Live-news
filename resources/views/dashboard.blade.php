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

        @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
        @endif

        <form id="newsForm" action="{{ route('news.store') }}" method="post">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" required>

            <label for="content">News Content:</label>
            <textarea name="content" required></textarea>

            <label for="textbox">Simple Text Box:</label>
            <input type="text" name="textbox" required>

            <label for="links">Related Links:</label>
            <div id="links-container">
                <input type="url" name="links[]" placeholder="Link 1" required>
            </div>
            <button type="button" onclick="addLink()">Add New Link</button>

            <div class="buttons-container">
                <button type="button" onclick="validateForm()">Post News</button>
            </div>

            <script>
            function addLink() {
                const linksContainer = document.getElementById('links-container');
                const linkInput = document.createElement('input');
                linkInput.type = 'url';
                linkInput.name = 'links[]';
                linkInput.placeholder = 'Link';
                linksContainer.appendChild(linkInput);
            }

            function validateForm() {
                const form = document.getElementById('newsForm');
                const inputs = form.querySelectorAll('input, textarea');

                let isValid = true;

                inputs.forEach(input => {
                    if (input.hasAttribute('required') && input.value.trim() === '') {
                        isValid = false;
                        input.classList.add('error');
                    } else {
                        input.classList.remove('error');
                    }
                });

                if (isValid) {
                    form.submit();
                }
            }
            </script>
</body>

</html>