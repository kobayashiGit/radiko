<?php
session_start();

if(isset($_GET["id"])){
        $id = $_GET["id"];
	switch ($id) {

        case "vdd":
        exec("nohup amixer -c 0 set PCM 6dB- > /dev/null 2>&1");
        break;

        case "vds":
        exec("nohup amixer -c 0 set PCM 2dB- > /dev/null 2>&1");
        break;

        case "def":
        exec("nohup amixer -c 0 set PCM 30% > /dev/null 2>&1");
        break;

        case "vus":
        exec("nohup amixer -c 0 set PCM 2dB+ > /dev/null 2>&1");
        break;

        case "vuu":
        exec("nohup amixer -c 0 set PCM 6dB+ > /dev/null 2>&1");
        break;

        case "max":
        exec("nohup killall mplayer > /dev/null &");
        exec("nohup sleep 1 > /dev/null 2>&1");
        exec("nohup amixer -c 0 set PCM 100% > /dev/null 2>&1");
        $_SESSION['broad']="MoOde Music Player";
        break;

        case "play":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh -p FMJ > /dev/null &");
            $_SESSION['broad']="J-WAVE";
            break;

	    case "stop":
		    exec("nohup killall mplayer > /dev/null &");
            exec("nohup amixer -c 0 set PCM 80% > /dev/null 2>&1");
            $_SESSION['broad']="STOP";
		break;

        case "fmt":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh FMT > /dev/null &");
            $_SESSION['broad']="FM TOKYO";
        break;

	    case "fmj":
	        exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh FMJ > /dev/null &");
            $_SESSION['broad']="J-WAVE";
	        break;

	    case "bay":
	        exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh BAYFM78 > /dev/null &");
            $_SESSION['broad']="BAYFM78";
	        break;

	    case "nac":
	        exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh NACK5 > /dev/null &");
            $_SESSION['broad']="NACK5";
        	break;

        case "int":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh INT > /dev/null &");
            $_SESSION['broad']="Inter FM";
            break;

        case "yfm":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh YFM > /dev/null &");
            $_SESSION['broad']="FM Yokohama";
            break;

        case "rn1":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh RN1 > /dev/null &");
            $_SESSION['broad']="Radio NIKKEI 1";
            break;

        case "rn2":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh RN2 > /dev/null &");
            $_SESSION['broad']="Radio NIKKEI 2";
            break;

        case "tbs":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh TBS > /dev/null &");
            $_SESSION['broad']="TBS Radio";
            break;

        case "jor":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh JORF > /dev/null &");
            $_SESSION['broad']="Radio Nippon";
            break;

        case "qrr":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh QRR > /dev/null &");
            $_SESSION['broad']="文化放送 AM1134";
            break;

        case "lfr":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh LFR > /dev/null &");
            $_SESSION['broad']="ニッポン放送 AM1242";
            break;

        case "nfs":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh FM_SENDAI > /dev/null &");
            $_SESSION['broad']="NHK FM仙台";
            break;

        case "ns1":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh NHK1_SENDAI > /dev/null &");
            $_SESSION['broad']="NHK仙台第1";
            break;

        case "n2":
            exec("nohup killall mplayer > /dev/null &");
            exec("nohup ./radiko.sh NHK2 > /dev/null &");
            $_SESSION['broad']="NHK第2放送";
            break;

    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, width=device-width">

    <title>MoOde Radiko Player</title>
    <link rel="stylesheet" href="css/skyblue.css">
    <link rel="stylesheet" href="demo/css/docs.css">
    <link rel="stylesheet" href="demo/google-code-prettify/prettify.css">
</head>

<body onload="prettyPrint()">

<div class="bg-main padding">
    <div class="container text-center">
        <h2>MoOde Radiko Player</h2>
    </div>
</div>

<div class="session">
    <?php $broad=$_SESSION['broad']; ?>
</div>

<div class="container">
    <div class="row">

        <div class="col md-4 float-center"></div>

        <div class="col md-4 float-center">
            <p style="margin-top:2em;"></p>
            <div class="broadcast">
                <a href="http://moode:8080/mobile/"><h5>Broadcast</a>
                <span style="margin-right:10px;"></span>
                <?php echo $broad; ?></h5>
            </div>
            <p style="margin-top:1em;"></p>
            <span style="margin-right: 5px;"></span>

            <a class="btn btn-empty btn-error" href="index.php?id=stop">STOP</a>
            <a class="btn btn-empty btn-success" href="index.php?id=play">PLAY</a>

            <p style="margin-top:1em;"></p>
            <a class="btn btn-empty btn-sm btn-warning" href="index.php?id=vds">- 2dB</a>
            <a class="btn btn-empty btn-sm btn-light" href="index.php?id=def">def</a>
            <a class="btn btn-empty btn-sm btn-success" href="index.php?id=vus">+ 2dB</a>
            <a class="btn btn-empty btn-sm btn-error" href="index.php?id=vdd">- 6dB</a>
            <a class="btn btn-empty btn-sm btn-light" href="index.php?id=def">def</a>
            <a class="btn btn-empty btn-sm" href="index.php?id=vuu">+ 6dB</a>

            <div class="font-icon-list col md-2 sm-3 xs-6">
                <div class="font-icon-detail">
                    <a href="index.php?id=max">
                    <span class="icon-volume"></span>
                    <div>MAX</div>
                    </a>
                </div>
            </div>

            <p style="margin-top:2em;">縲</p>

            <div class="sidemenu js-sidemenu">
                <h5>Broadcaster List</h5>
                <a href="index.php?id=fmt">TOKYO FM</a>
                <a href="index.php?id=fmj">J-WAVE</a>
                <a href="index.php?id=bay">BAYFM78</a>
                <a href="index.php?id=nac">NACK5</a>
                <a href="index.php?id=int">Inter FM</a>
                <a href="index.php?id=yfm">FM Yokohama</a>
                <a href="index.php?id=rn1">Radio NIKKEI 1</a>
                <a href="index.php?id=rn2">Radio NIKKEI 2</a>
                <a href="index.php?id=tbs">TBS Radio</a>
                <a href="index.php?id=jor">Radio Nippon</a>
                <a href="index.php?id=qrr">文化放送 AM1134</a>
                <a href="index.php?id=lfr">ニッポン放送 AM1242</a>
            </div>
        </div>

<div class="col md-4"></div>


    </div>
</div>
<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="demo/js/jquery.sticky-kit.min.js"></script>
<script src="demo/google-code-prettify/prettify.js"></script>
<script src="demo/js/docs.js"></script>
</body>
</html>