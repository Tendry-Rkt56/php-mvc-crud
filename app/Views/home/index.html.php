<style>
    .container-home {
        position:fixed;
        top:50%;
        left:50%;
        transform:translate(-50%,-50%);
    }

    .box {
        box-shadow:0 0 5px rgba(0, 0, 0, .5);
        width:400px;
        height:280px;
        border-radius:6px;
        text-decoration:none;
        color:none;
    }

    .box-1 {
        background-color:#BE4304;
        padding:10px 10px;
    }

    .box-2 {
        background-color:#2C03A5;
    }

    .box-3 {
        background-color:#6AB2DC;
    }

    .box img {
        width:50%;
        height:50%;
        margin:10px 0;
    }

    .box h3 {
        color:whitesmoke;
        opacity:0.8;
    }

    .box p {
          color:white;
    }

    .box:hover {
        text-decoration:none;
    }
</style>

<div class="container container-home">
    <div class="d-flex align-items-center justify-content-center flex-row gap-3">
        <a href="/articles" class="d-flex align-items-center justify-content-center flex-column gap-3 box box-1">
            <h3>Les articles</h3>
            <?php $s = $articles > 1 ? 's' : ''?>
            <p>Vous avez <?=$articles?> article<?=$s?></p>
        </a>
        <a href="/category" class="d-flex align-items-center justify-content-center flex-column mx-5 gap-3 box box-2">
            <h3>Les catégories</h3>
            <?php $ss = $categories > 1 ? "s" : ''?>
            <p>Vous avez <?=$categories?> catégorie<?=$ss?></p>
        </a>
    </div>
</div>