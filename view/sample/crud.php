<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <?=$css_import?>
    <?=$js_import?>
</head>
<body>
    <div class="main-body">
        <?php require_once('../view/template/navbar.php'); ?>
        <div class="form-container">
            <div class="form-objects small-12">
                <div class="form-header row">
                    <span class="header-text column">
                       Add new music 
                    </span>
                </div>
                <?php
                    $sClass = 'hidden';
                    $sText = '';
                    if (isset($_GET['error']) === true) {
                        $sClass = '';
                        $sText = $_GET['text'];
                    }
                ?>
                <div class="form-error row small-12 <?=$sClass?>">
                    <div class="error-text">
                        <?=$sText?>
                    </div>
                </div>
                <div class="form-body row small-12">
                    <form action="/music/crud/action" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="mode" value="<?=$data['mode']?>">
                    <input type="hidden" name="id" value="<?=$data['id']?>">
                    
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mTitle">Title:</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="mTitle" id="mTitle" value="<?=$data['mTitle']?>">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mDesc">Description:</label>
                            </div>
                            <div class="column small-9">
                                <textarea type="text" name="mDesc" id="mDesc"><?=$data['mDesc']?></textarea>
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mSinger">Singer(s):</label>
                            </div>
                            <div class="column small-9">
                                <input type="text" name="mSinger" id="mSinger" value="<?=$data['mSinger']?>">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mCover">Cover image:</label>
                            </div>
                            <div class="column small-9">
                                <div style="font-size: 0.7em">Ideal Size: 600px x 600px</div>
                                <label for="mCover" class="button">Select Cover</label>
                                <input type="file" name="mCover" id="mCover" accept="image/*" class="show-for-sr">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mAudio">Audio file:</label>
                            </div>
                            <div class="column small-9 custom-file-upload">
                            <label for="mAudio" class="button">Select Music</label>
                                <input class="show-for-sr"t type="file" name="mAudio" id="mAudio" accept="audio/*">
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mVideo">Video Embed:</label>
                            </div>
                            <div class="column small-9">
                                <textarea name="mVideo" id="mVideo" placeholder="Youtube embed code"><?=$data['mVideo']?></textarea>
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                                <label for="mGenre">Genre:</label>
                            </div>
                            <div class="column small-9">
                                <select name="mGenre" id="mGenre">
                                    <option <?=$data['Hiphop']?>>Hiphop</option>
                                    <option <?=$data['Reggie/Zim Dancehall']?>>Reggie/Zim Dancehall</option>
                                    <option <?=$data['Urban Groove']?>>Urban Groove</option>
                                    <option <?=$data['House Music']?>>House Music</option>
                                    <option <?=$data['Gospel']?>>Gospel</option>
                                    <option <?=$data['Sungura']?>>Sungura</option>
                                    <option <?=$data['Afro Pop']?>>Afro Pop</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-field row">
                            <div class="column small-3">
                            </div>
                            <div class="column small-9">
                                <input class="button submit" type="submit" value="Submit">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>