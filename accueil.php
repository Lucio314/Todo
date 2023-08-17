<?php
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>

<body>
    <div class="home">
        <h1 id="h1"> <?php echo "Bienvenue ";
                        if (isset($user)) echo  $user['username']; ?> !</h1>
        Welcome to our task management application!<br>

        Organize your life and supercharge your productivity with our simple and effective task list tool. Whether it's tracking your daily goals, planning important projects, or simply not forgetting anything, our application is here to help you stay organized and focused on what matters.<br>

        Key features of our application:<br>
        <ul>
            <li> - Easily add new tasks with comprehensive details, such as title, description, and due date.</li>
            <li> - Edit or update your existing tasks to reflect changes in your schedule.</li>
            <li> - Mark tasks as "Completed" once they're done, for instant satisfaction.</li>
            <li> - Delete tasks you no longer need to track.</li>
            <li> - Quickly visualize upcoming tasks with a clean and organized overview.</li>
        </ul><br>
        Our user-friendly and intuitive interface allows you to manage your tasks with just a few clicks. No more stress about forgetting something important or juggling disorganized paper lists.<br>

        Don't wait any longer, sign up today, and discover how our task management application can simplify your daily life. Start planning, achieving, and succeeding with ease! <br>
        <a href="index.php?val=task">Click here</a> to add your tasks
    </div>
</body>

</html>