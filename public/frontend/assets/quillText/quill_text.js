document.addEventListener("DOMContentLoaded", function () {
    var quill = new Quill("#editor-container", {
        theme: "snow",
        placeholder: "Write your content here...",
        modules: {
            toolbar: [
                [
                    {
                        header: [1, 2, 3, false],
                    },
                ],
                ["bold", "italic", "underline", "strike"],
                ["blockquote", "code-block"],
                [
                    {
                        list: "ordered",
                    },
                    {
                        list: "bullet",
                    },
                ],
                [
                    {
                        script: "sub",
                    },
                    {
                        script: "super",
                    },
                ],
                [
                    {
                        indent: "-1",
                    },
                    {
                        indent: "+1",
                    },
                ],
                [
                    {
                        direction: "rtl",
                    },
                ],
                [
                    {
                        color: [],
                    },
                    {
                        background: [],
                    },
                ],
                [
                    {
                        align: [],
                    },
                ],
                ["clean"],
                ["link", "image", "video"],
            ],
        },
    });
    document.querySelector("form").addEventListener("submit", function () {

        document.querySelector("#content").value = quill.root.innerHTML;
    });
});


