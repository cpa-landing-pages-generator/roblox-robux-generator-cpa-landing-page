<?php

declare (strict_types=1);

$username = $_GET['u'];

$ch1 = curl_init();
curl_setopt($ch1, CURLOPT_URL, 'https://api.roblox.com/users/get-by-username?username=' . $username);

$FILE = "SETTINGS.txt";
if($F = fopen($FILE, 'r')){
  $X = fgets($F);
  fclose($F);
}
$X = str_replace("\r\n","",$X);
if ($X == "PROXY") {
    $PROXIES1 = file("PROXIES.txt");
    $CHOSEN1 = $PROXIES1[rand(0, count($PROXIES1) - 1)];
    $CPSP1 = $CHOSEN1;
    curl_setopt($ch1, CURLOPT_PROXY, $CPSP1);
} elseif ($X == "AUTH") {
  $PROXIES2 = file("PROXIES.txt");
  $CHOSEN2 = $PROXIES2[rand(0, count($PROXIES2) - 1)];
  $CEXPLODE = explode("#", $CHOSEN2);
  $CPSP2 = $CEXPLODE[0];
  $CPUP2 = $CEXPLODE[1];
  curl_setopt($ch1, CURLOPT_PROXY, $CPSP2);
  curl_setopt($ch1, CURLOPT_PROXYUSERPWD, $CPUP2);
}

curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch1, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36');
curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
$idhtml = curl_exec($ch1);
curl_close($ch1);

function get_string_index(string $string, string $start, string $end, int $index = 0)
{
  if(false === ($c = preg_match_all('/' . preg_quote($start, '/') . '(.*?)' . preg_quote($end, '/') . '/us', $string, $matches)))
    return false;

  if($index < 0)
    $index += $c;

  return $index < 0 || $index >= $c
    ? false
    : $matches[1][$index]
  ;
}

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

if (strpos($idhtml, 'User not found') !== false) {
  $arr = array("username" => "FLICKERROR");

  echo json_encode($arr);
} else {

    $explode1 = explode(':', $idhtml);
    $explode2 = explode(',', $explode1[1]);
    $id = $explode2[0];


    $ch2 = curl_init();
curl_setopt($ch2, CURLOPT_URL, 'https://www.roblox.com/users/' . $id . '/profile');

$FILE = "SETTINGS.txt";
if($F = fopen($FILE, 'r')){
  $X = fgets($F);
  fclose($F);
}
$X = str_replace("\r\n","",$X);
if ($X == "PROXY") {
    $PROXIES1 = file("PROXIES.txt");
    $CHOSEN1 = $PROXIES1[rand(0, count($PROXIES1) - 1)];
    //CPSP = CHOSEN PROXY SERVER PORT
    $CPSP1 = $CHOSEN1;
    curl_setopt($ch2, CURLOPT_PROXY, $CPSP1);
} elseif ($X == "AUTH") {
  $PROXIES2 = file("PROXIES.txt");
  $CHOSEN2 = $PROXIES2[rand(0, count($PROXIES2) - 1)];
  //CPSP = CHOSEN PROXY SERVER PORT
  //CPUP = CHOSEN PROXY USER PASSWORD
  $CEXPLODE = explode("#", $CHOSEN2);
  $CPSP2 = $CEXPLODE[0];
  $CPUP2 = $CEXPLODE[1];
  curl_setopt($ch2, CURLOPT_PROXY, $CPSP2);
  curl_setopt($ch2, CURLOPT_PROXYUSERPWD, $CPUP2);
}

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch2, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/76.0.3809.100 Safari/537.36');
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
$profilehtml = curl_exec($ch2);
curl_close($ch2);

    //echo $profilehtml;

    if (strpos($profilehtml, 'Page cannot be found') !== false) {
      $arr = array("username" => "FLICKERROR");

      echo json_encode($arr);
    } else {

        $username = strtolower($username);

        //echo $username . '###';

        $profilehtml = strtolower($profilehtml);

        $avatar = get_string_between($profilehtml, $username . ' class="avatar-card-image profile-avatar-thumb" ng-src="{{ \'','\'');

        //echo $avatar . '<br>';

        $wearing = get_string_between($profilehtml, '<img alt=' . $username . ' src=', '>');

        //echo $wearing . '<br>';

        $status = get_string_between($profilehtml, 'data-statustext="','"');

        //echo $status . '<br>';

        $joindate = get_string_between($profilehtml, 'Join Date<p class=text-lead>','<');

        //echo $joindate . '<br>';

        $friends = get_string_between($profilehtml, 'data-friendscount=', ' ');

        //echo $friends . '<br>';

        $followers = get_string_between($profilehtml, 'data-followerscount=', ' ');

        //echo $followers . '<br>';

        $followings = get_string_between($profilehtml, 'data-followingscount=', ' ');

        //echo $followings . '<br>';

        $friends_count = substr_count($profilehtml, 'friend-link');

        //echo $friends_count . '<br>';

        //$friends_arr = array();

        $friend_i = 0;

        //while($friend_i<$friends_count) {
            //$friend_t = get_string_index($profilehtml, 'friend-link', '</span>', $friend_i);
            //$friend_t_n = get_string_between($friend_t, 'title=', '>');
            //$friend_t_a = get_string_between($friend_t, 'src=', '>');
            //array_push($friends_arr, $friend_t_n . ';' . $friend_t_a);
            //echo $friend_t_n . ';' . $friend_t_a . '<br>';
            //$friend_i++;
        //}

        //echo json_encode($friends_arr);

        $arr = array("username" => $username, "avatar" => $avatar, "wearing" => $wearing, "status" => $status, "joindate" => $joindate, "followers" => $followers, "followings" => $followings, "friends" => $friends, "id" => $id);

        //$arr = array("username" => $username, "avatar" => $avatar, "wearing" => $wearing, "status" => $status, "joindate" => $joindate, "followers" => $followers, "followings" => $followings, "friends" => $friends, "friendlist" => $friends_arr, "id" => $id);


        echo json_encode($arr);

    }

}

?>
