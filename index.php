<link rel="stylesheet" href="css/style.css">
<?php include("lib/layouts/header.php"); ?>
<?php include("lib/layouts/main_nav.php"); ?>
<?php include("lib/function/function.php"); ?>


<div class="main-content">
    <div class="container">
        <div class="title">Pearl Clothings</div>
        <div class="body">
            World Best Clothings <br>
            <a href=""><button class="more-info">Read More</button></a>
        </div>
    </div>
</div>

<div class="trending-content">
    <div class="title">Trending Items</div>
    <div class="body">
        <div class="t-grid">
            <div class="titem1"></div>
            <div class="titem2"></div>
            <div class="titem3"></div>
            <div class="titem4"></div>
            <div class="titem5"></div>
            <div class="titem6"></div>
        </div>
    </div>
</div>
<div class="branches-content">
    <div class="container">
        <div class="title">Our Branches</div>
        <div class="body">
            <div class="b-grid">
                <div class="bitem1"><div class="text">Kandy Branch</div></div>
                <div class="bitem2"><div class="text">Colombo Branch</div></div>
                <div class="bitem3"><div class="text">Preradeniya Branch</div></div>
                <div class="bitem4"><div class="text">Pilimathalawa Branch</div></div>
            </div>
        </div>
    </div>
</div>

<div class="get-in">
    <div class="container">
        <div class="title">Get in Touch</div>
        <div class="body">
            <?php 
                if(isset($_POST['subscribe'])){
                    $result = subsctibe($_POST['email']);
                    echo $result;
                }
            ?>

            <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="from-body">
                    <input type="text" name="email" id="" required="required">
                    <span>Email</span>
                </div> 
                <input type="submit" value="Subscribe" name="subscribe" class="subs-btn">
            </form>
        </div>
    </div>
</div>
<div class="developer-note">
    <div class="container">
        <div class="title">CEO Note</div>
        <div class="body">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore laboriosam dignissimos aperiam recusandae! Voluptatibus voluptas officiis rerum, eum architecto, odio eveniet dolorem enim harum repellat necessitatibus, sunt quae hic totam?
            Officiis ab, ducimus exercitationem temporibus consequuntur commodi, similique fugit debitis sunt cum laboriosam. Nobis, blanditiis! Quasi quia quam nisi, perferendis fugit, architecto, quae praesentium eaque delectus suscipit veritatis exercitationem nesciunt.
            Veniam officia deleniti natus soluta est, quisquam molestias laudantium voluptatem repellendus culpa vero, atque mollitia ex nam repellat ipsum fuga maxime cumque provident amet. Repellat necessitatibus neque quo ab nihil?
            Quia soluta expedita, architecto impedit accusamus quam tenetur molestiae molestias vel placeat, consequuntur repellat atque dolorum. Consectetur obcaecati, iure fuga temporibus aliquid minima necessitatibus natus delectus possimus excepturi consequuntur culpa.
            Nesciunt blanditiis et deleniti consequuntur, hic vero voluptatibus earum labore possimus? Molestias facere magni, dolore officia omnis exercitationem aspernatur quos optio tempore vero illo eligendi obcaecati similique, officiis, atque voluptatem.

            <br>
            
            <img src="https://img.freepik.com/free-photo/young-attractive-woman-modern-office-desk-working-with-laptop-thinking-about-something_1258-104524.jpg?w=2000" alt="" class="ceo-img">
            <div class="ceo-name">Hiruni</div>
            <div class="ceo-roll">Founder, CEO <br> Pearl Clothings</div>
        </div>
    </div>
</div>
    
<?php include("lib/layouts/main_footer.php"); ?>
<script src="js/script.js"></script>

