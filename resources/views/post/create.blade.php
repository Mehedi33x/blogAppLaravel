@extends('app')
@section('content')
    <div class="container mt-1 pt-1">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="p-4 shadow-sm rounded bg-white border">
                    <h4 class="mb-3 text-center">Create a Post</h4>
                    <form action="{{ route('post.doCreate') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="postTitle" class="font-weight-bold">Post Title</label>
                            <input type="text" name="title" class="form-control" id="postTitle"
                                placeholder="Enter your post title">
                        </div>

                        {{-- <div class="form-group">
                            <label for="postContent" class="font-weight-bold">Content</label>
                            <textarea name="content" class="form-control" id="editor" rows="6" placeholder="Write your content here"></textarea>
                        </div> --}}
                        <div class="form-group">
                            <label for="postContent" class="font-weight-bold">Content</label>
                            <div id="editor-container" style="height: 200px;"></div>
                            <input type="hidden" name="content" id="content">
                        </div>

                        <!-- Categories -->
                        <div class="form-group">
                            <label for="postCategory" class="font-weight-bold">Category</label>
                            <select name="category" class="form-control" id="postCategory">
                                <option value="technology">Technology</option>
                                <option value="lifestyle">Lifestyle</option>
                                <option value="education">Education</option>
                                <option value="travel">Travel</option>
                            </select>
                        </div>

                        <!-- Upload Image -->
                        <div class="form-group">
                            <label for="postImage" class="font-weight-bold">Upload Image</label>
                            <input type="file" name="image" class="form-control-file" id="postImage">
                        </div>

                        <!-- Publish Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary px-4">Publish</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Quill
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Write your content here...',
            modules: {
                toolbar: [
                    [{
                        'header': [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'align': []
                    }],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });

        // Get the form and synchronize content before submission
        var form = document.querySelector('form');
        var hiddenContentInput = document.querySelector('#content');

        form.addEventListener('submit', function() {
            hiddenContentInput.value = quill.root
                .innerHTML; // Update the hidden input with Quill content
            console.log(hiddenContentInput.value);

        });

        // Optional: Add debugging logs
        console.log("Quill initialized and form listener added.");
    });
</script>
