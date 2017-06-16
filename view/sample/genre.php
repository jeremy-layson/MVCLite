<!DOCTYPE html>
<html>
<head>
    <title><?=$genre?></title>
    <?=$css_import?>
    <?=$js_import?>
</head>
<body>
    <div class="main-body">
        <?php require_once('../view/template/navbar.php'); ?>
            <div class="genre-container">
                <div class="genre small-12">
                    <?php
                        $nCtr = 0;
                        foreach ($aData as $aMusic) {
                        
                            if ($nCtr === 0) {
                                echo '<div class="genre-items small-12 row">';
                            }

                            $nCtr++;

                            if ($nCtr === 3) {$nCtr=0;}
                    ?>
                        <div class="genre-item small-4 column">
                            <div class="item-photo">
                                <a href="/music/play?id=<?=$aMusic['m_id']?>">
                                    <img src="/resource/upload/<?=$aMusic['m_cover']?>">
                                </a>
                                <div class="item-info">
                                    <div class="item-head">
                                        <div class="item-title"><?=$aMusic['m_title']?></div>
                                        <div class="item-artist"><?=$aMusic['m_singers']?></div>                                 
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    <?php 
                            if ($nCtr === 0) {
                                echo '</div>';
                            }
                        } 
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>