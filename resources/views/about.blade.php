@extends('layout.pub_nav')

@section('content')

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.containerfoot {
    max-width: 800px;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

p {
    line-height: 1.6;
    color: #666;
}

.rtg li {
    list-style-type: none;
    padding: 0;
}


.rtg  li {
    background: #e9e9e9;
    margin: 10px 0;
    padding: 10px;
    border-radius: 4px;
}

.rtg li .container {
    margin-top: 10px;
}

.rtg li {
    background: #f4f4f4;
    padding: 8px;
}

strong {
    color: #333;
}

</style>
<body>
    <div class="containerfoot">
        <h1>Zyler Blog Site</h1>
        <p>I have developed a comprehensive Laravel blog site with several advanced features designed to enhance user experience and streamline content management. Key functionalities of the site include:</p>
        <ul class="rtg">
            <li><strong>Comment and Reply System:</strong> Users can comment on posts and reply to comments, fostering interactive discussions.</li>
            <li><strong>Image Sliders:</strong> Attractive image sliders are integrated for better visual appeal and content engagement.</li>
            <li><strong>Live Search:</strong> A live search functionality allows users to find posts quickly and efficiently.</li>
            <li><strong>Admin Panel:</strong> A robust admin panel enables administrators to add, remove, and edit posts with ease.</li>

            <li><strong>Email Notifications:</strong>
                <ul>
                    <li>When a comment is made, the post owner receives an email notification.</li>
                    <li>When a reply is made, the original comment owner is notified via email.</li>
                    <li>Whenever a new post is published, subscribers automatically receive an email notification.</li>
                    <li>Admin can send mail to any user or all user at once </li>
                </ul>
            </li>
            <li><strong>Password forgot and Reset:</strong>Admin can reset their password with ease by following the steps </li>
            <li><strong>History Page:</strong>You can the reverse the changes you made, like deleting a post and user </li>


        </ul>
        <p>This Laravel blog site combines user interactivity, ease of management, and efficient communication to deliver an optimal blogging experience.</p>
    </div>
</body>
</html>

@endsection
