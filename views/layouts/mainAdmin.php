<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <link rel="stylesheet" href="https://drive.google.com/uc?export=view&id=1C85jhiZw3TURBlsRQJtiD-nnatEZQiya" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
<div class="side-menu">
    <div class="brand-name">
        <h1>Admin</h1>
    </div>
    <ul>
        <li><i class="fa fa-dashboard" aria-hidden="true">&nbsp</i> <a href="/admin-dashboard.html"> <span> Dashboard</span></a>  </li>
        <li> <i class="fa fa-users" aria-hidden="true">&nbsp</i> <a href="/admin-usersList.html"><span>Users list</span></a> </li>
        <li>  <i class="fa fa-newspaper-o" aria-hidden="true">&nbsp</i> <a href="/blog-list.html"><span>Blog</span> </a></li>
        <li> <i class="fa fa-user-plus" aria-hidden="true">&nbsp</i>    <a href="/approved-blogs.html"> <span>Add User</span> </a></li>

    </ul>
</div>
<div class="container">
    <div class="header">
        <div class="nav">
            <div class="search">
                <input type="text" placeholder="search...">
                <button type="submit"> <i class="fa fa-search" aria-hidden="true"></i> </button>
            </div>
            <div class="user">
                <a href="#" class="btn-2"> <i class="fa fa-plus" aria-hidden="true">&nbsp New user</i></a>
                <i class="fa fa-bell" aria-hidden="true" style="color:#4B7BE5;"></i>
                <div class="img-case">
                    <img src="https://i.ibb.co/2FHfByD/photo-2022-06-12-20-47-10.jpg" alt="photo-2022-06-12-20-47-10" border="0">


                </div>


            </div>
        </div>
    </div>
    <div class="content">
        {{content}}

    </div>


</div>
</body>
</html>