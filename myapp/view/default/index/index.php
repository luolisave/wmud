<?php  extract($GLOBALS['data']);  ?>
<!DOCTYPE html>
<html>
    <head>
        <title>W-Mud API list</title>
        <meta charset='utf-8'>
    </head>
    <body>
        <h1>W-Mud API list</h1>
        <ul>
            <li><a href="<?php echo SITE_URL , "/index.php/public/opensession/username/test/password/123456"; ?>">opensession</a> 输入用户名密码，获得sessionId</li>
            <li><a href="<?php echo SITE_URL , "/index.php/public/closesession/sessionId/put_sessionId_here"; ?>">closesession</a> 通过sessionId关闭session</li>
            
            <li><a href="<?php echo SITE_URL , "/index.php/act/gohome/sessionId/put_sessionId_here"; ?>">gohome</a> 回家 （user表uLocation跳转为1（家））</li>
            <li>
                look (观察) TODO
                <ul>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/here"; ?>">here</a> 看当下位置</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/e"; ?>">e</a> 看东方</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/ne"; ?>">ne</a> 看东北方</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/n"; ?>">n</a> 看北方</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/nw"; ?>">nw</a> 看西北方</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/w"; ?>">w</a> 看西方</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/sw"; ?>">sw</a> 看西南方</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/s"; ?>">s</a> 看南方</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/look/sessionId/put_sessionId_here/direction/se"; ?>">se</a> 看东南方</li>
                </ul>
            </li>
            <li>
                walk (行走) TODO
                <ul>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/e"; ?>">e</a> 向东走</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/ne"; ?>">ne</a> 向东北走</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/n"; ?>">n</a> 向北走</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/nw"; ?>">nw</a> 向西北走</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/w"; ?>">w</a> 向西走</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/sw"; ?>">sw</a> 向西南走</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/s"; ?>">s</a> 向南走</li>
                    <li><a href="<?php echo SITE_URL , "/index.php/act/walk/sessionId/put_sessionId_here/direction/se"; ?>">se</a> 向东南走</li>
                </ul>
            </li>
        </ul>
    </body>
</html>