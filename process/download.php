<?php
include_once '../app/db_functions.php';
echo("Please wait while we process your request...");
if (isset($_GET["key"])){
    $key = $_GET['key'];
    $direct = $_GET['direct'];
    $db = new DB_Functions();
    $res = $db->increaseKey($key);
    if($key == "com.metao.webcams" && $direct == "true"){
        header('Location: https://cafebazaar.ir/app/com.metao.webcams');
    }else if($key == "com.metao.webcams" && $direct == "false"){
        header('Location: /files/webcams.apk');
    }
    if($key == "com.metao.onlinemusic" && $direct == "true"){
            header('Location: https://cafebazaar.ir/app/com.metao.onlinemusic');
        }else if($key == "com.metao.onlinemusic" && $direct == "false"){
            header('Location: /files/onlinemusic.apk');
        }
        else if($key == "com.metao.email" && $direct == "true"){
            header('Location: https://cafebazaar.ir/app/com.metao.email');
        }else if($key == "com.metao.email" && $direct == "false"){
            //header('Location: /files/email.apk');
        }
        else if($key == "com.metao.tar.free" && $direct == "true"){
            header('Location: https://cafebazaar.ir/app/com.metao.tar.free');
        }else if($key == "com.metao.email" && $direct == "false"){
            header('Location: /files/tars.apk');
        }
        else if($key == "com.metao.tar.orginal" && $direct == "true"){
            header('Location: https://cafebazaar.ir/app/com.metao.tar.orginal');
        }else if($key == "com.metao.tar.orginal" && $direct == "false"){
            //header('Location: /files/original-guitar.apk');
        }
        else if($key == "com.metao.skater" && $direct == "true"){
                    header('Location: https://cafebazaar.ir/app/com.metao.skater');
                }else if($key == "com.metao.skater" && $direct == "false"){
                    header('Location: /files/skater.apk');
                }
             else    if($key == "com.metao.toop" && $direct == "true"){
                                    header('Location: https://cafebazaar.ir/app/com.metao.toop');
                                }else if($key == "com.metao.toop" && $direct == "false"){
                                    header('Location: /files/toop.apk');
                                }
                else if($key == "com.metao.scribler" && $direct == "true"){
                                    header('Location: https://cafebazaar.ir/app/com.metao.scribler');
                                }else if($key == "com.metao.scribler" && $direct == "false"){
                                   // header('Location: /files/monshi.apk');
                                }
                else if($key == "com.metao.tenture" && $direct == "true"){
                                    header('Location: https://cafebazaar.ir/app/com.metao.tenture');
                                }else if($key == "com.metao.tenture" && $direct == "false"){
                                    header('Location: /files/tenture.apk');
                                }
                else if($key == "com.metao.karcam" && $direct == "true"){
                                    header('Location: https://cafebazaar.ir/app/com.metao.karcam');
                                }else if($key == "com.metao.karcam" && $direct == "false"){
                                    header('Location: /files/karcam.apk');
                                }

                else if($key == "com.metao.ship" && $direct == "true"){
                                                    header('Location: https://cafebazaar.ir/app/com.metao.ship');
                                                }else if($key == "com.metao.ship" && $direct == "false"){
                                                    header('Location: /files/highship.apk');
                                                }
               else if($key == "com.metao.shureshpitza" && $direct == "true"){
                                                    header('Location: https://cafebazaar.ir/app/com.metao.shureshpitza');
                                                }else if($key == "com.metao.shureshpitza" && $direct == "false"){
                                                    header('Location: /files/shureshpitza.apk');
                                                }
                  else if($key == "com.metao.stickers" && $direct == "true"){
                                                   header('Location: https://cafebazaar.ir/app/com.metao.stickers');
                                               }else if($key == "com.metao.stickers" && $direct == "false"){
                                                  // header('Location: /files/mano_yadet_bashe.apk');
                                               }

}
?>